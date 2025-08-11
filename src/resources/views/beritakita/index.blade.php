<x-layouts.app>
    <main class="mx-auto max-w-6xl">
        <div class="max-w-6xl mx-auto mt-30">
    <h2 class="text-xl font-semibold  bg-gray-300 pl-5 h-10 pt-1 w-90">Berita DPPKBP3A Kota Tasikmalaya </h2>
    <hr class="w-full border-t-2 border-gray-400 mb-4">
    <div class="grid grid-cols-3 grid-rows-2 h-[600px] gap-2">
        <!-- Gambar 1 -->
        @if(isset($beritapopuler[0]))
        <div class="relative col-span-1 row-span-1">
            <a href="{{ route('beritakita.show', $beritapopuler[0]->slug) }}">
                <img src="{{ asset('storage/berita/' . $beritapopuler[0]->gambar) }}"
                    class="w-full h-full object-cover">
            </a>
            <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-40 text-white p-3 rounded-b-lg">
                <h3 class="text-sm font-semibold">{{ $beritapopuler[0]->kategori->nama ?? 'Tanpa Kategori' }}</h3>
                <p class="text-xs">{{ $beritapopuler[0]->created_at->format('d F Y') }}</p>
            </div>
        </div>
        @endif

        <!-- Gambar 2 -->
        @if(isset($beritapopuler[1]))
        <div class="relative col-span-1 row-span-1">
            <a href="{{ route('beritakita.show', $beritapopuler[1]->slug) }}">
                <img src="{{ asset('storage/berita/' . $beritapopuler[1]->gambar) }}"
                    class="w-full h-full object-cover">
            </a>
            <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-40 text-white p-3 rounded-b-lg">
                <h3 class="text-sm font-semibold">{{ $beritapopuler[1]->judul }}</h3>
                <p class="text-xs">{{ $beritapopuler[1]->created_at->format('d F Y') }}</p>
            </div>
        </div>
        @endif

        <!-- Gambar 4 (tinggi di kanan) -->
        @if(isset($beritapopuler[2]))
        <div class="relative col-span-1 row-span-2">
            <a href="{{ route('beritakita.show', $beritapopuler[2]->slug) }}">
                <img src="{{ asset('storage/berita/' . $beritapopuler[2]->gambar) }}"
                    class="w-full h-full object-cover">
            </a>
            <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-40 text-white p-3 rounded-b-lg">
                <h3 class="text-sm font-semibold">{{ $beritapopuler[2]->judul }}</h3>
                <p class="text-xs">{{ $beritapopuler[2]->created_at->format('d F Y') }}</p>
            </div>
        </div>
        @endif
        <!-- Gambar 3 (lebar di bawah) -->
        @if(isset($beritapopuler[3]))
        <div class="relative col-span-2 row-span-1">
            <a href="{{ route('beritakita.show', $beritapopuler[3]->slug) }}">
                <img src="{{ asset('storage/berita/' . $beritapopuler[3]->gambar) }}"
                     class="w-full h-full object-cover">
            </a>
            <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-40 text-white p-3 rounded-b-lg">
                <h3 class="text-sm font-semibold">{{ $beritapopuler[3]->judul }}</h3>
                <p class="text-xs">{{ $beritapopuler[3]->created_at->format('d F Y') }}</p>
            </div>
        </div>
        @endif
    </div>
</div>
        <div class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-4 gap-8 mt-6">

            <!-- KONTEN UTAMA: 2 Card Berita -->
            <div class="lg:col-span-3 grid grid-cols-1 md:grid-cols-2 gap-6">
    @foreach ($beritalain as $berita)
        <div class="bg-white shadow-md rounded p-4 border border-black flex flex-col justify-between">
            <!-- Baris Gambar dan Judul -->
            <div class="flex gap-4">
                <!-- Gambar kecil -->
                <div class="w-28 flex-shrink-0">
                    <img src="{{ asset('storage/berita/' . $berita->gambar) }}"
                         alt="{{ $berita->judul }}"
                         class="rounded w-full h-auto object-cover">
                </div>
                <!-- Judul dan kategori -->
                <div class="flex flex-col ">
                    <span class="bg-blue-600 text-white text-[12px] px-2 mb-5 py-1 rounded w-fit mb-1">
                        {{ $berita->kategori->nama }}
                    </span>
                    <h2 class="text-[18px] font-bold leading-snug">
                        <a href="{{ route('beritakita.show', $berita->slug) }}">
                            {{ $berita->judul }}
                        </a>
                    </h2>
                </div>
            </div>

            <!-- Deskripsi -->
            <p class="mt-4 text-gray-700 text-[16px] text-justify">
                {{ Str::limit($berita->deskripsi, 150, '...') }}
            </p>

            <!-- Footer -->
            <div class="flex items-center justify-between mt-4 text-xs text-gray-500">
                <div class="flex items-center gap-1">
                    <i class="fa-solid fa-upload mr-3"></i> <span>{{ $berita->created_at->translatedFormat('d F Y') }}</span>
                </div>
                <div class="flex items-center gap-1">
                    <i class="fa-solid fa-user mr-3"></i><span>{{ $berita->penulis ?? 'Admin' }}</span>
                </div>
            </div>
        </div>
    @endforeach
</div>


            <!-- SIDEBAR -->
            <aside class="bg-gray-200 shadow rounded p-4 space-y-4 h-fit border">
    <h3 class="font-bold text-lg border-b pb-2 mb-2 bg-gray-300 px-2 py-1">Latest Stories</h3>

    @foreach ($beritaterbaru as $story)
        <div class="flex gap-2 items-start">
            <img src="{{ asset('storage/berita/' . $story->gambar) }}"
                 alt="{{ $story->judul }}"
                 class="w-16 h-16 rounded object-cover">
            <p class="text-sm font-medium">
                <a href="{{ route('beritakita.show', $story->slug) }}" class="hover:text-blue-600">
                    {{ Str::limit($story->judul, 60, '...') }}
                </a>
            </p>
        </div>
    @endforeach
</aside>


        </div>


        <div class=" mx-auto">
            <h2 class="text-xl font-semibold  bg-gray-300 pl-5 h-10 pt-1 w-90">Berita Kota Tasikmalaya</h2>
            <hr class="w-full border-t-2 border-gray-400 ">
            <div class="flex mt-4">
                <!-- Gambar besar kiri -->
                <div class="flex-1">
                    <div class="relative h-full">
                        <img src="gambar/local3.jpg" alt="Berita Besar" class="w-full h-full object-cover ">
                        <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-50 text-white p-4">
                            <h3 class="text-sm font-semibold">Masjid Al Hidayah, Oase di SPBU Cikurubuk</h3>
                            <p class="text-xs">18 Januari 2025</p>
                        </div>
                    </div>
                </div>

                <!-- 4 Gambar kecil kanan -->
                <div class="flex flex-col  w-[50%]">
                    <!-- 2 Gambar atas -->
                    <div class="flex ">
                        <div class="relative w-96">
                            <img src="gambar/local2.jpg" alt="Berita" class="w-full h-64 object-cover ">
                            <div
                                class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-50 text-white p-2 text-xs">
                                <h3 class="font-semibold">Masjid Agung Tasikmalaya Bersinar</h3>
                                <p>18 Januari 2025</p>
                            </div>
                        </div>
                        <div class="relative w-96">
                            <img src="gambar/local1.jpg" alt="Berita" class="w-full h-64 object-cover ">
                            <div
                                class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-50 text-white p-2 text-xs">
                                <h3 class="font-semibold">Monumen Tugu Titik 0 Klimoter</h3>
                                <p>18 Januari 2025</p>
                            </div>
                        </div>
                    </div>

                    <!-- 2 Gambar bawah -->
                    <div class="flex ">
                        <div class="relative w-96">
                            <img src="gambar/local4.jpg" alt="Berita" class="w-full h-64 object-cover ">
                            <div
                                class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-50 text-white p-2 text-xs">
                                <h3 class="font-semibold">Jalan HZ. Mustofa Pusat Belanja Ikonik Tasikmalaya</h3>
                                <p>18 Januari 2025</p>
                            </div>
                        </div>
                        <div class="relative w-96">
                            <img src="gambar/local5.jpg" alt="Berita" class="w-full h-64 object-cover ">
                            <div
                                class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-50 text-white p-2 text-xs">
                                <h3 class="font-semibold">Grand Metro Hotel Malam Hari</h3>
                                <p>18 Januari 2025</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="mt-10  grid grid-cols-1 lg:grid-cols-4 gap-8">

            <!-- KONTEN UTAMA: 2 Card Berita -->
            <div class="lg:col-span-3 grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- Kartu Berita 1 -->
                <div class="bg-white shadow rounded p-4 border border-black flex flex-col justify-between">
                    <!-- Baris Gambar dan Judul -->
                    <div class="flex gap-4">
                        <!-- Gambar kecil -->
                        <div class="w-28 flex-shrink-0">
                            <img src="gambar/berita2.jpg" alt="Anak-anak bermain"
                                class="rounded  w-full h-auto object-cover">
                        </div>
                        <!-- Judul dan kategori -->
                        <div class="flex flex-col justify-center">
                            <span class="bg-blue-600 text-white text-xs px-2 py-1 rounded w-fit mb-1">Anak</span>
                            <h2 class="text-base font-bold leading-snug">Gerakan Bersama Lindungi Anak dari Kekerasan
                            </h2>
                        </div>
                    </div>

                    <!-- Deskripsi -->
                    <p class="mt-4 text-gray-700 text-sm text-justify">
                        DPPKBP3A bersama lintas sektor menggelar kampanye perlindungan anak melalui kegiatan edukasi,
                        sosialisasi Undang-Undang Perlindungan Anak, dan pelatihan bagi orang tua serta guru. Tujuannya
                        adalah membangun lingkungan yang aman, ramah, dan mendukung tumbuh kembang anak secara optimal.
                    </p>

                    <!-- Footer -->
                    <div class="flex items-center justify-between mt-4 text-xs text-gray-500">
                        <div class="flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2v-5H3v5a2 2 0 002 2z" />
                            </svg>
                            <span>18 Januari 2025</span>
                        </div>
                        <div class="flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5.121 17.804A13.937 13.937 0 0112 15c2.21 0 4.304.535 6.121 1.483M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span>Admin DPPKBP3A</span>
                        </div>
                    </div>
                </div>

                <!-- Kartu Berita 2 -->
                <div class="bg-white shadow rounded p-4  border border-black flex flex-col justify-between">
                    <!-- Baris Gambar dan Judul -->
                    <div class="flex gap-4">
                        <!-- Gambar kecil -->
                        <div class="w-28 flex-shrink-0">
                            <img src="gambar/berita3.jpg" alt="Keluarga Bencana"
                                class="rounded w-full h-auto object-cover">
                        </div>
                        <!-- Judul dan kategori -->
                        <div class="flex flex-col justify-center">
                            <span class="bg-blue-600 text-white text-xs px-2 py-1 rounded w-fit mb-1">Keluarga
                                Bencana</span>
                            <h2 class="text-base font-bold leading-snug">Gerakan Bersama Lindungi Anak dari Kekerasan
                            </h2>
                        </div>
                    </div>
                    <!-- Deskripsi -->
                    <p class="mt-4 text-gray-700 text-sm text-justify">
                        DPPKBP3A bersama lintas sektor menggelar kampanye perlindungan anak melalui kegiatan edukasi...
                    </p>
                    <div class="flex items-center justify-between mt-4 text-xs text-gray-500">
                        <span>18 Januari 2025</span>
                        <span>Admin DPPKBP3A</span>
                    </div>
                </div>
                <div class="bg-white shadow rounded p-4  border border-black flex flex-col justify-between">
                    <!-- Baris Gambar dan Judul -->
                    <div class="flex gap-4">
                        <!-- Gambar kecil -->
                        <div class="w-28 flex-shrink-0">
                            <img src="gambar/berita4.jpg" alt="Keluarga Bencana"
                                class="rounded  w-full h-auto object-cover">
                        </div>
                        <!-- Judul dan kategori -->
                        <div class="flex flex-col justify-center">
                            <span class="bg-blue-600 text-white text-xs px-2 py-1 rounded w-fit mb-1">Keluarga
                                Bencana</span>
                            <h2 class="text-base font-bold leading-snug">Gerakan Bersama Lindungi Anak dari Kekerasan
                            </h2>
                        </div>
                    </div>
                    <!-- Deskripsi -->
                    <p class="mt-4 text-gray-700 text-sm text-justify">
                        DPPKBP3A bersama lintas sektor menggelar kampanye perlindungan anak melalui kegiatan edukasi...
                    </p>
                    <div class="flex items-center justify-between mt-4 text-xs text-gray-500">
                        <span>18 Januari 2025</span>
                        <span>Admin DPPKBP3A</span>
                    </div>
                </div>
                <div class="bg-white shadow rounded p-4  border border-black flex flex-col justify-between">
                    <!-- Baris Gambar dan Judul -->
                    <div class="flex gap-4">
                        <!-- Gambar kecil -->
                        <div class="w-28 flex-shrink-0">
                            <img src="gambar/berita5.jpg" alt="Keluarga Bencana"
                                class="rounded w-full h-auto object-cover">
                        </div>
                        <!-- Judul dan kategori -->
                        <div class="flex flex-col justify-center">
                            <span class="bg-blue-600 text-white text-xs px-2 py-1 rounded w-fit mb-1">Keluarga
                                Bencana</span>
                            <h2 class="text-base font-bold leading-snug">Gerakan Bersama Lindungi Anak dari Kekerasan
                            </h2>
                        </div>
                    </div>
                    <!-- Deskripsi -->
                    <p class="mt-4 text-gray-700 text-sm text-justify">
                        DPPKBP3A bersama lintas sektor menggelar kampanye perlindungan anak melalui kegiatan edukasi...
                    </p>
                    <div class="flex items-center justify-between mt-4 text-xs text-gray-500">
                        <span>18 Januari 2025</span>
                        <span>Admin DPPKBP3A</span>
                    </div>
                </div>
                <div class="bg-white shadow rounded p-4  border border-black flex flex-col justify-between">
                    <!-- Baris Gambar dan Judul -->
                    <div class="flex gap-4">
                        <!-- Gambar kecil -->
                        <div class="w-28 flex-shrink-0">
                            <img src="gambar/berita6.jpg" alt="Keluarga Bencana"
                                class="rounded w-full h-auto object-cover">
                        </div>
                        <!-- Judul dan kategori -->
                        <div class="flex flex-col justify-center">
                            <span class="bg-blue-600 text-white text-xs px-2 py-1 rounded w-fit mb-1">Keluarga
                                Bencana</span>
                            <h2 class="text-base font-bold leading-snug">Gerakan Bersama Lindungi Anak dari Kekerasan
                            </h2>
                        </div>
                    </div>

                    <!-- Deskripsi -->
                    <p class="mt-4 text-gray-700 text-sm text-justify">
                        DPPKBP3A bersama lintas sektor menggelar kampanye perlindungan anak melalui kegiatan edukasi...
                    </p>

                    <!-- Footer -->
                    <div class="flex items-center justify-between mt-4 text-xs text-gray-500">
                        <span>18 Januari 2025</span>
                        <span>Admin DPPKBP3A</span>
                    </div>
                </div>

                <div class="bg-white shadow rounded p-4  border border-black flex flex-col justify-between">
                    <!-- Baris Gambar dan Judul -->
                    <div class="flex gap-4">
                        <!-- Gambar kecil -->
                        <div class="w-28 flex-shrink-0">
                            <img src="gambar/berita8.jpg" alt="Keluarga Bencana"
                                class="rounded w-full h-auto object-cover">
                        </div>
                        <!-- Judul dan kategori -->
                        <div class="flex flex-col justify-center">
                            <span class="bg-blue-600 text-white text-xs px-2 py-1 rounded w-fit mb-1">Keluarga
                                Bencana</span>
                            <h2 class="text-base font-bold leading-snug">Gerakan Bersama Lindungi Anak dari Kekerasan
                            </h2>
                        </div>
                    </div>

                    <!-- Deskripsi -->
                    <p class="mt-4 text-gray-700 text-sm text-justify">
                        DPPKBP3A bersama lintas sektor menggelar kampanye perlindungan anak melalui kegiatan edukasi...
                    </p>

                    <!-- Footer -->
                    <div class="flex items-center justify-between mt-4 text-xs text-gray-500">
                        <span>18 Januari 2025</span>
                        <span>Admin DPPKBP3A</span>
                    </div>
                </div>
            </div>

            <!-- SIDEBAR -->
            <aside class="bg-gray-200 shadow rounded p-4 space-y-4 h-fit border">
                <h3 class="font-bold text-lg border-b pb-2 mb-2 bg-gray-300 px-2 py-1">Latest Stories</h3>

                <!-- Item Sidebar 1 -->

                <div class="flex gap-2 items-start">
                    <img src="gambar/berita1.jpg" alt="Thumb" class="w-16 h-16 rounded object-cover">
                    <p class="text-sm font-medium">Gerakan Bersama Lindungi Anak dari Kekerasan</p>
                </div>

                <!-- Item Sidebar 2 -->

                <div class="flex gap-2 items-start">
                    <img src="gambar/berita2.jpg" alt="Thumb" class="w-16 h-16 rounded object-cover">
                    <p class="text-sm font-medium">Gerakan Bersama Lindungi Anak dari Kekerasan</p>
                </div>
                <div class="flex gap-2 items-start">
                    <img src="gambar/berita3.jpg" alt="Thumb" class="w-16 h-16 rounded object-cover">
                    <p class="text-sm font-medium">Gerakan Bersama Lindungi Anak dari Kekerasan</p>
                </div>
                <div class="flex gap-2 items-start">
                    <img src="gambar/berita4.jpg" alt="Thumb" class="w-16 h-16 rounded object-cover">
                    <p class="text-sm font-medium">Gerakan Bersama Lindungi Anak dari Kekerasan</p>
                </div>
                <div class="flex gap-2 items-start">
                    <img src="gambar/berita5.jpg" alt="Thumb" class="w-16 h-16 rounded object-cover">
                    <p class="text-sm font-medium">Gerakan Bersama Lindungi Anak dari Kekerasan</p>
                </div>
                <div class="flex gap-2 items-start">
                    <img src="gambar/berita6.jpg" alt="Thumb" class="w-16 h-16 rounded object-cover">
                    <p class="text-sm font-medium">Gerakan Bersama Lindungi Anak dari Kekerasan</p>
                </div>
                <div class="flex gap-2 items-start">
                    <img src="gambar/berita7.jpg" alt="Thumb" class="w-16 h-16 rounded object-cover">
                    <p class="text-sm font-medium">Gerakan Bersama Lindungi Anak dari Kekerasan</p>
                </div>
                <div class="flex gap-2 items-start">
                    <img src="gambar/berita8.jpg" alt="Thumb" class="w-16 h-16 rounded object-cover">
                    <p class="text-sm font-medium">Gerakan Bersama Lindungi Anak dari Kekerasan</p>
                </div>
                <div class="flex gap-2 items-start">
                    <img src="gambar/berita9.jpg" alt="Thumb" class="w-16 h-16 rounded object-cover">
                    <p class="text-sm font-medium">Gerakan Bersama Lindungi Anak dari Kekerasan</p>
                </div>
            </aside>
    </main>
</x-layouts.app>
