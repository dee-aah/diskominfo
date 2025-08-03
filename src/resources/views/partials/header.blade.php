<header>
<body class="bg-green-50">

  <!-- Navbar -->
  <nav class="bg-white shadow-md w-full fixed top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between h-20 items-center">
        <div class="flex items-center">
          <img src="{{ asset('img/Logo_Kota_Tasikmalaya.png') }}" alt="Logo" class="h-10 mr-3">
          <span class="text-xl font-bold text-blue-500">DPPKBP3A</span>
        </div>

        <!-- Desktop Menu -->
        <div class="hidden md:flex space-x-6 font-medium items-center">
          <a href="{{url('/beranda')}}" class="hover:text-blue-600">Beranda</a>
          <div class="relative group">
            <button class="hover:text-blue-600">Profil</button>
            <div class="absolute hidden group-hover:block bg-white shadow-md py-2 z-10">
              <a href="{{url('/visimisi')}}" class="block px-4 py-2 hover:bg-green-100">Visi Misi</a>
              <a href="{{url('/tupoksi')}}" class="block px-4 py-2 hover:bg-green-100">Tupoksi</a>
              <a href="{{url('/tentang')}}" class="block px-4 py-2 hover:bg-green-100">Tentang Kami</a>
              <a href="{{url('/struktur')}}" class="block px-4 py-2 hover:bg-green-100">Struktur Organisasi</a>
              <a href="{{url('/maklumat')}}" class="block px-4 py-2 hover:bg-green-100">Maklumat Pelayanan</a>
              <a href="{{url('/profil')}}" class="block px-4 py-2 hover:bg-green-100">Profil Pimpinan</a>
            </div>
          </div>
          <div class="relative group">
            <button class="hover:text-blue-600">Layanan</button>
            <div class="absolute hidden group-hover:block bg-white shadow-md py-2 z-10">
              <a href="{{url('/standarpelayanan')}}" class="block px-4 py-2 hover:bg-green-100">Standar Pelayanan</a>
              <a href="{{url('/ikm')}}"class="block px-4 py-2 hover:bg-green-100">IKM</a>
              <a href="{{url('/ppid')}}" class="block px-4 py-2 hover:bg-green-100">PPID</a>
              <a href="{{url('/spanlapor')}}" class="block px-4 py-2 hover:bg-green-100">SP4N Lapor</a>
              <a href="{{url('/informasi')}}"class="block px-4 py-2 hover:bg-green-100">Informasi Layanan</a>
            </div>
          </div>
          <div class="relative group">
            <button class="hover:text-blue-600">Dokumen</button>
            <div class="absolute hidden group-hover:block bg-white shadow-md py-2 z-10">
              <a href="{{url('/produkhukum')}}" class="block px-4 py-2 hover:bg-green-100">Produk Hukum</a>
              <a href="{{url('/dokevaluasi')}}" class="block px-4 py-2 hover:bg-green-100">Dokumen Evaluasi</a>
              <a href="{{url('/dokperencanaan')}}" class="block px-4 py-2 hover:bg-green-100">Dokumen Perencanaan</a>
            </div>
          </div>
          <div class="relative group">
            <button class="hover:text-blue-600">Berita</button>
            <div class="absolute hidden group-hover:block bg-white shadow-md py-2 z-10">
              <a href="{{url('/berita')}}" class="block px-4 py-2 hover:bg-green-100">Berita</a>
              <a href="{{url('/artikel')}}" class="block px-4 py-2 hover:bg-green-100">Artikel</a>
            </div>
          </div>
          <a href="#" class="hover:text-blue-600">Data Statistik Sektoral</a>
          <input type="text" placeholder="Cari..." class="px-3 py-1 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500"/>
        </div>

        <!-- Mobile Hamburger -->
        <div class="md:hidden flex items-center">
          <button id="menu-btn" class="text-gray-700 focus:outline-none">
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
          </button>
        </div>
      </div>
    </div>

   <!-- Hanya satu div dengan id="mobile-menu" -->
<div id="mobile-menu" class="hidden md:hidden px-4 pb-4 space-y-4 pt-2 bg-white shadow-md rounded-b-lg">

  <a href="#" class="block text-gray-700 hover:text-blue-600">Beranda</a>

  <!-- Profil Dropdown -->
  <div>
    <button class="flex justify-between items-center w-full font-semibold text-gray-700 mobile-dropdown-toggle">
      Profil
      <svg class="h-5 w-5 transition-transform transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
      </svg>
    </button>
    <ul class="pl-4 text-gray-600 space-y-1 mt-1 hidden">
      <li><a href="footer.html">Visi Misi</a></li>
      <li><a href="#">Tupoksi</a></li>
      <li><a href="#">Tentang Kami</a></li>
      <li><a href="#">Struktur Organisasi</a></li>
      <li><a href="#">Maklumat Pelayanan</a></li>
      <li><a href="profil.html">Profil Pimpinan</a></li>
    </ul>
  </div>

  <!-- Layanan Dropdown -->
  <div>
    <button class="flex justify-between items-center w-full font-semibold text-gray-700 mobile-dropdown-toggle">
      Layanan
      <svg class="h-5 w-5 transition-transform transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
      </svg>
    </button>
    <ul class="pl-4 text-gray-600 space-y-1 mt-1 hidden">
      <li><a href="#">Standar Pelayanan</a></li>
      <li><a href="#">IKM</a></li>
      <li><a href="#">PPID</a></li>
      <li><a href="#">SP4N Lapor</a></li>
      <li><a href="#">Informasi Layanan</a></li>
    </ul>
  </div>

  <!-- Dokumen Dropdown -->
  <div>
    <button class="flex justify-between items-center w-full font-semibold text-gray-700 mobile-dropdown-toggle">
      Dokumen
      <svg class="h-5 w-5 transition-transform transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
      </svg>
    </button>
    <ul class="pl-4 text-gray-600 space-y-1 mt-1 hidden">
      <li><a href="#">Produk Hukum</a></li>
      <li><a href="#">Dokumen Evaluasi</a></li>
      <li><a href="#">Dokumen Perencanaan</a></li>
    </ul>
  </div>

  <!-- Berita Dropdown -->
  <div>
    <button class="flex justify-between items-center w-full font-semibold text-gray-700 mobile-dropdown-toggle">
      Berita
      <svg class="h-5 w-5 transition-transform transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
      </svg>
    </button>
    <ul class="pl-4 text-gray-600 space-y-1 mt-1 hidden">
      <li><a href="#">Berita</a></li>
      <li><a href="#">Artikel</a></li>
    </ul>
  </div>
  <a href="#" class="block text-gray-700 hover:text-blue-600">Data Statistik Sektoral</a>
  <input type="text" placeholder="Cari..." class="w-full px-3 py-1 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500"/>
</div>
</nav>
</body>
  <script>
     document.addEventListener("DOMContentLoaded", function () {
    const toggles = document.querySelectorAll(".mobile-dropdown-toggle");

    toggles.forEach((toggle) => {
      toggle.addEventListener("click", function () {
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
    document.getElementById("menu-btn").addEventListener("click", function () {
      document.getElementById("mobile-menu").classList.toggle("hidden");
    });
  });
   </script>
</header>
