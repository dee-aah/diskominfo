<x-layouts.app>

    <body>
        <section class="relative h-screen overflow-hidden pt-20"> <!-- tambahkan pt-16 untuk kompensasi navbar -->
        <div>
            <img class="absolute brightness-25  left-0 w-full h-full object-cover object-top z-0 transform-translate-y-5"
                src="{{ asset('img/gambar4.jpg') }}" alt="">
        </div>
        <!-- Overlay -->
        <div class="absolute bg-black bg-opacity-50 z-10"></div>
            <!-- Konten Hero -->
            <div class="relative z-20 flex items-center justify-center min-h-screen text-center px-4 pt-8 pb-8">
                <div class="text-white max-w-2xl">
                    <h1 id="typewriter"
                        class="text-4xl md:text-5xl font-bold leading-normal mb-4 text-white whitespace-nowrap">Maklumat
                        Pelayanan</h1>
                    <p class="text-lg mb-6">Dinas Pengendalian Penduduk, Keluarga Berencana, Pemberdayaan Perempuan, dan
                        Perlindungan Anak.</p>
                </div>
            </div>
            <!-- Wave SVG -->
            <div class="absolute bottom-0 left-0 right-0 overflow-hidden leading-[0] z-20">
                <svg class="relative block w-full h-[100px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"
                    preserveAspectRatio="none">
                    <path  fill="oklch(0.985 0.001 106.423)" fill-opacity="1"
                        d="M0,128L48,154.7C96,181,192,235,288,234.7C384,235,480,181,576,149.3C672,117,768,107,864,122.7C960,139,1056,181,1152,192C1248,203,1344,181,1392,170.7L1440,160L1440,320L0,320Z">
                    </path>
                </svg>
            </div>
        </section>
        <div class="bg-stone-50 justify-center max-w-7xl mx-auto">
            <h2 class="text-center text-lg font-semibold text-gray-800 mb-2">
                Tugas Pokok dan Fungsi Organisasi
            </h2>
            <p class="text-center text-sm text-gray-600 mb-8">
                Tugas Pokok dan Fungsi merupakan pedoman peran strategis dalam mendukung tercapainya visi organisasi.
                Setiap elemen dalam Tupoksi mencerminkan kontribusi nyata terhadap efisiensi, pelayanan, dan
                pengembangan berkelanjutan.
            </p>
            <div class="flex justify-center my-6">
                <img src="{{asset('img/maklumat.jpg')}}" alt="Gambar" class="w-[70%] mx-auto" />
            </div>
    </body>
</x-layouts.app>
