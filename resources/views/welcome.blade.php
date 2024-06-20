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
        }

        .gradient {
            background: linear-gradient(135deg, #6a0dad 0%, #9a30ff 100%);
        }
    </style>
</head>

<body class="gradient">
    <div class="flex flex-col min-h-screen">
        <header class="flex justify-between items-center p-4">
            <div>
                <a href="/">
                    <img src="{{ asset('images/jrmhdlogoblack.png') }}" alt="Jrmhd Technologies Logo" class="h-16">
                </a>
            </div>
            <div>
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-white underline">My Account Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-white underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-white underline">Register</a>
                        @endif
                    @endauth
                @endif
            </div>
        </header>

        <main class="flex-grow flex flex-col items-center justify-center">
            <div class="text-center p-6 max-w-2xl bg-white bg-opacity-20 rounded-lg shadow-lg">
                <h1 class="text-5xl font-bold mb-6">Grow with Jrmhd Technologies</h1>
                <p class="text-lg mb-6">All-in-one platform to manage your customer relationships via Email, SMS, Chat,
                    and
                    more.</p>
                <a href="{{ route('register') }}"
                    class="bg-green-500 text-white py-2 px-4 rounded hover:bg-green-600 transition">Sign
                    up
                    free</a>
            </div>

            <div class="mt-12 text-center max-w-2xl">
                <h2 class="text-3xl font-bold mb-4">Five ways to work smarter, not harder</h2>
                <p class="text-lg mb-6">Join 500,000+ customers around the world who trust Jrmhd Technologies for their
                    email marketing needs. Here's how we can help you:</p>
                <ul class="list-disc text-left px-4">
                    <li class="mb-2">Automate your email campaigns and reach the right audience at the right time.
                    </li>
                    <li class="mb-2">Track and analyze your campaign performance with our robust analytics tools.</li>
                    <li class="mb-2">Personalize your emails to increase engagement and conversion rates.</li>
                    <li class="mb-2">Integrate seamlessly with your existing tools and workflows.</li>
                    <li class="mb-2">Benefit from our 24/7 customer support and extensive knowledge base.</li>
                </ul>
            </div>
        </main>
    </div>
</body>

</html>
