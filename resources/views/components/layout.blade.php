<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ isset($title) ? $title . ' - ' : '' }} {{ config('app.name') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 font-sans antialiased">
    <header class="bg-white py-6">
        <nav class="container flex justify-between">
            <ul class="flex items-center gap-6">
                <li><x-nav-link to="/">Home</x-nav-link></li>
                <li><x-nav-link to="/jobs">Jobs</x-nav-link></li>
                <li><x-nav-link to="/contact">Contact</x-nav-link></li>
            </ul>

            <div class="flex items-center gap-2">
                @auth
                    <x-button to="/jobs/create">Post a Job</x-button>
                    <form action="/logout" method="POST" novalidate>
                        @csrf
                        <x-button type="submit" variant="ghost">Logout</x-button>
                    </form>
                @endauth
                @guest
                    <x-button :to="route('login')">Login</x-button>
                    <x-button :to="route('register')" variant="ghost">Register</x-button>
                @endguest
            </div>
        </nav>
    </header>

    <main class="py-12">
        <div class="container">
            {{-- <?php echo $slot; ?>  --}}
            {{ $slot }}
        </div>
    </main>

    {{ $scripts ?? '' }}
</body>

</html>
