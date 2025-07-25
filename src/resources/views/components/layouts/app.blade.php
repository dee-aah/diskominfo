<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @vite(['resources/css/app.css'])
        @vite('resources/js/rental.js')

        <title>{{ $title ?? 'DPPKBP3A Kota Tasikmalaya' }}</title>
    </head>
    <body>
        @include("header.main.header")
        {{ $slot }}
        @include("footer")
    </body>
</html>
