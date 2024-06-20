<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Campaign Manager</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="img/favicon.ico" rel="icon">
    <link rel="icon" type="image/png" href="img/JRMHD-TECH-LOGO-TRANSPARENT-PNG.ico">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

        /* Global Styles */
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #667eea, #764ba2);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            max-width: 900px;
            width: 100%;
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            position: relative;
            display: flex;
            flex-direction: column;
        }

        .header {
            background: linear-gradient(90deg, #667eea, #764ba2);
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid rgba(255, 255, 255, 0.1);
        }

        .header h1 {
            margin: 0;
            color: #fff;
            font-size: 32px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .user-dropdown {
            position: relative;
            cursor: pointer;
            color: #fff;
            display: flex;
            align-items: center;
            font-weight: 600;
        }

        .user-dropdown .username {
            display: flex;
            align-items: center;
            cursor: pointer;
            padding: 10px;
            border-radius: 8px;
            background-color: #667eea;
            transition: background-color 0.3s;
        }

        .user-dropdown .username:hover {
            background-color: #764ba2;
        }

        .username .arrow-icon {
            margin-left: 5px;
            transition: transform 0.3s;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            top: 40px;
            right: 0;
            background-color: #fff;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            z-index: 1;
            padding: 10px 0;
        }

        .dropdown-content a {
            display: block;
            padding: 10px;
            font-size: 14px;
            color: #333;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .dropdown-content a:hover {
            background-color: #f1f1f1;
        }

        .content {
            padding: 40px;
        }

        .content h2 {
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 20px;
            color: #333;
        }

        .content p {
            line-height: 1.6;
            color: #666;
        }

        .form-container {
            margin-top: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .form-container label {
            font-weight: 600;
            display: block;
            margin-bottom: 10px;
            color: #333;
            font-size: 18px;
        }

        .form-container input[type="file"] {
            border: 2px dashed #667eea;
            border-radius: 8px;
            padding: 16px;
            width: 100%;
            font-size: 16px;
            color: #667eea;
            text-align: center;
            transition: border-color 0.3s;
            margin-bottom: 20px;
        }

        .form-container input[type="file"]:hover {
            border-color: #764ba2;
        }

        .form-container button[type="submit"] {
            background: linear-gradient(90deg, #667eea, #764ba2);
            color: #fff;
            border: none;
            border-radius: 30px;
            padding: 16px 40px;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.3s, box-shadow 0.3s;
            margin-top: 20px;
        }

        .form-container button[type="submit"]:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .success {
            color: #28a745;
            margin-top: 20px;
            font-weight: 500;
            text-align: center;
        }

        .error {
            background-color: #f8d7da;
            color: #721c24;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 8px;
            text-align: left;
            font-weight: 500;
        }

        .progress-container {
            display: none;
            width: 100%;
            margin-top: 20px;
        }

        .progress-bar {
            width: 0;
            height: 20px;
            background-color: #4caf50;
            border-radius: 8px;
            text-align: center;
            color: white;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Email Campaign Manager</h1>
            <div class="user-dropdown" id="userDropdown">
                <div class="username" onclick="toggleDropdown()">
                    <span>{{ auth()->user()->name }}</span>
                    <i class="fas fa-caret-down arrow-icon"></i>
                </div>
                <div class="dropdown-content" id="dropdownContent">
                    <a href="{{ route('profile.edit') }}" class="dropdown-item">Edit Profile</a>
                </div>
            </div>
        </div>

        <div class="content">
            <h2>Welcome to Email Campaign Manager</h2>
            <p>This platform helps you manage and send email campaigns efficiently. Upload your email list in a TXT file
                format below to get started.</p>

            @if (session('success'))
                <div class="success">{{ session('success') }}</div>
            @endif

            @if (session('campaignName'))
                <div>
                    <p><strong>Campaign Name:</strong> {{ session('campaignName') }}</p>
                </div>
            @endif

            @if (session('invalidEmails'))
                <div class="error">
                    <p><strong>Invalid Email Addresses:</strong></p>
                    <ul>
                        @foreach (session('invalidEmails') as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if ($errors->any())
                <div class="error">
                    <p><strong>Error:</strong></p>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('email.send') }}" method="POST" enctype="multipart/form-data"
                class="form-container">
                @csrf
                <label for="file"><i class="fas fa-file-upload"></i> Upload Email Addresses (TXT file)</label>
                <input type="file" id="file" name="file" required placeholder="Choose a TXT file">
                <button type="submit">Send Emails</button>
            </form>

            <div class="progress-container">
                <div class="progress-bar" id="progressBar"></div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('emailForm').addEventListener('submit', function(e) {
            e.preventDefault(); // Prevent form submission

            let formData = new FormData(this);
            let xhr = new XMLHttpRequest();

            xhr.open('POST', '{{ route('email.send') }}', true);
            xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');

            xhr.upload.addEventListener('progress', function(e) {
                if (e.lengthComputable) {
                    let percentComplete = (e.loaded / e.total) * 100;
                    document.getElementById('progressBar').style.width = percentComplete + '%';
                    document.getElementById('progressBar').innerHTML = Math.floor(percentComplete) + '%';
                }
            });

            xhr.addEventListener('load', function() {
                if (xhr.status === 200) {
                    // Display the success message
                    document.getElementById('progressBar').innerHTML = 'Upload Complete';
                    location.reload(); // Reload the page to update the session messages
                } else {
                    // Display an error message
                    document.getElementById('progressBar').innerHTML = 'Upload Failed';
                }
            });

            // Show the progress bar
            document.querySelector('.progress-container').style.display = 'block';

            xhr.send(formData);
        });
    </script>
    <script>
        function toggleDropdown() {
            var dropdownContent = document.getElementById("dropdownContent");
            dropdownContent.style.display = dropdownContent.style.display === "block" ? "none" : "block";
        }

        // Close the dropdown if the user clicks outside of it
        window.onclick = function(event) {
            if (!event.target.matches('.username') && !event.target.matches('.arrow-icon')) {
                var dropdownContent = document.getElementById("dropdownContent");
                if (dropdownContent.style.display === "block") {
                    dropdownContent.style.display = "none";
                }
            }
        }
    </script>
</body>

</html>
