<x-layouts.app>
    <main>
        <section class="relative h-screen overflow-hidden "> <!-- tambahkan pt-16 untuk kompensasi navbar -->
            <div>
                <img class="absolute brightness-25  left-0 w-full h-full object-cover object-top z-0 transform-translate-y-5" src="{{ asset('storage/tentang/'. $tentang->gambar) }}" alt="">
            </div>

            <!-- Overlay -->
            <div class="absolute  bg-black bg-opacity-50 z-10"></div>

            <!-- Konten Hero -->
            <div class="relative z-20 flex items-center justify-center min-h-screen text-center px-4 pt-8 pb-8">
                <div class="text-white max-w-2xl">
                    <h1 id="typewriter"
                        class="text-4xl md:text-5xl font-bold leading-normal mb-4 text-white whitespace-nowrap">Tentang
                        Kami</h1>

                    <p class="text-lg mb-6">Dinas Pengendalian Penduduk, Keluarga Berencana, Pemberdayaan Perempuan, dan
                        Perlindungan Anak.</p>

                </div>
            </div>

            <!-- Wave SVG -->
            <div class="absolute bottom-0 left-0 right-0 overflow-hidden leading-[0] z-20">
                <svg class="relative block w-full h-[100px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"
                    preserveAspectRatio="none">
                    <path fill="oklch(0.985 0.001 106.423)" fill-opacity="1"
                        d="M0,128L48,154.7C96,181,192,235,288,234.7C384,235,480,181,576,149.3C672,117,768,107,864,122.7C960,139,1056,181,1152,192C1248,203,1344,181,1392,170.7L1440,160L1440,320L0,320Z">
                    </path>
                </svg>
            </div>
        </section>
        <div class="bg-white py-12 px-4 md:px-12">
            <!-- Header dengan logo dan judul sejajar -->
            <div class="flex items-center justify-center gap-3 mb-2">
                <h2 class="text-xl md:text-2xl font-bold text-black border-b-2 border-black pb-1">
                    Tentang Kami
                </h2>
            </div>

            <!-- Subjudul -->
            <p class="text-center text-md md:text-lg font-semibold text-black mb-10">
                Bersama keluarga, untuk masa depan yang lebih baik.
            </p>

            <!-- Konten Utama -->
            <div class="flex flex-col md:flex-row justify-center items-center gap-8 max-w-6xl mx-auto">
                <!-- Teks -->
                <div class="md:w-1/2 text-gray-700 text-justify px-2">
                    <p class="text-md leading-relaxed font-medium">
                        {{$tentang->deskripsi}}
                    </p>
                </div>

                <!-- Gambar -->
                <div class="md:w-1/2">
                    <img src="{{ asset('storage/tentang/'.$tentang->gambar_cont ) }}" alt="Foto Kegiatan" class="rounded-md shadow-md w-full object-cover" />
                </div>
            </div>
        </div>



        <div class="bg-stone-50 py-12 px-4">
            <h2 class="text-center text-2xl font-bold mb-10">Kegiatan</h2>
            <div class="flex flex-col md:flex-row justify-center items-center gap-8 max-w-5xl mx-auto">
                <!-- Card 1 -->
                @foreach ($beritaterbaru as $berita)
                <div class="relative group w-[300px] transition-all duration-500 hover:w-[50%] rounded-xl overflow-hidden shadow-md">
                    <img src="{{asset('storage/berita/'.$berita->gambar)}}" alt="Kegiatan 1"
                        class="w-full h-auto object-cover transition-all duration-500 rounded-xl" />
                    <div
                        class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition duration-300 flex items-center justify-center">
                        <p class="text-white font-bold text-xl text-center px-4">{{$berita->judul}}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </main>
</x-layouts.app>
