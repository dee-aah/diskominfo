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
                <h1 id="typewriter" class="text-lg sm:text-5xl font-bold leading-normal mb-4 text-white whitespace-nowrap">Tentang Kami
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
        <div class="bg-white mx-auto max-w-6xl py-10 ">
            <!-- Header dengan logo dan judul sejajar -->
            <div class="flex items-center justify-center gap-3 my-4">
                <h2 class="text-xl sm:text-1xl md:text-2xl font-bold text-black pb-5 sm:pb-6 ms:pb-7">
                    Tentang Kami
                </h2>
            </div>
            <!-- Konten Utama -->
            <div class="flex flex-col md:flex-row justify-center items-center gap-8 max-w-6xl mx-auto">
                <!-- Teks -->
                <div class="md:w-1/2 text-gray-700  text-justify px-5">
                    <div class="prose text-base  max-w-none space-y-1">
                        {!! $tentang->deskripsi !!}
                    </div>
                </div>
                <!-- Gambar -->
                <div class="md:w-1/2">
                    <img src="{{ asset('storage/tentang/'.$tentang->img ) }}" alt="Foto Kegiatan" class="rounded-md shadow-md w-full object-cover" />
                </div>
            </div>
        </div>
        <div class="max-w-6xl mx-auto ">
            <div class="flex items-center justify-center gap-3 mb-6">
                <h2 class="text-xl sm:text-1xl md:text-2xl font-bold text-black  pb-1">
                    Galeri Kegiatan
                </h2>
            </div>
                <!-- Carousel Wrapper -->
                <div class="relative overflow-hidden rounded-lg shadow-lg max-w-3xl mx-auto mb-6 h-full ">
                <!-- Gambar container -->
                    <div id="carousel" class="flex transition-transform duration-500">
                @foreach ($berita as $item)
                <div class="relative w-full text-white flex-shrink-0">
                    <img src="{{ asset('storage/berita/' . $item->img ) }}" class="w-full h-full object-cover rounded-lg shadow">
                    <div class="absolute bottom-0 w-full  bg-gradient-to-t from-black/70 text-center to-transparent p-6">
                    <h3 class="text-white font-bold text-xl">{{ $item->judul }}</h3>
                    <p class="text-white prose text-xs sm:text-sm">
                    {!! Str::limit($item->deskripsi, 100) !!}
                    </p>
                    </div>
                </div>
                @endforeach
                    </div>
      <!-- Tombol Navigasi -->
      <button id="prev" class="absolute top-1/2 left-2 -translate-y-1/2 bg-white p-2  rounded-xl px-3 shadow">
        <i class="fa-solid fa-arrow-left"></i>
      </button>
      <button id="next" class="absolute top-1/2 right-2 -translate-y-1/2 bg-white p-2 rounded-xl px-3 shadow">
        <i class="fa-solid fa-arrow-right"></i>
      </button>
    </div>
  </div>
    </main>
    <script>
  function animatePage() {
    document.body.classList.remove('opacity-0', 'translate-y-4');
  }

  const carousel = document.getElementById("carousel");
    const slides = carousel.children.length;
    let index = 0;

    document.getElementById("next").addEventListener("click", () => {
      index = (index + 1) % slides;
      carousel.style.transform = `translateX(-${index * 100}%)`;
    });

    document.getElementById("prev").addEventListener("click", () => {
      index = (index - 1 + slides) % slides;
      carousel.style.transform = `translateX(-${index * 100}%)`;
    });
</script>
</x-layouts.app>
