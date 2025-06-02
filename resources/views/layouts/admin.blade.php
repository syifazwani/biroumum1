<!-- resources/views/layouts/admin.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'Admin Panel')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 min-h-screen">

    @include('partials.navbar')

    <main class="container mx-auto p-6">
        @yield('content')
    </main>

    @include('partials.footer')

</body>
</html>
