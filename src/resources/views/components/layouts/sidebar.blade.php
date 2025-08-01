<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Dashboard' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
</head>

<body>
@include('partials.sidebar')
    <div class="flex min-h-screen " >
        <aside class="w-64 bg-white border-r border-gray-200 flex flex-col">
            <div class="flex items-center justify-center h-16 ">
                <img src="{{ asset('img/Logo_Kota_Tasikmalaya.png') }}" alt="Logo" class="h-10 mr-3">
                    <span class="text-xl font-bold text-blue-700">DPPKBP3A</span>
            </div>
            <nav class="flex-1 p-4 space-y-2">
                <a href="{{ route('berita.index') }}" class="flex items-center p-2 text-gray-700 rounded hover:bg-gray-100">
                    <i class="fas fa-newspaper w-5 h-5 mr-3"></i> <span>Berita</span>
                </a>
                <a href="#" class="flex items-center p-2 text-gray-700 rounded hover:bg-gray-100">
                    <i class="fas fa-wallet w-5 h-5 mr-3"></i> <span>Keuangan</span>
                </a>
                <a href="#" class="flex items-center p-2 text-gray-700 rounded hover:bg-gray-100">
                    <i class="fas fa-chart-line w-5 h-5 mr-3"></i> <span>Laporan Bulanan</span>
                </a>
                <a href="#" class="flex items-center p-2 text-red-600 rounded hover:bg-red-100">
                    <i class="fas fa-sign-out-alt w-5 h-5 mr-3"></i> <span>Logout</span>
                </a>
            </nav>
        </aside>
        <main class="flex-1 p-6 ">
            {{ $slot }}
        </main>
    </div>
</body>

</html>
