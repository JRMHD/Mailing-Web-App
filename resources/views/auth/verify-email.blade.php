<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification</title>
    <style>
        .gradient-background {
            background: linear-gradient(135deg, #6a0dad, #b19cd9);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 1rem;
        }

        .card {
            background-color: white;
            border-radius: 10px;
            padding: 2rem;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .text-message {
            margin-bottom: 1rem;
            text-align: center;
            color: #4a5568;
            /* Tailwind gray-600 */
        }

        .status-message {
            margin-bottom: 1rem;
            font-weight: 500;
            color: #48bb78;
            /* Tailwind green-600 */
        }

        .form-group {
            margin-bottom: 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .form-group button,
        .form-group a {
            background-color: #6a0dad;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 0.5rem 1rem;
            cursor: pointer;
            text-decoration: none;
        }

        .logout-btn {
            background-color: transparent;
            color: #4a5568;
            /* Tailwind gray-600 */
            text-decoration: underline;
            padding: 0;
        }

        .logout-btn:hover {
            color: #2d3748;
            /* Tailwind gray-900 */
        }

        @media (min-width: 768px) {
            .card {
                padding: 3rem;
            }
        }
    </style>
</head>

<body>
    <div class="gradient-background">
        <div class="card">
            <div class="text-message">
                {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
            </div>

            @if (session('status') == 'verification-link-sent')
                <div class="status-message">
                    {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                </div>
            @endif

            <div class="form-group">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <button type="submit">
                        {{ __('Resend Verification Email') }}
                    </button>
                </form>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="logout-btn">
                        {{ __('Log Out') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
