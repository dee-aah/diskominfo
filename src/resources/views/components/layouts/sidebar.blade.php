<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Dashboard' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
</head>

<body>
<div class="mx-auto mx-w-5xl">
    <!-- Content Area -->
    <nav class="bg-white  border-b-1 border-gray-200 w-full fixed top-0 z-50">
        <div class="flex  justify-between h-15 items-center px-10">
            <div class="flex items-center">
                <img src="{{ asset('storage/default/Logo_Kota_Tasikmalaya.png') }}" alt="Logo" class="h-10 mr-3">
                <span class="text-xl font-bold font-sans text-[#476A9A]">DPPKBP3A</span>
            </div>
            <button id="toggleSidebar" class="md:hidden text-2xl focus:outline-none">
                &#9776;
            </button>
            <div id="profileBtn" class="flex items-center gap-2 p-2 ">
                {{-- <img src="https://via.placeholder.com/40" alt="profile" class="w-10 flex h-10 rounded-full "> --}}
                <span class="font-medium text-gray-700">{{ Auth::user()->name }}</span>
                <svg id="chevronIcon" class="w-4 h-4 text-gray-500 transform transition-transform duration-300"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </div>
        </div>
    </nav>
    <div id="profileMenu" class="hidden absolute right-0 mt-15 mr-3 w-64 bg-white rounded border-1 border-gray-200 shadow-lg ring-1 ring-gray-100 ring-opacity-5 z-50">
        <div class="px-4 py-3 ">
            <p class="text-sm font-semibold text-gray-800">{{ Auth::user()->name }}</p>
            <p class="text-sm text-gray-500">{{ Auth::user()->email }}</p>
        </div>
        <div class="py-2">
            <a href="#" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                <i class="fa-solid fa-pen mr-3"></i> Edit profile
            </a>
        </div>
        <div class="py-2">
            <a class="flex items-center px-4 py-3 text-sm text-red-600 hover:bg-gray-100">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit">
                        <i class="fas fa-sign-out-alt  mr-3"></i> <span>Logout</span>
                    </button>
                </form>
            </a>
        </div>
    </div>
    <!-- Main Layout Container (Sidebar + Content) -->
    <div class="flex font-Inter fixed my-15 min-h-screen">
        <!-- Sidebar -->
        <div id="sidebar"
            class="w-70 pb-20 bg-white border-r-1  border-gray-200 flex flex-col space-y-6 py-7 px-4
                    fixed inset-y-0 left-0 transform -translate-x-full md:relative md:translate-x-0
                    transition duration-200 ease-in-out z-40 md:z-auto">
            <!-- Navigation (Konten Sidebar Anda) -->
            <ul class="mx-3">
                <li x-data="{ open: {{ Request::is('pimpinan*') ? 'true' : 'false' }} }"
                    class="mb-2 w-55 rounded hover:bg-blue-100">
                    @if (auth()->check() && auth()->user()->role === 'admin')
                        <a x-show="open" href="{{ route('pimpinan.dashboard') }}"
                            class="flex font-medium items-center p-2
                            {{ Request::is('pimpinan*') ? 'text-blue-600 font-semibold' : 'text-gray-700' }}">
                            <span>Sambutan Pimpinan</span>
                        </a>
                    @endif
                </li>
                </li>
                <li x-data="{ open: {{ Request::is('tentang_kami*') ? 'true' : 'false' }} }"
                    class="mb-2 w-55 rounded hover:bg-blue-100">
                    @if (auth()->check() && auth()->user()->role === 'admin')
                        <a x-show="open" href="{{ route('tentang_kami.dashboard') }}"
                            class="flex font-medium items-center p-2
                            {{ Request::is('tentang_kami*') ? 'text-blue-600 font-semibold' : 'text-gray-700' }}">
                            <span>Tentang kami</span>
                        </a>
                    @endif
                </li>
                <li x-data="{ open: {{ Request::is('profil*') ? 'true' : 'false' }} }"
                    class="mb-2 w-55 rounded hover:bg-blue-100">
                    @if (auth()->check() && auth()->user()->role === 'admin')
                        <a x-show="open" href="{{ route('profil.dashboard') }}"
                            class="flex font-medium items-center p-2
                            {{ Request::is('profil*') ? 'text-blue-600 font-semibold' : 'text-gray-700' }} ">
                            <span>Profil Pimpinan</span>
                        </a>
                    @endif
                </li>
                <li class="mb-2">
                    @if (auth()->check() && auth()->user()->role === 'admin')
                        <button
                            class="flex items-center font-medium p-2 justify-between text-gray-700 rounded w-55 hover:bg-blue-100"
                            onclick="toggleMenu('Menu1')">Tupoksi
                            <svg class="w-4 h-4 mr-2 transition-transform" id="icon-Menu1"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <!-- Sub Menu -->
                        <ul id="Menu1" class="{{ Request::is('tupoksii*') || Request::is('uraian*') ? '' : 'hidden' }} ml-6 ">
                            <li class="rounded hover:bg-blue-100"><a href="{{ route('tupoksii.dashboard') }}"
                                    class="flex items-center font-medium p-2
                                    {{ Request::is('tupoksii*') ? 'text-blue-600 font-semibold' : 'text-gray-700' }} ">Tugas &
                                    Fungsi</a></li>
                            <li class="rounded hover:bg-blue-100"><a href="{{ route('uraian.dashboard') }}"
                                    class="flex items-center font-medium p-2
                                    {{ Request::is('uraian*') ? 'text-blue-600 font-semibold' : 'text-gray-700' }}">Uraian
                                    Tugas</a>
                            </li>
                        </ul>
                    @endif
                </li>
                <li x-data="{ open: {{ Request::is('maklumat*') ? 'true' : 'false' }} }"
                    class="mb-2 w-55 rounded hover:bg-blue-100">
                    @if (auth()->check() && auth()->user()->role === 'admin')
                        <a x-show="open" href="{{ route('maklumat.dashboard') }}"
                            class="flex font-medium items-center p-2
                        {{ Request::is('maklumat*') ? 'text-blue-600 font-semibold' : 'text-gray-700' }}">
                        <span>Maklumat</span>
                        </a>
                    @endif
                </li>
                <li class="mb-2">
                    @if (auth()->check() && auth()->user()->role === 'admin')
                        <button
                            class="flex items-center font-medium p-2 justify-between text-gray-700 rounded w-55 hover:bg-blue-100"
                            onclick="toggleMenu('Menu2')">Informasi Layanan
                            <svg class="w-4 h-4 mr-2 transition-transform" id="icon-Menu2"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <!-- Sub Menu -->
                        <ul id="Menu2" class="{{ Request::is('layanan*') || Request::is('layanan_detail*') ? '' : 'hidden' }} ml-6 ">
                            <li class="rounded hover:bg-blue-100"><a href="{{ route('layanan.dashboard') }}"
                                    class="flex items-center font-medium p-2
                                    {{ Request::is('layanan*') ? 'text-blue-600 font-semibold' : 'text-gray-700' }} ">Program & Layanan
                                    </a></li>
                            <li class="rounded hover:bg-blue-100"><a href="{{ route('layanan_detail.dashboard') }}"
                                    class="flex items-center font-medium p-2
                                    {{ Request::is('layanan_detail*') ? 'text-blue-600 font-semibold' : 'text-gray-700' }}">Uraian
                                    Detail Layanan</a>
                            </li>
                        </ul>
                    @endif
                </li>
                <li class="mb-2">
                    @if (auth()->check() && auth()->user()->role === 'admin')
                        <button
                            class="flex items-center p-2 font-medium justify-between text-gray-700 rounded w-55 hover:bg-blue-100"
                            onclick="toggleMenu('Menu3')">Produk Hukum
                            <svg class="w-4 h-4 mr-2  transition-transform" id="icon-Menu3"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <!-- Sub Menu -->
                        <ul id="Menu3" class="{{ Request::is('produk_hukum*') || Request::is('produk_hukum_cont*') ? '' : 'hidden' }} ml-6 ">
                            <li class="rounded hover:bg-blue-100"><a href="{{ route('produk_hukum.dashboard') }}"
                                    class="flex font-medium items-center p-2
                                    {{ Request::is('produk_hukum*') ? 'text-blue-600 font-semibold' : 'text-gray-700' }} ">Produk
                                    Hukum</a></li>
                            <li class="rounded hover:bg-blue-100"><a
                                    href="{{ route('produk_hukum_cont.dashboard') }}"
                                    class="flex font-medium items-center p-2
                                    {{ Request::is('produk_hukum_cont*') ? 'text-blue-600 font-semibold' : 'text-gray-700' }}">Isi
                                    Konten</a>
                            </li>
                        </ul>
                    @endif
                </li>
                <li class="mb-2">
                    @if (auth()->check() && auth()->user()->role === 'admin')
                        <button
                            class="flex items-center p-2 font-medium justify-between text-gray-700 rounded w-55 hover:bg-blue-100"
                            onclick="toggleMenu('Menu4')">Dokumen Evaluasi
                            <svg class="w-4 h-4 mr-2  transition-transform" id="icon-Menu4"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <!-- Sub Menu -->
                        <ul id="Menu4" class="{{ Request::is('evaluasi*') || Request::is('evaluasi_cont*') ? '' : 'hidden' }} ml-6 ">
                            <li class="rounded hover:bg-blue-100"><a href="{{ route('evaluasi.dashboard') }}"
                                    class="flex font-medium items-center p-2
                                    {{ Request::is('evaluasi*') ? 'text-blue-600 font-semibold' : 'text-gray-700' }} ">Doc Evaluasi</a></li>
                            <li class="rounded hover:bg-blue-100"><a
                                    href="{{ route('evaluasi_cont.dashboard') }}"
                                    class="flex font-medium items-center p-2
                                    {{ Request::is('evaluasi_cont*') ? 'text-blue-600 font-semibold' : 'text-gray-700' }}">Isi
                                    Konten</a>
                            </li>
                        </ul>
                    @endif
                </li>
                <li class="mb-2">
                    @if (auth()->check() && auth()->user()->role === 'admin')
                        <button
                            class="flex items-center p-2 font-medium justify-between text-gray-700 rounded w-55 hover:bg-blue-100"
                            onclick="toggleMenu('Menu5')">Dokumen Perencanaan
                            <svg class="w-4 h-4 mr-2  transition-transform" id="icon-Menu5"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <!-- Sub Menu -->
                        <ul id="Menu5" class="{{ Request::is('perencanaan*') || Request::is('perencanaan_cont*') ? '' : 'hidden' }} ml-6 ">
                            <li class="rounded hover:bg-blue-100"><a href="{{ route('perencanaan.dashboard') }}"
                                    class="flex font-medium items-center p-2
                                    {{ Request::is('perencanaan*') ? 'text-blue-600 font-semibold' : 'text-gray-700' }} ">Doc Perencanaan</a></li>
                            <li class="rounded hover:bg-blue-100"><a
                                    href="{{ route('perencanaan_cont.dashboard') }}"
                                    class="flex font-medium items-center p-2
                                    {{ Request::is('perencanaan_cont*') ? 'text-blue-600 font-semibold' : 'text-gray-700' }}">Isi
                                    Konten</a>
                            </li>
                        </ul>
                    @endif
                </li>
                <li class="mb-2">
                    @if (auth()->check() && auth()->user()->role === 'admin')
                        <button
                            class="flex items-center p-2 font-medium justify-between text-gray-700 rounded w-55 hover:bg-blue-100"
                            onclick="toggleMenu('Menu6')">Data Sektoral
                            <svg class="w-4 h-4 mr-2  transition-transform" id="icon-Menu6"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <!-- Sub Menu -->
                        <ul id="Menu6" class="{{ Request::is('sektorall*') || Request::is('sektoral_cont*') ? '' : 'hidden' }} ml-6 ">
                            <li class="rounded hover:bg-blue-100"><a href="{{ route('sektorall.dashboard') }}"
                                    class="flex items-center font-medium p-2
                                    {{ Request::is('sektorall*') ? 'text-blue-600 font-semibold' : 'text-gray-700' }} ">Konten
                                    Sektoral</a>
                            </li>
                            <li class="rounded hover:bg-blue-100"><a href="{{ route('sektoral_cont.dashboard') }}"
                                    class="flex items-center font-medium p-2
                                    {{ Request::is('sektoral_cont*') ? 'text-blue-600 font-semibold' : 'text-gray-700' }} ">Konten
                                    Sektoral Card</a>
                            </li>
                        </ul>
                    @endif
                </li>
                <li x-data="{ open: {{ Request::is('artikell*') ? 'true' : 'false' }} }"
                     class="mb-2 roundedw-55 hover:bg-blue-100">
                    @if (auth()->check() && auth()->user()->role === 'user')
                        <a x-show="open" href="{{ route('artikell.dashboard') }}"
                            class="flex font-medium items-center p-2
                            {{ Request::is('artikell*') ? 'text-blue-600 font-semibold' : 'text-gray-700' }}">
                            <span>Artikel</span>
                        </a>
                    @endif
                </li>
                <li x-data="{ open: {{ Request::is('beritaa*') ? 'true' : 'false' }} }"
                    class="mb-2 rounded w-55 hover:bg-blue-100">
                    @if (auth()->check() && auth()->user()->role === 'user')
                        <a x-show="open" href="{{ route('beritaa.dashboard') }}"
                            class="flex font-medium items-center p-2
                            {{ Request::is('beritaa*') ? 'text-blue-600 font-semibold' : 'text-gray-700' }}">
                            <span>Berita</span>
                        </a>
                    @endif
                </li>
            </ul>
        </div>

            <main class=" bg-stone-100  flex-1  min-w-screen p-6">
                {{ $slot ?? '' }}
            </main>

        <!-- Main Content -->
    </div>
</div>
    <script>
        const profileBtn = document.getElementById('profileBtn');
        const profileMenu = document.getElementById('profileMenu');
        const chevronIcon = document.getElementById('chevronIcon');
        profileBtn.addEventListener('click', () => {
            profileMenu.classList.toggle('hidden');
            chevronIcon.classList.toggle('rotate-180'); // putar ikon
        });

        // Tutup dropdown kalau klik di luar
        window.addEventListener('click', (e) => {
            if (!profileBtn.contains(e.target) && !profileMenu.contains(e.target)) {
                profileMenu.classList.add('hidden');
                chevronIcon.classList.remove('rotate-180');
            }
        });
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
