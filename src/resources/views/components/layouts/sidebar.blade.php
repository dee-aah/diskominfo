<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Dashboard' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-white ">

    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <div id="sidebar"
            class="w-64 bg-stone-50 border-r-2 border-gray-200 flex flex-col space-y-6 py-7 px-2 absolute inset-y-0 left-0 transform -translate-x-full md:relative md:translate-x-0 transition duration-200 ease-in-out z-50">
            <!-- Logo -->
            <div class="flex items-center justify-center h-16">
                <img src="{{ asset('img/Logo_Kota_Tasikmalaya.png') }}" alt="Logo" class="h-10 mr-3">
                <span class="text-xl font-bold text-blue-700">DPPKBP3A</span>
            </div>

            <!-- Navigation -->
            <nav class="flex-1 p-4 space-y-2">
                <ul>
                    <li class="mb-2">
                        @if(auth()->check() && auth()->user()->role === 'admin')
                        <a href="{{ route('tentang_kami.dashboard') }}"
                            class="flex items-center p-2 text-gray-700 rounded hover:bg-blue-100">
                             <span>Tentang kami</span>
                        </a>
                        @endif
                    </li>
                    <li class="mb-2">
                        @if(auth()->check() && auth()->user()->role === 'admin')
                        <a href="{{ route('profill.dashboard') }}"
                            class="flex items-center p-2 text-gray-700 rounded hover:bg-blue-100">
                             <span>Profil Pimpinan</span>
                        </a>
                        @endif
                    </li>
                    <li class="mb-2">
                        @if(auth()->check() && auth()->user()->role === 'admin')
                        <a href="{{ route('visi.dashboard') }}"
                            class="flex items-center p-2 text-gray-700 rounded hover:bg-blue-100">
                             <span>Visi Misi</span>
                        </a>
                        @endif
                    </li>
                    <li class="mb-2">
                        @if(auth()->check() && auth()->user()->role === 'admin')
                        <a href="{{ route('struktur_.dashboard') }}"
                            class="flex items-center p-2 text-gray-700 rounded hover:bg-blue-100">
                             <span>Struktur Organisasi</span>
                        </a>
                        @endif
                    </li>
                    <li class="mb-2">
                        @if(auth()->check() && auth()->user()->role === 'admin')
                        <button class="flex items-center p-2 text-gray-700 rounded w-51 hover:bg-blue-100"
                            onclick="toggleMenu('Menu1')">
                            <svg class="w-4 h-4 mr-2 transition-transform" id="icon-Menu1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>Tupoksi
                        </button>
                        <!-- Sub Menu -->
                        <ul id="Menu1" class="hidden ml-6 pl-6">
                            <li><a href="{{route('tupoksii.dashboard')}}" class="flex items-center p-2 text-gray-700 rounded hover:bg-blue-100">Tugas & Fungsi</a></li>
                            <li><a href="{{route('uraian.dashboard')}}" class="flex items-center p-2 text-gray-700 rounded hover:bg-blue-100">Uraian Tugas</a>
                            </li>
                        </ul>
                        @endif
                    </li>
                    <li class="mb-2">
                        @if(auth()->check() && auth()->user()->role === 'admin')
                        <a href="{{ route('maklumat.dashboard') }}"
                            class="flex items-center p-2 text-gray-700 rounded hover:bg-blue-100">
                             <span>Maklumat</span>
                        </a>
                        @endif
                    </li>
                    <li class="mb-2">
                        @if(auth()->check() && auth()->user()->role === 'admin')
                        <button class="flex items-center p-2 text-gray-700 rounded w-51 hover:bg-blue-100"
                            onclick="toggleMenu('Menu')">
                            <svg class="w-4 h-4 mr-2 transition-transform" id="icon-Menu" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>Informasi Layanan
                        </button>

                        <!-- Sub Menu -->
                        <ul id="Menu" class="hidden ml-6 pl-6">
                            <li><a href="{{route('program.dashboard')}}" class="flex items-center p-2 text-gray-700 rounded hover:bg-blue-100">Program</a></li>
                            <li><a href="{{route('layanan.dashboard')}}" class="flex items-center p-2 text-gray-700 rounded hover:bg-blue-100">Layanan</a>
                            </li>
                            <li><a href="{{route('layanan_detail.dashboard')}}" class="flex items-center p-2 text-gray-700 rounded hover:bg-blue-100">Detail Layanan</a>
                            </li>
                        </ul>
                        @endif
                    </li>
                    <li class="mb-2">
                        @if(auth()->check() && auth()->user()->role === 'admin')
                        <button class="flex items-center p-2 text-gray-700 rounded w-51 hover:bg-blue-100"
                            onclick="toggleMenu('Menu2')">
                            <svg class="w-4 h-4 mr-2 transition-transform" id="icon-Menu2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>Produk Hukum
                        </button>
                        <!-- Sub Menu -->
                        <ul id="Menu2" class="hidden ml-6 pl-6">
                            <li><a href="{{route('produk_hukum.dashboard')}}" class="flex items-center p-2 text-gray-700 rounded hover:bg-blue-100">Produk Hukum</a></li>
                            <li><a href="{{route('produk_hukum_cont.dashboard')}}" class="flex items-center p-2 text-gray-700 rounded hover:bg-blue-100">Isi Konten</a>
                            </li>
                        </ul>
                        @endif
                    </li>
                    <li class="mb-2">
                        @if(auth()->check() && auth()->user()->role === 'user')
                        <a href="{{ route('artikell.dashboard') }}"
                            class="flex items-center p-2 text-gray-700 rounded hover:bg-blue-100">
                             <span>Artikel</span>
                        </a>
                        @endif
                    </li>
                    <li class="mb-2">
                        @if(auth()->check() && auth()->user()->role === 'user')
                        <a href="{{ route('berita.dashboard') }}"
                            class="flex items-center p-2 text-gray-700 rounded hover:bg-blue-100">
                             <span>Berita</span>
                        </a>
                        @endif
                    </li>
                    <li class="my-8">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full flex items-center p-2 text-red-600 rounded hover:bg-red-100">
                                <i class="fas fa-sign-out-alt w-5 h-5 mr-3"></i> <span>Logout</span>
                            </button>
                        </form>
                    </li>

                </ul>
            </nav>
        </div>

        <!-- Content Area -->
        <div class="flex-1 flex flex-col">
            <!-- Header (Topbar) -->
            <header class="bg-white  p-4 flex items-center justify-between md:justify-end">
                <button id="toggleSidebar" class="md:hidden text-2xl focus:outline-none">
                    &#9776;
                </button>
            </header>

            <!-- Main Content -->
            <main class="flex-1 bg-white overflow-y-auto p-6">
                {{ $slot ?? '' }}
            </main>
        </div>
    </div>

    <!-- JS Sidebar Toggle -->
    <script>
        const sidebar = document.getElementById('sidebar');
        const toggleSidebar = document.getElementById('toggleSidebar');

        toggleSidebar.addEventListener('click', () => {
            sidebar.classList.toggle('-translate-x-full');
        });

        function toggleMenu(id) {
            const menu = document.getElementById(id);
            const icon = document.getElementById("icon-" + id);
            menu.classList.toggle("hidden");
            icon.classList.toggle("rotate-180");
        }
    </script>
</body>

</html>
