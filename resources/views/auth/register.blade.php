{{-- <x-guest-layout> --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jrmhd Technologies - Mail App</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
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

        .logo {
            text-align: center;
            margin-bottom: 1rem;
        }

        .logo img {
            width: 96px;
            margin: auto;
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

        .login-link {
            text-align: center;
            margin-top: 1rem;
        }

        .login-link a {
            color: #6a0dad;
            text-decoration: none;
            font-size: 0.875rem;
        }

        @media (min-width: 768px) {
            .card {
                padding: 3rem;
            }
        }
    </style>
</head>
<div class="gradient-background">
    <div class="card">
        <div class="logo">
            <img src="{{ asset('images/jrmhdlogo.png') }}" alt="Jrmhd Technologies Logo">
        </div>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="form-group">
                <label for="name">{{ __('Name') }}</label>
                <input id="name" type="text" name="name" :value="old('name')" required autofocus
                    autocomplete="name">
                <x-input-error :messages="$errors->get('name')" class="error-message" />
            </div>

            <!-- Email Address -->
            <div class="form-group">
                <label for="email">{{ __('Email') }}</label>
                <input id="email" type="email" name="email" :value="old('email')" required
                    autocomplete="username">
                <x-input-error :messages="$errors->get('email')" class="error-message" />
            </div>

            <!-- Password -->
            <div class="form-group">
                <label for="password">{{ __('Password') }}</label>
                <input id="password" type="password" name="password" required autocomplete="new-password">
                <x-input-error :messages="$errors->get('password')" class="error-message" />
            </div>

            <!-- Confirm Password -->
            <div class="form-group">
                <label for="password_confirmation">{{ __('Confirm Password') }}</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required
                    autocomplete="new-password">
                <x-input-error :messages="$errors->get('password_confirmation')" class="error-message" />
            </div>

            <div class="form-group">
                <button type="submit" class="submit-btn">
                    {{ __('Register') }}
                </button>
            </div>

            <div class="login-link">
                <a href="{{ route('login') }}">{{ __('Already registered?') }}</a>
            </div>
        </form>
    </div>
</div>
{{-- </x-guest-layout> --}}
</body>

</html>
