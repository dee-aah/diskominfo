<x-layouts.app>
    <section class=" relative h-80 sm:h-screen md:h-screen overflow-hidden pt-20 "> <!-- tambahkan pt-16 untuk kompensasi navbar -->
        <div>
            <img class="absolute brightness-50   sm:object-top left-0 w-full h-full object-cover object-top z-0 transform-translate-y-5"
                src="{{asset('storage/konten/' . $konten->img) }}" alt="">
        </div>
        <!-- Overlay -->
        <div class="absolute  bg-black bg-opacity-50 z-10"></div>
        <!-- Konten Hero -->
        <div class="relative z-20 flex items-center justify-center sm:min-h-screen text-center px-4 sm:pt-5 md:pt-5 pt-8 pb-8">
            <div class="text-white sm:max-w-2xl sm:mt-5 md:mt-5 mt-8 mx-auto">
                <h1 id="typewriter" class="text-lg sm:text-5xl font-bold leading-normal mb-4 text-white whitespace-nowrap">Profil Pimpinan
                </h1>
                <p class="text-xs sm:text-lg md:text-lg sm:mb-6 mb-6">Dinas Pengendalian Penduduk, Keluarga Berencana, Pemberdayaan Perempuan, dan
                    Perlindungan Anak.</p>
            </div>
        </div>
        <!-- Wave SVG -->
        <div class="absolute bottom-0 left-0 right-0 overflow-hidden leading-[0] z-20">
            <svg class="relative block w-full h-[100px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"
                preserveAspectRatio="none">
                <path fill="#ffffff" fill-opacity="1"
                    d="M0,128L48,154.7C96,181,192,235,288,234.7C384,235,480,181,576,149.3C672,117,768,107,864,122.7C960,139,1056,181,1152,192C1248,203,1344,181,1392,170.7L1440,160L1440,320L0,320Z">
                </path>
            </svg>
        </div>
    </section>
        <section class="bg-white text-center max-w-6xl mx-auto  mt-8 sm:py-10">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 px-5 mt-8">
      <!-- Card -->
        @foreach ($profil as $item )
        <div class="bg-[#f3f3f3] shadow rounded-lg p-4 flex items-center gap-4">
            <div class="w-16 h-16 sm:w-18 sm:h-18 md:w-24 md:h-24 rounded-full overflow-hidden flex-shrink-0 relative">
                <div class="absolute inset-0 bg-red-600 rounded-full"></div>
                    <img src="{{asset('storage/profil/'. $item->img)}}" alt="Foto" class="relative w-full h-full object-cover">
            </div>
            <div>
            <p class="text-sm text-gray-500">{{$item->jabatan}}</p>
            <h3 class="font-semibold">{{$item->nama}}</h3>
            </div>
        </div>
        @endforeach
    </div>
  </section>
</x-layouts.app>
