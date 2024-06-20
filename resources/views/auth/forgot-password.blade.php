<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
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

        .form-group {
            margin-bottom: 1rem;
        }

        .form-group label {
            display: block;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .form-group input {
            width: 100%;
            padding: 0.5rem;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .error-message {
            color: red;
            font-size: 0.875rem;
        }

        .submit-btn {
            background-color: #6a0dad;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 0.5rem 1rem;
            cursor: pointer;
            width: 100%;
        }

        .status-message {
            margin-bottom: 1rem;
            text-align: center;
            color: #48bb78;
            /* Tailwind green-500 */
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
                {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="status-message" :status="session('status')" />

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <!-- Email Address -->
                <div class="form-group">
                    <label for="email">{{ __('Email') }}</label>
                    <input id="email" type="email" name="email" :value="old('email')" required autofocus>
                    <x-input-error :messages="$errors->get('email')" class="error-message" />
                </div>

                <div class="form-group">
                    <button type="submit" class="submit-btn">
                        {{ __('Email Password Reset Link') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
