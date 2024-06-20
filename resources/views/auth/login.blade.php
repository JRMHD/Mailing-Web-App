{{-- <x-guest-layout> --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jrmhd Technologies - Mail App</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #6a0dad 0%, #9a30ff 100%);
            color: white;
            font-family: 'Arial', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .container {
            background: white;
            color: black;
            padding: 2rem;
            border-radius: 0.5rem;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }

        .logo {
            margin-bottom: 1rem;
        }

        .logo img {
            max-width: 150px;
        }

        .form-group {
            margin-bottom: 1rem;
            text-align: left;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
        }

        .form-group input {
            width: 100%;
            padding: 0.5rem;
            border: 1px solid #ccc;
            border-radius: 0.25rem;
        }

        .form-group input[type="checkbox"] {
            display: inline-block;
            width: auto;
        }

        .form-actions {
            text-align: center;
        }

        .form-actions button {
            background-color: #6a0dad;
            color: white;
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 0.25rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .form-actions button:hover {
            background-color: #9a30ff;
        }

        .form-actions a {
            color: #6a0dad;
            text-decoration: none;
        }

        .form-actions a:hover {
            text-decoration: underline;
        }

        .social-login {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 1rem;
        }

        .social-login button {
            width: 100%;
            padding: 0.5rem;
            border: 1px solid #ccc;
            border-radius: 0.25rem;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .social-login button:hover {
            background-color: #f0f0f0;
        }

        .social-login img {
            margin-right: 0.5rem;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="logo">
            <img src="{{ asset('images\jrmhdlogo.png') }}" alt="Jrmhd Technologies Logo">
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="form-group">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="form-group">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="form-group">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" name="remember"
                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                    <span class="ml-2 text-sm">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="form-actions">
                @if (Route::has('password.request'))
                    <a class="underline text-sm" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <button type="submit" class="ml-3">
                    {{ __('Log in') }}
                </button>
            </div>
        </form>

        <div class="social-login">
            <button>
                <img src="https://img.icons8.com/color/16/000000/google-logo.png" alt="Google Logo">
                {{ __('Sign in with Google') }}
            </button>
            <button>
                <img src="https://img.icons8.com/ios-filled/16/000000/mac-os.png" alt="Apple Logo">
                {{ __('Sign in with Apple') }}
            </button>
        </div>

        <div class="form-actions mt-4">
            <a href="{{ route('register') }}">{{ __('Create an account') }}</a>
        </div>
    </div>
    {{-- </x-guest-layout> --}}
</body>

</html>
