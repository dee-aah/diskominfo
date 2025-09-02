<x-layouts.app>
    <body class="bg-white">
        <!-- Hero Section -->
        <section class="relative h-screen overflow-hidden pt-16 ">
            <video autoplay muted loop playsinline class="brightness-50 absolute top-0 left-0 w-full h-full object-cover z-0 pointer-events-none">
                <source src="{{asset('storage/pimpinan/'. $pimpinan->vidio)}}"  loading="lazy" type="video/mp4" />
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
                    <a href="{{route('layanans.index')}}"
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
        <div class="min-h-screen flex  items-center justify-center px-6 py-12 bg-white">
            <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                <!-- Gambar Kiri -->
                <div class="flex justify-center">
                    <img src="{{asset('storage/pimpinan/'. $pimpinan->gambar)}}" loading="lazy" alt="pimpinan" class="w-72 md:w-96">
                </div>
                <!-- Konten Teks Kanan -->
                <div>
                    <p class="text-sm font-semibold text-blue-600 uppercase tracking-wide mb-2">
                        Kepala Dinas
                    </p>
                    <h1 class="text-2xl md:text-4xl font-bold mb-4">
                        {{$pimpinan->nama}}
                    </h1>
                    <p class="text-base md:text-lg text-justify text-gray-700 mb-6 leading-relaxed">
                       {{$pimpinan->deskripsi}}
                    </p>
                </div>
            </div>
        </div>

        <section class="bg-white max-w-6xl mx-auto py-10">
            <div id="container1"></div>
            <div class="text-center mb-6">
                <h2 class="text-2xl font-bold">Layanan Utama</h2>
                <div class="h-1 w-16 bg-blue-500 mx-auto mt-2 rounded"></div>
                <p class="text-gray-600 mt-2 text-sm">Dapatkan pelayanan kami melalui menu di bawah yang tersedia di
                    DPPKBP3A</p>
            </div>
            <div id="carousel" class="relative bg-transition h-screen flex items-center justify-start px-15"
                style="background-image: url('gambar/bg.jpg');">
                <!-- Slide Area -->
                <div class="relative w-full max-w-screen-xl flex pl-8 pr-15 items-center overflow-hidden">
                    <div id="slideWrapper" class="flex space-x-6 transition-transform duration-500 ease-in-out">

                        <!-- Card 1 -->
                        <div id="card-0" class="min-w-[310px] max-w-md mr-5 p-10 rounded-lg shadow-lg">
                            <a href="{{url('/sektoral')}}">
                                <h2 class="text-2xl font-bold mb-2">Layanan DPPKBP3A</h2>
                                <div class="h-[2px] w-10 bg-white mb-4"></div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi maxime repellendus
                                    perspiciatis iusto non ex, voluptatem ea excepturi distinctio dignissimos dolorem,
                                    placeat nostrum a atque facere rerum corporis hic cupiditate!</p>
                                <div class="mt-4 text-right text-xl">↗</div>
                            </a>
                        </div>
                        <div id="card-0" class="min-w-[310px] mx-5 max-w-md p-10 rounded-lg shadow-lg">
                            <a href="">
                                <h2 class="text-2xl font-bold mb-2">Standar Pelayanan</h2>
                                <div class="h-[2px] w-10 bg-white mb-4"></div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi maxime repellendus
                                    perspiciatis iusto non ex, voluptatem ea excepturi distinctio dignissimos dolorem,
                                    placeat nostrum a atque facere rerum corporis hic cupiditate!</p>
                                <div class="mt-4 text-right text-xl">↗</div>
                            </a>
                        </div>
                        <!-- Card 2 -->
                        <div id="card-1" class="min-w-[310px] mx-5 max-w-md p-10 rounded-lg shadow-lg">
                            <a href="">
                                <h2 class="text-2xl font-bold mb-2">IKM</h2>
                                <div class="h-[2px] w-10 bg-white mb-4"></div>
                                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Accusamus aliquam officiis
                                    amet, fuga dolor sint nisi, aut quod at ad debitis dolores repellendus, in nesciunt
                                    sequi provident cumque explicabo quas?</p>
                                <div class="mt-4 text-right text-xl">↗</div>
                            </a>
                        </div>
                        <!-- Card 3 -->
                        <div id="card-2" class="min-w-[310px] mx-5 max-w-md p-10 rounded-lg shadow-lg">
                            <a href="{{url('https://ppid.tasikmalayakota.go.id/')}}">
                                <h2 class="text-2xl font-bold mb-2">PPID</h2>
                                <div class="h-[2px] w-10 bg-white mb-4"></div>
                                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Odit aut vero voluptatum
                                    cumque consectetur? Dicta vero deleniti accusamus eaque laboriosam vitae aut quos
                                    modi, nam ratione? Consectetur iste consequatur error.</p>
                                <div class="mt-4 text-right text-xl">↗</div>
                            </a>
                        </div>
                        <div id="card-2" class="min-w-[310px] mx-5 max-w-md p-10 rounded-lg shadow-lg">
                            <a href="{{url('https://www.lapor.go.id/instansi/pemerintah-kota-tasikmalaya')}}">
                                <h2 class="text-2xl font-bold mb-2">SP4N Lapor</h2>
                                <div class="h-[2px] w-10 bg-white mb-4"></div>
                                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Corporis iste consequatur
                                    ab voluptates, deleniti ipsa, dolores, quidem corrupti porro non consectetur. Esse,
                                    quas consequatur veniam laudantium temporibus nulla aperiam hic!</p>
                                <div class="mt-4 text-right text-xl">↗</div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Nav Buttons -->
                <div class="absolute bottom-10 right-10 flex space-x-3">
                    <button onclick="prevSlide()" class="bg-white p-2 rounded-full shadow hover:bg-gray-200">←</button>
                    <button onclick="nextSlide()" class="bg-white p-2 rounded-full shadow hover:bg-gray-200">→</button>
                </div>
            </div>
        </section>
        <section class="max-w-6xl mx-auto px-6 py-10">
            <h2 class="text-2xl font-semibold mb-6">Ringkasan Data Kependudukan</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-4">
                <!-- Card Template -->
                <!-- Repeat untuk setiap data dengan gaya seragam -->
                <div class="bg-white rounded-lg shadow p-5 text-center">
                    <p class="text-gray-500 text-sm mb-2">Total Penduduk</p>
                    <p class="text-2xl font-bold">{{number_format($totalpenduduk, 0, ',', '.')}} </p>
                    <p class="text-green-600 text-sm">Jiwa Terdaftar Pada Tahun {{$tahunpenduduk}}</p>
                </div>
                <div class="bg-white rounded-lg shadow p-5 text-center">
                    <p class="text-gray-500 text-sm mb-2">Index Pemberdayaan Gender</p>
                    <p class="text-2xl font-bold">{{number_format($datapemberdayaan, 2, ',', '.')}}</p>
                    <p class="text-green-600 text-sm">Poin Pada Tahun {{$tahunpemberdayaan}} </p>
                </div>
                <div class="bg-white rounded-lg shadow p-5 text-center">
                    <p class="text-gray-500 text-sm mb-2">Rasio Jenis Kelamin</p>
                    <p class="text-2xl font-bold">{{number_format($rasiojeniskelamin, 2, ',', '.')}}</p>
                    <p class="text-green-600 text-sm">Laki-laki per 100 Perempuan Tahun {{$tahunpenduduk}}</p>
                </div>
                <div class="bg-white rounded-lg shadow p-5 text-center">
                    <p class="text-gray-500 text-sm mb-2">Pasangan Usia Subur</p>
                    <p class="text-2xl font-bold">{{number_format($datasuburterbaru, 0, ',', '.')}}</p>
                    <p class="text-green-600 text-sm">Total Data Per Tahun {{$tahunsuburterbaru}} </p>
                </div>
                <div class="bg-white rounded-lg shadow p-5 text-center">
                    <p class="text-gray-500 text-sm mb-2">Kekerasan Pada Perempuan dan Anak</p>
                    <p class="text-2xl font-bold">{{$datakasusterbaru}}</p>
                    <p class="text-red-600 text-sm">Kasus Tahun {{$tahunkasusterbaru}}</p>
                </div>
                <div class="bg-white rounded-lg shadow p-5 text-center">
                    <p class="text-gray-500 text-sm mb-2">Peserta KB </p>
                    <p class="text-2xl font-bold">{{number_format($datakbterbaru, 0, ',', '.')}} </p>
                    <p class="text-green-600 text-sm">Akseptor Aktif Tahun {{$tahunkbterbaru}}</p>
                </div>
            </div>
            <div class="p-5 text-justify ">
                Data terkait topik Pengendalian Penduduk ini dihasilkan oleh Dinas Pengendalian Penduduk, Keluarga Berencana, Pemberdayaan Perempuan dan Perlindungan Anak Kota Tasikmalaya dan Badan Pusat Statistik Kota Tasikmalaya yang dikeluarkan dalam periode 1 tahun sekali.
            </div>

            <!-- Kanan -->
            <div class="flex-shrink-0 l  p-2">
                <a href="{{url('/sektoral')}}"
                    class="inline-flex items-center px-4 justify-end py-2 border border-gray-400 text-sm font-medium rounded-full hover:bg-[#476A9A] hover:text-white transition">
                    Selengkapnya
                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>
            <div
                class="max-w-6xl mx-auto flex flex-col md:flex-row items-start md:items-center justify-between space-y-4 md:space-y-0 md:space-x-6">
                <!-- Tengah -->
            </div>
        </section>
        <div class="text-center mb-6">
            <h2 class="text-2xl font-bold">Tentang kami</h2>
            <div class="h-1 w-16 bg-blue-500 mx-auto mt-2 rounded"></div>
            <div class="px-24">
                <p class="text-gray-600 mt-2 text-sm">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia sit
                    possimus adipisci vel, expedita a, veniam rem amet et quisquam sapiente, nisi reprehenderit! Quidem
                    quod aliquid aspernatur perspiciatis perferendis repellat.</p>
            </div>
        </div>
        <section class="relative max-w-6xl mx-auto bg-cover bg-center min-h-screen flex items-center"
            style="background-image: url('{{asset('storage/tentang/'. $tentang_kami->gambar)}}');">
            <!-- Overlay gelap -->
            <div class="absolute inset-0 bg-black/50"></div>
            <!-- Konten -->
            <div class="relative z-10 w-full px-6 md:px-16 lg:px-24">
                <div class="max-w-xl text-left text-white space-y-4">
                    <p class="text-sm font-semibold uppercase tracking-wider text-gray-200">Sekilas DPPKBP3A</p>
                    <p class="text-lg text-gray-200">
                        {{$tentang_kami->deskripsi}}
                    </p>
                    <div class="flex flex-wrap gap-4 pt-4">
                        <a href="tentang.html"
                            class="inline-flex items-center px-6 py-2 border border-white text-white rounded-full hover:bg-white hover:text-black transition">
                            Selengkapnya
                            <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                        <a href="profil.html"
                            class="inline-flex items-center px-6 py-2 border border-white text-white rounded-full hover:bg-white hover:text-black transition">
                            Direksi dan Komisaris
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
            <h1 class="text-3xl font-bold text-center text-gray-800 mb-2">Berita & Informasi Terkini</h1>
            <p class="text-center text-gray-600 mb-10">
                Dapatkan Informasi Terbaru Mengenai Program, Kegiatan, dan Perkembangan Terkini Dari Kota Tasikmalaya
            </p>
            <div class="grid md:grid-cols-3 gap-6">
                <!-- Berita Utama -->
                <div class="md:col-span-2 bg-white rounded-lg shadow overflow-hidden">
                    @if ($beritatasik)
                        <div class="relative">
                            <img src="{{ asset('storage/berita/' . $beritatasik->gambar) }}" alt="Gambar Berita"
                                class="w-full h-64 object-cover">
                            <div class="absolute bottom-4 left-4">
                                <span
                                    class="bg-blue-100 text-blue-800 text-xs px-3 py-1 rounded">{{ $beritatasik->kategori->nama }}</span>
                            </div>
                        </div>
                        <div class="p-4">
                            <h2 class="text-lg font-semibold text-gray-800 mb-2">
                                {{ $beritatasik->judul }}
                            </h2>
                            <p class="text-sm text-justify text-gray-600 mb-4">
                                {{ Str::limit($beritatasik->deskripsi, 200) }}
                            </p>
                            <div class="flex justify-between items-center text-sm text-gray-500 mb-4">
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
                    @foreach ($beritalaintasik as $item)
                        <div class="bg-white rounded-lg shadow p-4">
                            <div class="flex justify-between text-xs text-gray-500 mb-1">
                                <span class="bg-gray-200 text-gray-700 px-2 py-0.5 rounded">
                                    {{ $item->kategori->nama }}
                                </span>
                                <span>{{ $item->created_at->translatedFormat('d F Y') }}</span>
                            </div>
                            <h3 class="font-semibold py-2 text-[16px] text-gray-800 mb-1">
                                {{ $item->judul }}
                            </h3>
                            <p class="text-sm text-gray-600 mb-2 line-clamp-2">
                                {{ Str::limit(strip_tags($item->deskripsi), 120) }}
                            </p>
                            <a href="{{ route('beritakita.show', $item->slug) }}"
                                class="text-blue-700 text-sm inline-flex items-center gap-1 hover:underline">
                                Baca Selengkapnya
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                        </div>
                    @endforeach
                    <!-- CTA Update -->
                    <div class="bg-white rounded-lg shadow p-4 text-center">
                        <p class="text-sm text-gray-700 mb-3">Ikuti Terus Informasi Terbaru Dari Pemerintah Kota
                            Tasikmalaya
                        </p>
                        <a href="{{route('beritakita.index')}}"
                            class="inline-flex items-center justify-center px-6 text-sm py-2 bg-[#476A9A] text-white rounded hover:bg-blue-800 transition">
                            Lihat Semua Berita
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <p class="mt-10 pb-8 pt-10  text-center text-gray-600 ">
                Dapatkan Informasi Terbaru Mengenai Program, Kegiatan, dan Perkembangan Terkini Dari DPPKBP3A
            </p>
            <div class="grid md:grid-cols-3 gap-6">
                <!-- Berita Utama -->
                <div class="md:col-span-2 bg-white rounded-lg shadow overflow-hidden">
                    @if ($berita)
                        <div class="relative">
                            <img src="{{ asset('storage/berita/' . $berita->gambar) }}" alt="Gambar Berita"
                                class="w-full h-64 object-cover">
                            <div class="absolute bottom-4 left-4">
                                <span
                                    class="bg-blue-100 text-blue-800 text-xs px-3 py-1 rounded">{{ $berita->kategori->nama }}</span>
                            </div>
                        </div>
                        <div class="p-4">
                            <h2 class="text-lg font-semibold text-gray-800 mb-2">
                                {{ $berita->judul }}
                            </h2>
                            <p class="text-sm text-justify text-gray-600 mb-4">
                                {{ Str::limit($berita->deskripsi, 200) }}
                            </p>
                            <div class="flex justify-between items-center text-sm text-gray-500 mb-4">
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
                    @foreach ($beritalain as $item)
                        <div class="bg-white rounded-lg shadow p-4">
                            <div class="flex justify-between text-xs text-gray-500 mb-1">
                                <span class="bg-gray-200 text-gray-700 px-2 py-0.5 rounded">
                                    {{ $item->kategori->nama }}
                                </span>
                                <span>{{ $item->created_at->translatedFormat('d F Y') }}</span>
                            </div>
                            <h3 class="font-semibold py-2 text-[16px] text-gray-800 mb-1">
                                {{ $item->judul }}
                            </h3>
                            <p class="text-sm text-gray-600 mb-2 line-clamp-2">
                                {{ Str::limit(strip_tags($item->deskripsi), 120) }}
                            </p>
                            <a href="{{ route('beritakita.show', $item->slug) }}"
                                class="text-blue-700 text-sm inline-flex items-center gap-1 hover:underline">
                                Baca Selengkapnya
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                        </div>
                    @endforeach
                    <!-- CTA Update -->
                    <div class="bg-white rounded-lg shadow p-4 text-center">
                        <p class="text-sm text-gray-700 mb-3">Ikuti Terus Informasi Terbaru Dari DPPKBP3A Kota
                            Tasikmalaya
                        </p>
                        <a href="{{route('beritakita.index')}}"
                            class="inline-flex items-center justify-center px-6 text-sm py-2 bg-[#476A9A] text-white rounded hover:bg-blue-800 transition">
                            Lihat Semua Berita
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <section class="max-w-6xl mx-auto px-6 py-10">
            <!-- Header -->
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h2 class="text-3xl font-bold md:text-2xl ">Artikel Terbaru</h2>
                    <p class="text-gray-500 text-sm md:text-base">Informasi dan Update Terkini Terkait DPPKBP3A</p>
                </div>
                <a href="{{route('artikel.index')}}"
                    class="border border-gray-300 text-gray-700 px-4 py-2 text-sm rounded-md  hover:bg-[#476A9A] hover:text-white transition">Lihat
                    Semua</a>
            </div>
            <!-- Cards -->
            <div class="grid md:grid-cols-2 gap-6">
                <!-- Card 1 -->
                @foreach($artikel as $item)
                <div class="bg-white rounded-xl shadow overflow-hidden hover:shadow-lg transition duration-300">
                    <div class="relative">
                        <img src="{{asset('storage/artikel/'. $item->gambar)}}" alt="Gambar Artikel"
                            class="w-full h-48 object-cover rounded-t-xl">
                        <span
                            class="absolute bottom-2 left-2 bg-blue-600 text-white text-xs px-3 py-1 rounded-full shadow">{{$item->kategori->nama}}
                        </span>
                    </div>
                    <div class="p-5 space-y-2">
                        <h3 class="text-lg font-semibold">{{$item->judul}}</h3>
                        <p class="text-sm text-justify text-gray-600">{{ Str::limit($item->deskripsi, 150) }}</p>
                        <div class="flex justify-between items-center text-sm pt-3 text-gray-500 mb-4">
                                <div class="flex items-center gap-1">
                                    <i class="fa-solid fa-upload"></i>
                                    <span>{{ $item->created_at->translatedFormat('l, d F Y') }}</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                    <span>{{ $item->penulis }}</span>
                                </div>
                            </div>
                        <a href="{{route('artikel.index')}}"
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
