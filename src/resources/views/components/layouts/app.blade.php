<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'DPPKBP3A Kota Tasikmalaya' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    @include('partials.header')

    <main class="bg-white">
        {{ $slot }}
    </main>

    @include('partials.footer')

</body>
</html>
