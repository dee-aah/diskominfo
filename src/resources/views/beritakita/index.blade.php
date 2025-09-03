<x-layouts.app>
    <main class="mx-auto max-w-6xl">
        <div class="max-w-5xl mx-auto mt-30">
            <h2 class="text-xl font-semibold  bg-gray-300 pl-5 h-10 pt-1 w-90">Berita DPPKBP3A Kota Tasikmalaya </h2>
            <hr class="w-full border-t-2 border-gray-400 mb-4">
            <div class="grid grid-cols-3 grid-rows-2 h-[600px] gap-2">
                <!-- Gambar 1 -->
                @if (isset($beritapopuler[0]))
                    <div class="relative col-span-1 row-span-1">
                        <a href="{{ route('beritakita.show', $beritapopuler[0]->slug) }}">
                            <img src="{{ asset('storage/berita/' . $beritapopuler[0]->gambar) }}"
                                class="w-full h-full object-cover">
                        </a>
                        <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-40 text-white p-3 rounded-b-lg">
                            <h3 class="text-sm font-semibold">
                                {{ $beritapopuler[0]->kategori->nama ?? 'Tanpa Kategori' }}</h3>
                            <p class="text-xs">{{ $beritapopuler[0]->created_at->format('d F Y') }}</p>
                        </div>
                    </div>
                @endif
                <!-- Gambar 2 -->
                @if (isset($beritapopuler[1]))
                    <div class="relative col-span-1 row-span-1">
                        <a href="{{ route('beritakita.show', $beritapopuler[1]->slug) }}">
                            <img src="{{ asset('storage/berita/' . $beritapopuler[1]->gambar) }}"
                                class="w-full h-full object-cover">
                        </a>
                        <div
                            class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-40 text-white p-3 rounded-b-lg">
                            <h3 class="text-sm font-semibold">{{ $beritapopuler[1]->judul }}</h3>
                            <p class="text-xs">{{ $beritapopuler[1]->created_at->format('d F Y') }}</p>
                        </div>
                    </div>
                @endif
                <!-- Gambar 4 (tinggi di kanan) -->
                @if (isset($beritapopuler[2]))
                    <div class="relative col-span-1 row-span-2">
                        <a href="{{ route('beritakita.show', $beritapopuler[2]->slug) }}">
                            <img src="{{ asset('storage/berita/' . $beritapopuler[2]->gambar) }}"
                                class="w-full h-full object-cover">
                        </a>
                        <div
                            class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-40 text-white p-3 rounded-b-lg">
                            <h3 class="text-sm font-semibold">{{ $beritapopuler[2]->judul }}</h3>
                            <p class="text-xs">{{ $beritapopuler[2]->created_at->format('d F Y') }}</p>
                        </div>
                    </div>
                @endif
                <!-- Gambar 3 (lebar di bawah) -->
                @if (isset($beritapopuler[3]))
                    <div class="relative col-span-2 row-span-1">
                        <a href="{{ route('beritakita.show', $beritapopuler[3]->slug) }}">
                            <img src="{{ asset('storage/berita/' . $beritapopuler[3]->gambar) }}"
                                class="w-full h-full object-cover">
                        </a>
                        <div
                            class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-40 text-white p-3 rounded-b-lg">
                            <h3 class="text-sm font-semibold">{{ $beritapopuler[3]->judul }}</h3>
                            <p class="text-xs">{{ $beritapopuler[3]->created_at->format('d F Y') }}</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        <div class="max-w-5xl mx-auto grid grid-cols-1 lg:grid-cols-4 gap-8 mt-6">
            <!-- KONTEN UTAMA: 2 Card Berita -->
            <div class="lg:col-span-3 grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach ($beritalain as $berita)
                    <div class="bg-white shadow-md rounded p-4 border border-black flex flex-col justify-between">
                        <!-- Baris Gambar dan Judul -->
                        <div class="flex gap-4">
                            <!-- Gambar kecil -->
                            <div class="w-28 flex-shrink-0">
                                <img src="{{ asset('storage/berita/' . $berita->gambar) }}" alt="{{ $berita->judul }}"
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
                                <i class="fa-solid fa-upload mr-3"></i>
                                <span>{{ $berita->created_at->translatedFormat('d F Y') }}</span>
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
                <h3 class="font-bold text-lg border-b pb-2 mb-2 bg-gray-300 px-2 py-1">Berita Terbaru</h3>
                @foreach ($beritaterbaru as $story)
                    <div class="flex gap-2 items-start">
                        <img src="{{ asset('storage/berita/' . $story->gambar) }}" alt="{{ $story->judul }}"
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
         @foreach ($beritaselengkapnya as $berita )
            <div class=" ml-80 my-10">
                <a class="text-[14px] text-white bg-blue-600 h-10 m-10 p-2 px-6 w-50 hover:bg-blue-400 rounded" href="{{ route('kategori.berita', $berita->kategori->slug) }}"> Berita Lainnya..</a>
            </div>
        @endforeach
        <div class=" mt-8 mx-auto max-w-5xl ">
            <h2 class="text-xl font-semibold  bg-gray-300 pl-5 h-10 pt-1 w-90">Berita Kota Tasikmalaya</h2>
            <hr class="w-full border-t-2 border-gray-400 mb-4">
            <div class="grid grid-cols-3 grid-rows-2 h-[600px] gap-2">
                <!-- Gambar 1 -->
                @if (isset($beritapopulertasik[0]))
                    <div class="relative col-span-1 row-span-1">
                        <a href="{{ route('beritakita.show', $beritapopulertasik[0]->slug) }}">
                            <img src="{{ asset('storage/berita/' . $beritapopulertasik[0]->gambar) }}"
                                class="w-full h-full object-cover">
                        </a>
                        <div
                            class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-40 text-white p-3 rounded-b-lg">
                            <h3 class="text-sm font-semibold">
                                {{ $beritapopulertasik[0]->kategori->nama ?? 'Tanpa Kategori' }}</h3>
                            <p class="text-xs">{{ $beritapopulertasik[0]->created_at->format('d F Y') }}</p>
                        </div>
                    </div>
                @endif
                <!-- Gambar 2 -->
                @if (isset($beritapopulertasik[1]))
                    <div class="relative col-span-1 row-span-1">
                        <a href="{{ route('beritakita.show', $beritapopulertasik[1]->slug) }}">
                            <img src="{{ asset('storage/berita/' . $beritapopulertasik[1]->gambar) }}"
                                class="w-full h-full object-cover">
                        </a>
                        <div
                            class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-40 text-white p-3 rounded-b-lg">
                            <h3 class="text-sm font-semibold">{{ $beritapopulertasik[1]->judul }}</h3>
                            <p class="text-xs">{{ $beritapopulertasik[1]->created_at->format('d F Y') }}</p>
                        </div>
                    </div>
                @endif
                <!-- Gambar 4 (tinggi di kanan) -->
                @if (isset($beritapopulertasik[2]))
                    <div class="relative col-span-1 row-span-2">
                        <a href="{{ route('beritakita.show', $beritapopulertasik[2]->slug) }}">
                            <img src="{{ asset('storage/berita/' . $beritapopulertasik[2]->gambar) }}"
                                class="w-full h-full object-cover">
                        </a>
                        <div
                            class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-40 text-white p-3 rounded-b-lg">
                            <h3 class="text-sm font-semibold">{{ $beritapopulertasik[2]->judul }}</h3>
                            <p class="text-xs">{{ $beritapopulertasik[2]->created_at->format('d F Y') }}</p>
                        </div>
                    </div>
                @endif
                <!-- Gambar 3 (lebar di bawah) -->
                @if (isset($beritapopulertasik[3]))
                    <div class="relative col-span-2 row-span-1">
                        <a href="{{ route('beritakita.show', $beritapopulertasik[3]->slug) }}">
                            <img src="{{ asset('storage/berita/' . $beritapopulertasik[3]->gambar) }}"
                                class="w-full h-full object-cover">
                        </a>
                        <div
                            class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-40 text-white p-3 rounded-b-lg">
                            <h3 class="text-sm font-semibold">{{ $beritapopulertasik[3]->judul }}</h3>
                            <p class="text-xs">{{ $beritapopulertasik[3]->created_at->format('d F Y') }}</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <div class="max-w-5xl mx-auto grid grid-cols-1 lg:grid-cols-4 gap-8 my-6">
            <!-- KONTEN UTAMA: 2 Card Berita -->
            <div class="lg:col-span-3 grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach ($beritalaintasik as $berita)
                    <div class="bg-white shadow-md rounded p-4 border border-black flex flex-col justify-between">
                        <!-- Baris Gambar dan Judul -->
                        <div class="flex gap-4">
                            <!-- Gambar kecil -->
                            <div class="w-28 flex-shrink-0">
                                <img src="{{ asset('storage/berita/' . $berita->gambar) }}" alt="{{ $berita->judul }}"
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
                                <i class="fa-solid fa-upload mr-3"></i>
                                <span>{{ $berita->created_at->translatedFormat('d F Y') }}</span>
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
                <h3 class="font-bold text-lg border-b pb-2 mb-2 bg-gray-300 px-2 py-1">Berita Terbaru</h3>
                @foreach ($beritaterbarutasik as $story)
                    <div class="flex gap-2 items-start">
                        <img src="{{ asset('storage/berita/' . $story->gambar) }}" alt="{{ $story->judul }}"
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
        @foreach ($beritaselengkapnyatasik as $berita )
            <div class=" ml-80 mb-10">
                <a class="text-[14px] text-white bg-blue-600 h-10 m-10 p-2 px-6 w-50 hover:bg-blue-400 rounded" href="{{ route('kategori.berita', $berita->kategori->slug) }}"> Berita Lainnya..</a>
            </div>
        @endforeach
    </main>
</x-layouts.app>
