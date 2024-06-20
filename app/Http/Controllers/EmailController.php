<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailNotification;
use Illuminate\Support\Facades\Log;

class EmailController extends Controller
{
    public function sendEmails(Request $request)
    {


        set_time_limit(0);
        // Validate the uploaded file
        $request->validate([
            'file' => 'required|mimes:txt|max:10240',
        ]);

        // Read the uploaded file
        $file = $request->file('file');
        $emails = file($file->path(), FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        // Initialize an array to keep track of invalid emails
        $invalidEmails = [];
        $sentEmails = 0;

        // Get the original file name for the campaign name
        $campaignName = $file->getClientOriginalName();

        // Send email to each address
        foreach ($emails as $email) {
            $email = trim($email); // Remove any surrounding whitespace
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                try {
                    Mail::to($email)->send(new EmailNotification());
                    $sentEmails++;
                } catch (\Exception $e) {
                    // Log the exception
                    Log::error('Failed to send email to ' . $email . ': ' . $e->getMessage());
                    $invalidEmails[] = $email;
                }
            } else {
                $invalidEmails[] = $email;
            }
        }

        // Prepare the response message
        $message = $sentEmails . ' emails sent successfully to valid addresses.';

        // Store the message and campaign details in session
        session()->flash('success', $message);
        session()->flash('campaignName', $campaignName);
        session()->flash('invalidEmails', $invalidEmails);

        // Redirect back to the form with success message
        return redirect()->back();
    }

    public function index()
    {
        // There are no campaigns to retrieve since we're not saving them
        $campaigns = []; // Empty array since campaigns are not saved

        // Return the view with an empty campaigns array
        return view('email.index', compact('campaigns'));
    }
}
