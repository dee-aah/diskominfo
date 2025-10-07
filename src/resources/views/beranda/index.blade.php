<x-layouts.app>

    <body class="bg-white">
        <!-- Hero Section -->
        <section class="relative h-screen overflow-hidden pt-16 ">
            <video autoplay muted loop playsinline
                class="brightness-50 absolute top-0 left-0 w-full h-full object-cover z-0 pointer-events-none">
                <source src="{{ asset('storage/konten/' . $konten->video) }}" loading="lazy" type="video/mp4" />
            </video>
            <div class="absolute bg-black bg-opacity-50 z-10"></div>
            <!-- Konten Hero -->
            <div class="relative z-20 flex items-center justify-center min-h-screen text-center px-4 pt-8 pb-8">
                <div class="text-white max-w-2xl mx-auto">
                    <h1 id="typewriter"
                        class="text-4xl text-white md:text-5xl font-bold leading-normal mb-4  whitespace-nowrap overflow-hidden typewriter">
                    </h1>
                    <p class="text-lg mb-6">Dinas Pengendalian Penduduk, Keluarga Berencana, Pemberdayaan Perempuan, dan
                        Perlindungan Anak.</p>
                    <a href="#layanan"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-full transition">Lihat Layanan
                        Kami</a>
                </div>
            </div>
            <!-- Wave SVG -->
            <div class="absolute bottom-0 left-0 right-0  overflow-hidden leading-[0] z-20">
                <svg class="relative block w-full h-[100px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"
                    preserveAspectRatio="none">
                    <path fill="#ffffff" fill-opacity="1"
                        d="M0,128L48,154.7C96,181,192,235,288,234.7C384,235,480,181,576,149.3C672,117,768,107,864,122.7C960,139,1056,181,1152,192C1248,203,1344,181,1392,170.7L1440,160L1440,320L0,320Z">
                    </path>
                </svg>
            </div>
        </section>
        <div class="min-h-screen flex max-w-6xl mx-auto items-center justify-center px-6 py-12 bg-white">
            <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                <!-- Gambar Kiri -->
                <div class="flex justify-center">
                    <img src="{{ asset('storage/pimpinan/' . $sambutan->img) }}" loading="lazy" alt="pimpinan"
                        class="w-72 md:w-76 ">
                </div>
                <!-- Konten Teks Kanan -->
                <div>
                    <p class="text-sm font-semibold text-blue-600 uppercase tracking-wide mb-2">
                        Kepala Dinas
                    </p>
                    <h1 class="text-2xl md:text-4xl font-bold mb-4">
                        {{ $sambutan->nama }}
                    </h1>
                    <div class="text-base md:text-lg text-justify prose text-gray-700 mb-6 leading-relaxed">
                        {!! $sambutan->deskripsi !!}
                        
                    </div>
                </div>
            </div>
        </div>

        <section id="layanan" class="max-w-6xl mx-auto px-6 py-10 ">
            <div class="grid grid-cols-3 gap-6 auto-rows-[200px] ">

                <!-- Card 1: Layanan DPPKBP3A -->
                @if (isset($layananBeranda[0]))
                <a href="{{ url('/layanans') }}"
                    class="bg-blue-100 p-6 rounded-lg text-sm text-justify shadow hover:shadow-xl transition relative row-span-2 cursor-pointer block">
                    <h3 class="text-lg text-center font-semibold py-4">{{$layananBeranda[0]->nama}}</h3>
                    <p class=" text-gray-700">
                        {!!$layananBeranda[0]->deskripsi!!}
                    </p>
                    <span class="absolute bottom-3 right-3 text-gray-600">↗</span>
                </a>
                @endif
                <!-- Card 2: Standar Pelayanan -->
                @if (isset($layananBeranda[1]))
                <a href="{{$layananBeranda[1]->link}}"
                    class="bg-rose-100 text-justify p-6 text-sm rounded-lg shadow hover:shadow-xl transition relative col-span-2 cursor-pointer block">
                    <h3 class="text-lg text-center font-semibold py-4">{{$layananBeranda[1]->nama}}</h3>
                    <p class=" prose  text-gray-700">
                        {!!$layananBeranda[1]->deskripsi!!}
                    </p>
                    <span class="absolute bottom-3 right-3 text-gray-600">↗</span>
                </a>
                @endif
                @if (isset($layananBeranda[2]))
                <!-- Card 3: IKM -->
                <a href="{{$layananBeranda[2]->link}}"
                    class="bg-yellow-100 text-sm text-justify p-6 rounded-lg shadow hover:shadow-xl transition relative cursor-pointer block">
                    <h3 class="text-lg text-center font-semibold py-4">{{$layananBeranda[2]->nama}}</h3>
                    <p class=" text-gray-700">
                        {!!$layananBeranda[2]->deskripsi!!}
                    </p>
                    <span class="absolute bottom-3 right-3 text-gray-600">↗</span>
                </a>
                @endif

                @if (isset($layananBeranda[3]))
                <!-- Card 4: PPID -->
                <a href="{{$layananBeranda[3]->link}}"
                    class="bg-green-100 p-6 text-sm text-justify rounded-lg shadow hover:shadow-xl transition relative cursor-pointer block">
                    <h3 class="text-lg text-center font-semibold py-4">{{$layananBeranda[3]->nama}}</h3>
                    <p class=" text-gray-700">
                        {!!$layananBeranda[3]->deskripsi!!}
                    </p>
                    <span class="absolute bottom-3 right-3 text-gray-600">↗</span>
                </a>
                @endif

                @if (isset($layananBeranda[4]))
                <!-- Card 5: SP4NLAPOR -->
                <a href="{{$layananBeranda[4]->link}}"
                    class="bg-orange-100 p-6 text-sm text-justify rounded-xl shadow hover:shadow-lg transition relative col-span-2 cursor-pointer block">
                    <h3 class="text-lg text-center font-semibold py-4">{{$layananBeranda[4]->nama}}</h3>
                    <p class=" text-gray-700">
                        {!!$layananBeranda[4]->deskripsi!!}
                    </p>
                    <span class="absolute bottom-3 right-3 text-gray-600">↗</span>
                </a>
                @endif
                @if (isset($layananBeranda[5]))
                <!-- Card 6: Data Statistik -->
                <a href="{{url('/sektoral')}}"
                    class="bg-gray-100 p-6 text-justify text-sm rounded-lg shadow hover:shadow-xl transition relative cursor-pointer block">
                    <h3 class="text-lg text-center font-semibold mb-2">{{$layananBeranda[5]->nama}}</h3>
                    <p class=" text-gray-700">
                        {!!$layananBeranda[5]->deskripsi!!}
                    </p>
                    <span class="absolute bottom-3 right-3 text-gray-600">↗</span>
                </a>
                @endif
            </div>
        </section>
        <section class="max-w-6xl mx-auto px-6 py-10 bg-white ">
            <div class="text-center mb-6">
                <h2 class="text-2xl font-bold">Sorotan Data Utama</h2>

            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 ">
                <!-- Card Template -->
                <!-- Repeat untuk setiap data dengan gaya seragam -->
                <div class="bg-yellow-100 rounded-lg shadow-xl p-5 text-center">
                    <p class="text-black text-sm mb-2">Total Penduduk</p>
                    <p class="text-2xl font-bold text-black">{{ number_format($totalpenduduk, 0, ',', '.') }}</p>
                    <p class="text-black text-sm">Jiwa Terdaftar Pada Tahun {{ $tahunpenduduk }}</p>
                </div>
                <div class="bg-rose-100 rounded-lg shadow-xl p-5 text-center">
                    <p class="text-black text-sm mb-2">Peserta KB</p>
                    <p class="text-2xl font-bold text-black">{{ number_format($datakbterbaru, 0, ',', '.') }} </p>
                    <p class="text-black text-sm">Akseptor Aktif Tahun {{ $tahunkbterbaru }}</p>
                </div>
                <div class=" bg-blue-100 shadow-xl/30 rounded-lg shadow-xl p-5 text-center">
                    <p class="text-black text-sm mb-2">Pasangan Usia Subur</p>
                    <p class="text-2xl font-bold text-black">{{ number_format($datasuburterbaru, 0, ',', '.') }}</p>
                    <p class="text-black text-sm">Total Data Per Tahun {{ $tahunsuburterbaru }} </p>
                </div>
                <div class="bg-orange-100 rounded-lg shadow-xl p-5 text-center">
                    <p class="text-black text-sm mb-2">Kasus Kekerasan Anak</p>
                    <p class="text-2xl font-bold text-black">{{ number_format($datakbterbaru, 0, ',', '.') }}</p>
                    <p class="text-black text-sm">Kasus Tahun {{ $tahunkasusterbaru }}</p>
                </div>

            </div>
            <div
                class="max-w-6xl mx-auto flex flex-col md:flex-row items-start md:items-center justify-between space-y-4 md:space-y-0 md:space-x-6">
            </div>
        </section>

        <section class="relative max-w-6xl mx-auto rounded-2xl bg-cover my-10 bg-center min-h-screen flex items-center"
            style="background-image: url('{{ asset('storage/konten/' . $konten->img) }}');">
            <!-- Overlay gelap -->
            <div class="absolute rounded-3xl max-w-6xl max-auto inset-0 bg-black/50"></div>
            <!-- Konten -->
            <div class="relative z-10 w-full px-6 md:px-16 lg:px-24">
                <div class="max-w-5xl text-center  text-white space-y-4">
                    <p class="text-2xl text-center font-medium tracking-wider text-gray-200">Tentang Kami</p>
                    <p class="text-lg  prose text-gray-200">
                        {!! $tentang_kami->deskripsi !!}
                    </p>
                    
                    <div class="flex flex-wrap justify-center gap-4 pt-4">
                        <a href="{{ url('/tentang') }}"
                            class="inline-flex items-center px-6 py-2 border border-white text-white rounded-full hover:bg-white hover:text-black transition">
                            Selengkapnya
                            <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                        <a href="{{ url('/profil') }}"
                            class="inline-flex items-center px-6 py-2 border border-white text-white rounded-full hover:bg-white hover:text-black transition">
                            Profil Pimpinan
                            <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <div class="max-w-6xl mx-auto mt-6  p-6">
            <h1 class="text-2xl font-bold text-center text-gray-800 mb-10">Berita Kota Tasikmalaya</h1>
            <div class="grid md:grid-cols-3 gap-6">
                <!-- Berita Utama -->
                <div class="md:col-span-2 bg-gray-200 rounded-lg shadow overflow-hidden">
                    @if ($beritatasik)
                        <div class="relative bg-gray-200">
                            <img src="{{ asset('storage/berita/' . $beritatasik->img) }}" alt="Gambar Berita"
                                class="w-full h-100 rounded-3xl p-3 object-cover">
                            <div class="absolute bottom-4 left-4">
                                <span
                                    class="bg-blue-800 text-white text-xs px-4 py-1 rounded">{{ $beritatasik->kategori}}</span>
                            </div>
                        </div>
                        <div class="p-4 bg-gray-200 text-sm text-justify">
                            <h2 class="text-lg font-semibold text-gray-800 mb-2">
                                {{ $beritatasik->judul }}
                            </h2>
                            <p class=" text-gray-600 mb-4">
                                {!! Str::limit($beritatasik->deskripsi, 200) !!}
                            </p>
                            <div class="flex justify-between items-center  text-sm text-gray-500 my-5">
                                <div class="flex items-center gap-1">
                                    <i class="fa-solid fa-upload"></i>
                                    <span>{{ $beritatasik->created_at->translatedFormat('l, d F Y') }}</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                    <span>{{ $beritatasik->penulis }}</span>
                                </div>
                            </div>
                            <a href="{{ route('beritakita.show', $beritatasik->slug) }}"
                                class="inline-flex mt-4 items-center justify-center w-full px-6 py-2 bg-[#476A9A] text-white text-sm rounded hover:bg-blue-800 transition">
                                Baca Selengkapnya
                                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                        </div>
                </div>
            @else
                <p class="  text-gray-500">Belum ada berita terbaru untuk kategori Kota Tasikmalaya.</p>
                @endif
                <!-- Konten Samping -->
                <div class="space-y-4">
                    <div class="flex justify-between pb-2">
                        <h2 class="font-bold">Berita Lainnya</h2>
                        <a href="{{ url('/beritakita') }}"
                            class="text-blue-700 text-sm inline-flex items-center gap-1 hover:underline">
                            Selengkapnya
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                    @foreach ($beritalaintasik as $item)
                        <div class="bg-gray-200 text-sm rounded-lg shadow p-4">
                            <div class="flex justify-between text-xs text-gray-500 mb-1">
                                <span class="bg-blue-800 text-white px-2 py-0.5 rounded">
                                    {{ $item->kategori }}
                                </span>
                                <span>{{ $item->created_at->translatedFormat('d F Y') }}</span>
                            </div>
                            <h3 class="font-semibold py-2 text-[16px] text-gray-800 mb-1">
                                    {{ $item->judul }}
                            </h3>
                            <p class=" text-gray-600 mb-2 line-clamp-2">
                                {!! Str::limit(strip_tags($item->deskripsi), 120) !!}
                            </p>
                            <a href="{{ route('beritakita.show', $item->slug) }}"
                                class="text-blue-700 text-[11px] inline-flex items-center gap-1 hover:underline">
                                Baca Selengkapnya
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                        </div>
                    @endforeach
                    <!-- CTA Update -->

                </div>
            </div>
            <h1 class="text-2xl font-bold text-center text-gray-800 my-10">Berita DPPKBP3A</h1>
            <div class="grid md:grid-cols-3 gap-6">
                <!-- Berita Utama -->
                <div class="md:col-span-2 bg-gray-200 rounded-lg shadow overflow-hidden">
                    @if ($berita)
                        <div class="relative">
                            <img src="{{ asset('storage/berita/' . $berita->img) }}" alt="Gambar Berita"
                                class="w-full h-100 rounded-3xl p-3 object-cover">
                            <div class="absolute bottom-4 left-4">
                                <span
                                    class="bg-blue-800 text-white text-xs px-4 py-1 rounded">{{ $berita->kategori }}</span>
                            </div>
                        </div>
                        <div class="p-4 text-sm text-justify bg-gray-200">
                            <h2 class="text-lg font-semibold text-gray-800 mb-2">
                                {{ $berita->judul }}
                            </h2>
                            <p class=" text-gray-600 mb-4">
                                {!! Str::limit($berita->deskripsi, 200) !!}
                            </p>
                            <div class="flex justify-between items-center text-sm text-gray-500 my-5">
                                <div class="flex items-center gap-1">
                                    <i class="fa-solid fa-upload"></i>
                                    <span>{{ $berita->created_at->translatedFormat('l, d F Y') }}</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                    <span>{{ $berita->penulis }}</span>
                                </div>
                            </div>
                            <a href="{{ route('beritakita.show', $berita->slug) }}"
                                class="inline-flex mt-4 items-center justify-center w-full px-6 py-2 bg-[#476A9A] text-white text-sm rounded hover:bg-blue-800 transition">
                                Baca Selengkapnya
                                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                        </div>
                </div>
                @else
                <p class="text-gray-500">Belum ada berita terbaru untuk kategori Kota Tasikmalaya.</p>
                @endif
                <!-- Konten Samping -->
                <div class="space-y-4">
                    <div class="flex justify-between pb-10">
                        <h2 class="font-bold">Berita Lainnya</h2>
                        <a href="{{ url('/beritakita') }}"
                            class="text-blue-700 text-sm inline-flex items-center gap-1 hover:underline">
                            Selengkapnya
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                    @foreach ($beritalain as $item)
                        <div class="bg-gray-200 text-sm text-gray-600 rounded-lg shadow p-4">
                            <div class="flex justify-between  text-xs text-gray-500 mb-1">
                                <span class="bg-blue-800 text-white px-2 py-0.5 rounded">
                                    {{ $item->kategori }}
                                </span>
                                <span>{{ $item->created_at->translatedFormat('d F Y') }}</span>
                            </div>
                            <h3 class="font-semibold py-2 text-[16px] text-gray-800 mb-1">
                                {{ $item->judul }}
                            </h3>
                            <p class=" mb-2 line-clamp-2">
                                {!! Str::limit(strip_tags($item->deskripsi), 120) !!}
                            </p>
                            <a href="{{ route('beritakita.show', $item->slug) }}"
                                class="text-blue-700 text-[11px] inline-flex items-center gap-1 hover:underline">
                                Baca Selengkapnya
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
            </div>
        </div>
        <section class="max-w-6xl mx-auto  py-10">
            <!-- Header -->
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h2 class="text-2xl font-bold md:text-2xl ">Artikel Terbaru</h2>
                    <p class="text-gray-500 text-sm md:text-base">Informasi dan Update Terkini Terkait DPPKBP3A</p>
                </div>
                <a href="{{ route('artikel.index') }}"
                    class="border border-gray-300 text-gray-700 px-4 py-2 text-sm rounded-md  hover:bg-[#476A9A] hover:text-white transition">Lihat
                    Semua</a>
            </div>
            <!-- Cards -->
            <div class="grid md:grid-cols-2 gap-6">
                <!-- Card 1 -->
                @foreach ($artikel as $item)
                    <div class="bg-gray-200 rounded-xl shadow overflow-hidden hover:shadow-lg transition duration-300">
                        <div class="relative">
                            <img src="{{ asset('storage/artikel/' . $item->img) }}" alt="Gambar Artikel"
                                class="w-full h-100 object-cover p-3 rounded-2xl">
                            <span
                                class="absolute bottom-5 left-5 bg-blue-800 text-white text-xs px-3 py-1 rounded-full shadow">{{ $item->kategori }}
                            </span>
                        </div>
                        <div class="p-5 bg-gray-200 space-y-2">
                            <h3 class="text-lg font-semibold">{{ $item->judul }}</h3>
                            <p class="text-sm text-justify text-gray-600">{!! Str::limit($item->deskripsi, 150) !!}</p>
                            <div class="flex justify-between items-center text-sm pt-3 text-gray-500 mb-4">
                                <div class="flex items-center gap-1">
                                    <i class="fa-solid fa-upload"></i>
                                    <span>{{ $item->created_at->locale('id')->diffForHumans() }}</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                    <span>{{ $item->penulis }}</span>
                                </div>
                            </div>
                            <a href="{{ route('artikel.index') }}"
                                class="inline-flex mt-4 items-center justify-center w-full px-6 py-2 bg-[#476A9A] text-white text-sm rounded hover:bg-blue-800 transition">
                                Baca Selengkapnya
                                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

    </body>
    <script>
        const text = "Selamat Datang di DPPKBP3A";
        const element = document.getElementById("typewriter");

        let index = 0;
        let isDeleting = false;

        function typeEffect() {
            if (!isDeleting) {
                element.textContent = text.substring(0, index + 1);
                index++;
                if (index === text.length) {
                    isDeleting = false; // ✅ sekarang bisa hapus
                    setTimeout(typeEffect, 1500);
                    return;
                }
            } else {
                element.textContent = text.substring(0, index - 1);
                index--;
                if (index === 0) {
                    isDeleting = false;
                }
            }
            setTimeout(typeEffect, isDeleting ? 50 : 100);
        }

        document.addEventListener("DOMContentLoaded", typeEffect);

        typeEffect();

        const backgrounds = ["2.jpg", "3.jpg", "gambar2.jpg", "gambar3.jpg", "gambar1.jpg"];
        const cards = document.querySelectorAll('#slideWrapper > div');
        const carousel = document.getElementById('carousel');
        const slideWrapper = document.getElementById('slideWrapper');
        let currentIndex = 0;

        function updateView() {
            // Update background
            carousel.style.backgroundImage = `url('/img/${backgrounds[currentIndex]}')`;


            // Update card colors
            cards.forEach((card, index) => {
                if (index === currentIndex) {
                    card.classList.remove("bg-white", "text-black", "bg-gray-100", "text-gray-700");
                    card.classList.add("bg-blue-700", "text-white");
                } else {
                    card.classList.remove("bg-blue-700", "text-white");
                    card.classList.add("bg-white", "text-black");
                }
            });

            // Move slideWrapper
            slideWrapper.style.transform = `translateX(-${currentIndex * 320}px)`;
        }

        function nextSlide() {
            if (currentIndex < cards.length - 1) {
                currentIndex++;
                updateView();
            }
        }

        function prevSlide() {
            if (currentIndex > 0) {
                currentIndex--;
                updateView();
            }
        }

        // Init on load
        updateView();
    </script>
</x-layouts.app>
