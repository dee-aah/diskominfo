<header>

    <body class="bg-white">
        <!-- Navbar -->
        <nav class="bg-white shadow-md w-full fixed top-0 z-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-20 items-center">
                    <div class="flex items-center">
                        <img src="{{ asset('storage/default/Logo_Kota_Tasikmalaya.png') }}" alt="Logo"
                            class="h-10 mr-3">
                        <span class="text-xl font-bold font-sans text-[#476A9A]">DPPKBP3A</span>
                    </div>

                    <!-- Desktop Menu -->
                    <div class="hidden md:flex space-x-6 font-medium items-center">
                        <a href="{{ url('/beranda') }}" class="{{ request()->is('beranda') ? 'text-blue-600' : 'hover:text-blue-600' }}">Beranda</a>
                        <div class="relative group">
                            <button class="{{ request()->is('tentang','visimisi','profilPimpinan','struktur','tupoksi','maklumatt')
                                ? 'text-blue-600 ': 'hover:text-blue-600' }}">Profil</button>
                            <div class="absolute hidden  whitespace-nowrap w-auto min-w-0 group-hover:block bg-white shadow-md py-2 z-20">
                                <a href="{{ url('/tentang') }}"
                                    class="block text-center px-4 py-2 hover:bg-blue-100">Tentang
                                    Kami</a>
                                <a href="{{ url('/visimisi') }}"
                                    class="block px-4 text-center py-2 hover:bg-blue-100">Visi Misi</a>
                                <a href="{{ url('/profilPimpinan') }}"
                                    class="block px-4 text-center py-2 hover:bg-blue-100">Profil
                                    Pimpinan</a>
                                <a href="{{ url('/struktur') }}"
                                    class="block text-center px-4 py-2 hover:bg-blue-100">Struktur
                                    Organisasi</a>
                                <a href="{{ url('/tupoksi') }}"
                                    class="block text-center px-4 py-2 hover:bg-blue-100">Tupoksi</a>
                                <a href="{{ url('/maklumatt') }}"
                                    class="block text-center px-4 py-2 hover:bg-blue-100">Maklumat
                                    Pelayanan</a>
                            </div>
                        </div>
                        <div class="relative group">
                            <button class="{{ request()->is('layanans')
                                ? 'text-blue-600 ': 'hover:text-blue-600' }}">Layanan</button>
                            <div class="absolute hidden whitespace-nowrap w-auto min-w-0 group-hover:block bg-white shadow-md py-2 z-10">
                                <a href="{{ url('/layanans') }}"class="block px-4 text-center py-2 hover:bg-blue-100">Informasi
                                    Layanan</a>
                                <a href="{{ url('/standarpelayanan') }}"
                                    class="block px-4 py-2 text-center hover:bg-blue-100">Standar Pelayanan</a>
                                <a
                                    href="{{ url('https://ppid.tasikmalayakota.go.id/mekanisme-pengaduan/') }}"class="block text-center px-4 py-2 hover:bg-blue-100">IKM</a>
                                <a href="{{ url('https://ppid.tasikmalayakota.go.id/') }}"
                                    class="block px-4 py-2 text-center hover:bg-blue-100">PPID</a>
                                <a href="{{ url('https://ppid.tasikmalayakota.go.id/mekanisme-pengaduan/') }}"
                                    class="block px-4 text-center py-2 hover:bg-blue-100">SP4N Lapor</a>

                            </div>
                        </div>
                        <div class="relative group">
                            <button class="{{ request()->is('produkhukum','dokumenevaluasi','dokumenperencanaan')
                                ? 'text-blue-600 ': 'hover:text-blue-600' }}">Dokumen</button>
                            <div class="absolute whitespace-nowrap w-auto min-w-0 hidden group-hover:block bg-white shadow-md py-2 z-10">
                                <a href="{{ url('/produkhukum') }}"
                                    class="block text-center px-4 py-2 hover:bg-blue-100">Produk
                                    Hukum</a>
                                <a href="{{ url('/dokumenevaluasi') }}"
                                    class="block text-center px-4 py-2 hover:bg-blue-100">Dokumen
                                    Evaluasi</a>
                                <a href="{{ url('/dokumenperencanaan') }}"
                                    class="block px-4 py-2 text-center hover:bg-blue-100">Dokumen Perencanaan</a>
                            </div>
                        </div>
                        <div class="relative group">
                            <button class="{{ request()->is('beritakita','artikel')
                                ? 'text-blue-600 ': 'hover:text-blue-600' }}">Berita</button>
                            <div class="absolute whitespace-nowrap w-auto min-w-0 hidden group-hover:block bg-white shadow-md py-2 z-10">
                                <a href="{{ url('/berita') }}"
                                    class="block text-center px-4 py-2 hover:bg-blue-100">Berita</a>
                                <a href="{{ url('/artikel') }}"
                                    class="block text-center px-4 py-2 hover:bg-blue-100">Artikel</a>
                            </div>
                        </div>
                        <a href="{{ url('/sektoral') }}" class="{{ request()->is('sektoral') ? 'text-blue-600' : 'hover:text-blue-600' }}">Data Statistik Sektoral</a>

                    </div>

                    <!-- Mobile Hamburger -->
                    <div class="md:hidden flex items-center">
                        <button id="menu-btn" class="text-gray-700 focus:outline-none">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Hanya satu div dengan id="mobile-menu" -->
            <div id="mobile-menu" class="hidden md:hidden px-4 pb-4 space-y-4 pt-2 bg-white shadow-md rounded-b-lg">

                <a href="#" class="block text-gray-700 font-semibold hover:text-blue-600 active:text-blue-700">Beranda</a>

                <!-- Profil Dropdown -->
                <div>
                    <button
                        class="flex justify-between items-center w-full hover:text-blue-600 active:text-blue-700 font-semibold text-gray-700 mobile-dropdown-toggle">
                        Profil
                        <svg class="h-5 w-5 transition-transform transform" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <ul class="pl-4 text-gray-600 space-y-1 mt-1 hidden">
                        <li><a href="/visimisi" class="block hover:text-blue-600 active:text-blue-700">Visi Misi</a></li>
                        <li><a href="/tupoksi" class="block hover:text-blue-600 active:text-blue-700">Tupoksi</a></li>
                        <li><a href="/tentang" class="block hover:text-blue-600 active:text-blue-700">Tentang Kami</a></li>
                        <li><a href="/struktur" class="block hover:text-blue-600 active:text-blue-700">Struktur Organisasi</a></li>
                        <li><a href="/maklumatt" class="block hover:text-blue-600 active:text-blue-700">Maklumat Pelayanan</a></li>
                        <li><a href="/profilPimpinan" class="block hover:text-blue-600 active:text-blue-700">Profil Pimpinan</a></li>
                    </ul>
                </div>

                <!-- Layanan Dropdown -->
                <div>
                    <button
                        class="flex justify-between items-center w-full hover:text-blue-600 active:text-blue-700 font-semibold text-gray-700 mobile-dropdown-toggle">
                        Layanan
                        <svg class="h-5 w-5 transition-transform transform" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <ul class="pl-4 text-gray-600 space-y-1 mt-1 hidden">
                        <li><a href="/layanans" class="block hover:text-blue-600 active:text-blue-700">Informasi Layanan</a></li>
                        <li><a href="https://ppid.tasikmalayakota.go.id/mekanisme-pengaduan/" class="block hover:text-blue-600 active:text-blue-700">Standar Pelayanan</a></li>
                        <li><a href="#" class="block hover:text-blue-600 active:text-blue-700">IKM</a></li>
                        <li><a href="#" class="block hover:text-blue-600 active:text-blue-700">PPID</a></li>
                        <li><a href="https://ppid.tasikmalayakota.go.id/mekanisme-pengaduan/" class="block hover:text-blue-600 active:text-blue-700">SP4N Lapor</a></li>
                        
                    </ul>
                </div>

                <!-- Dokumen Dropdown -->
                <div>
                    <button
                        class="flex justify-between items-center w-full hover:text-blue-600 active:text-blue-700 font-semibold text-gray-700 mobile-dropdown-toggle">
                        Dokumen
                        <svg class="h-5 w-5 transition-transform transform" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <ul class="pl-4 text-gray-600 space-y-1 mt-1 hidden">
                        <li><a href="/produk_hukum" class="block hover:text-blue-600 active:text-blue-700">Produk Hukum</a></li>
                        <li><a href="/dokumenevaluasi" class="block hover:text-blue-600 active:text-blue-700">Dokumen Evaluasi</a></li>
                        <li><a href="/dokumenperencanaan" class="block hover:text-blue-600 active:text-blue-700">Dokumen Perencanaan</a></li>
                    </ul>
                </div>

                <!-- Berita Dropdown -->
                <div>
                    <button
                        class="flex justify-between items-center w-full hover:text-blue-600 active:text-blue-700 font-semibold text-gray-700 mobile-dropdown-toggle">
                        Berita
                        <svg class="h-5 w-5 transition-transform transform" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <ul class="pl-4 text-gray-600 space-y-1 mt-1 hidden">
                        <li><a href="#" class="block hover:text-blue-600 active:text-blue-700">Berita</a></li>
                        <li><a href="#" class="block hover:text-blue-600 active:text-blue-700">Artikel</a></li>
                    </ul>
                </div>
                <a href="#" class="block text-gray-700 font-semibold  hover:text-blue-600 active:text-blue-700">Data Statistik Sektoral</a>
                </div>
        </nav>
    </body>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const toggles = document.querySelectorAll(".mobile-dropdown-toggle");

            toggles.forEach((toggle) => {
                toggle.addEventListener("click", function() {
                    const target = this.nextElementSibling;
                    target.classList.toggle("hidden");

                    // Ganti ikon panah (jika dipakai)
                    const icon = this.querySelector("svg");
                    if (icon) {
                        icon.classList.toggle("rotate-180");
                    }
                });
            });

            // Hamburger button toggle
            document.getElementById("menu-btn").addEventListener("click", function() {
                document.getElementById("mobile-menu").classList.toggle("hidden");
            });
        });
    </script>
</header>
