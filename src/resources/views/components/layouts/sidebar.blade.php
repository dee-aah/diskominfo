<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Dashboard' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
</head>
<body class="flex bg-gray-100 min-h-screen">
    @include('partials.sidebar')

    <main class="flex-1 p-6">
        {{ $slot }}
    </main>
</body>
</html>

