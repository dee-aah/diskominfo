<x-layouts.app>
    <main class="mx-auto max-w-6xl">
        <div class="max-w-6xl mx-auto mt-20 md:mt-25">
            <h2 class="text-xl font-semibold text-center sm:text-justify bg-gray-300 pl-5 h-10 pt-1 sm:w-100 md:w-90">Berita DPPKBP3A Kota Tasikmalaya </h2>
            <hr class="w-full border-t-2 border-gray-400 mb-4">
            <div class="grid grid-cols-2 sm:grid-cols-3 grid-rows-2 p-2 md:p-0 h-80 md:h-130 ">
                <!-- Gambar 1 -->
                @if (isset($beritapopuler[0]))
                    <div class="relative col-span-1   sm:w-full sm:h-full sm:row-span-1">
                        <a href="{{ route('berita.show', $beritapopuler[0]->slug) }}">
                            <img src="{{ asset('storage/berita/' . $beritapopuler[0]->img) }}"
                                class="w-full h-full sm:object-top  object-cover">
                        </a>
                        <div class="absolute flex-col md:p-4 inset-x-0 bottom-0 h-10 sm:h-10 md:h-20 justify-center mx-auto  bg-black/50 text-white ">
                            <h3 class="text-xs sm:text-sm md:text-base text-center sm:text-justify font-semibold">
                                {{ $beritapopuler[0]->kategori ?? 'Tanpa Kategori' }}</h3>
                            <p class="text-sm hidden md:block text-center sm:text-justify">{{ $beritapopuler[0]->created_at->format('d F Y') }}</p>
                        </div>
                    </div>
                @endif
                <!-- Gambar 2 -->
                @if (isset($beritapopuler[1]))
                    <div class="relative col-span-1  sm:w-full sm:h-full sm:row-span-1">
                        <a href="{{ route('berita.show', $beritapopuler[1]->slug) }}">
                            <img src="{{ asset('storage/berita/' . $beritapopuler[1]->img) }}"
                                class="w-full h-full sm:object-top object-cover">
                        </a>
                        <div class="absolute flex-col md:p-4 inset-x-0 bottom-0 h-10 sm:h-10 md:h-20 justify-center  bg-black/50 text-white  ">
                            <h3 class="text-xs sm:text-sm md:text-base text-center sm:text-justify sm:text-sm  font-semibold">{{ $beritapopuler[1]->judul }}</h3>
                            <p class="text-xs hidden md:block text-center sm:text-justify">{{ $beritapopuler[1]->created_at->format('d F Y') }}</p>
                        </div>
                    </div>
                @endif
                <!-- Gambar 4 (tinggi di kanan) -->
                @if (isset($beritapopuler[2]))
                    <div class="relative col-span-1  sm:row-span-2">
                        <a href="{{ route('berita.show', $beritapopuler[2]->slug) }}">
                            <img src="{{ asset('storage/berita/' . $beritapopuler[2]->img) }}"
                                class="w-full h-full sm:object-top object-cover">
                        </a>
                        <div
                            class="absolute flex-col md:p-4 inset-x-0 bottom-0 h-10 md:h-20 justify-center  bg-black/50 text-white  ">
                            <h3 class="text-xssm:text-sm md:text-base text-center md:text-justify font-semibold">{{ $beritapopuler[2]->judul }}</h3>
                            <p class="text-xs hidden md:block text-center md:text-justify">{{ $beritapopuler[2]->created_at->format('d F Y') }}</p>
                        </div>
                    </div>
                @endif
                <!-- Gambar 3 (lebar di bawah) -->
                @if (isset($beritapopuler[3]))
                    <div class="relative sm:col-span-2  sm:row-span-1">
                        <a href="{{ route('berita.show', $beritapopuler[3]->slug) }}">
                            <img src="{{ asset('storage/berita/' . $beritapopuler[3]->img) }}"
                                class="w-full h-full sm:object-center object-cover">
                        </a>
                        <div
                            class="absolute flex-col inset-x-0 bottom-0 h-10 md:h-20 justify-center md:p-4 bg-black/50 text-white  ">
                            <h3 class="text-xs text-center sm:text-justify sm:text-sm md:text-base font-semibold">{{ $beritapopuler[3]->judul }}</h3>
                            <p class="text-xs hidden md:block text-center sm:text-justify md:text-sm">{{ $beritapopuler[3]->created_at->format('d F Y') }}</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        <div class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-4 p-4 md:p-0 gap-8 mt-6">           
            <!-- KONTEN UTAMA: 2 Card Berita -->
            <div class="lg:col-span-3 grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach ($beritalain as $berita)
                    <div class="bg-white shadow-md rounded p-4 flex flex-col justify-between">
                        <!-- Baris Gambar dan Judul -->
                        <div class="flex gap-4">
                            <!-- Gambar kecil -->
                            <div class="w-28 flex-shrink-0">
                                <img src="{{ asset('storage/berita/' . $berita->img) }}" alt="{{ $berita->judul }}"
                                    class="rounded w-full h-auto object-cover">
                            </div>
                            <!-- Judul dan kategori -->
                            <div class="flex flex-col text-xs ">
                                <span class="bg-blue-600 text-white text-xs  rounded-full px-2 mb-2 py-1 w-fit mb-1">
                                    {{ $berita->kategori }}
                                </span>
                                <h2 class="text-base md:text-lg font-bold leading-snug">
                                    <a href="{{ route('berita.show', $berita->slug) }}">
                                        {{ $berita->judul }}
                                    </a>
                                </h2>
                            </div>
                        </div>
                        <!-- Deskripsi -->
                        <p class="mt-4 text-gray-700 text-xs sm:text-sm md:text-base prose text-justify">
                            {!! Str::limit($berita->deskripsi, 150, '...') !!}
                        </p>
                        <!-- Footer -->
                        <div class="flex items-center justify-between mt-4 text-xs text-gray-500">
                            <div class="flex items-center gap-1">
                                <i class="fa-regular fa-clock mr-3"></i>
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
            <aside class="  hidden md:block py-4 space-y-4 h-fit  ">
                <h3 class="font-bold text-lg  pb-2 mb-2 text-center bg-slate-300 px-2 py-1">Latest Story</h3>
                <div class="shadow-md  p-3 bg-slate-300">
                @foreach ($beritaterbaru as $story)
                    <div class="flex gap-2 my-5 bg-slate-300 items-start">
                        <img src="{{ asset('storage/berita/' . $story->img) }}" alt="{{ $story->judul }}"
                            class="w-16 h-16 rounded object-cover">
                        <div class="text-sm flex flex-col font-medium">
                            <a href="{{ route('berita.show', $story->slug) }}" class="hover:text-blue-600">
                                {{ Str::limit($story->judul, 60, '...') }}
                            </a>  
                            <p class=" mt-2 text-[11px] font-normal">
                                <span><i class="fa-regular fa-clock mr-2"></i>
                                {{ $berita->created_at->translatedFormat('d F Y') }}</span>
                            </p>                                     
                        </div>                      
                    </div>
                @endforeach
            </div>
            </aside>
        </div>

        @foreach ($beritaselengkapnya as $berita)
            <div class=" ml-12 sm:ml-67  my-5 mb-10">
                <a class="text-xs sm:text-sm  text-white bg-blue-600 h-7 md:h-10 m-10 p-2 px-6 w-50 hover:bg-blue-400 rounded"
                    href="{{ route('kategori.berita', Str::slug($berita->kategori)) }}">
                    Lihat Seluruh Berita DPPKBP3A
                    <i class="fa-solid ml-4 fa-arrow-right"></i>
                </a>
            </div>
        @endforeach

        <div class=" mt-8 mx-auto max-w-6xl ">
            <h2 class="text-xl font-semibold text-center sm:text-justify bg-gray-300 pl-5 h-10 pt-1 sm:w-100 md:w-90">Berita Kota Tasikmalaya</h2>
            <hr class="w-full border-t-2 border-gray-400 mb-4">
            <div class="grid grid-cols-1 md:grid-cols-3 p-2  md:p-0 mt-4">
                <!-- Gambar besar kiri -->
                <div class="md:col-span-1">
                    @if (isset($beritapopulertasik[0]))
                    <div class="relative h-full">
                        <img src="{{ asset('storage/berita/' . $beritapopulertasik[0]->img) }}" alt="Berita Besar"
                            class="w-full h-full object-cover shadow">
                        <a href="{{ route('berita.show', $beritapopulertasik[0]->slug) }}" class="absolute flex-col inset-x-0 bottom-0 h-15 md:h-20 justify-center text-white p-2 bg-black/50 text-sm p-4">
                            <h3 class="text-base md:text-base font-semibold">{{ $beritapopulertasik[0]->kategori ?? 'Tanpa Kategori' }}
                            </h3>
                            <p class="text-xs  md:text-sm">{{ $beritapopulertasik[0]->created_at->format('d F Y') }}</p>
                        </a>
                    </div>
                    @endif
                </div>

                <!-- 4 Gambar kecil kanan -->
                <div class="md:col-span-2 grid grid-cols-2 ">
                    <!-- Gambar 1 -->
                    @foreach ($beritapopulertasik as $berita)
                    <div class="relative">
                        <img src="{{asset('storage/berita/'.$berita->img)}}" alt="Berita"
                            class="w-full h-48 md:h-64 object-cover  shadow">
                        <div class="absolute flex-col inset-x-0 bottom-0 h-10 md:h-20 justify-center text-white  bg-black/50 text-xs md:text-sm">
                            <h3 class="font-semibold text-center md:text-justify">{{$berita->judul}}</h3>
                            <p class="hidden md:block">{{ $berita->created_at->format('d F Y') }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-4 gap-8 my-6">
            <!-- KONTEN UTAMA: 2 Card Berita -->
            <div class="lg:col-span-3 grid grid-cols-1 md:grid-cols-2 p-4 md:p-0  gap-6">
                @foreach ($beritalaintasik as $berita)
                    <div class="bg-white shadow-md rounded p-4  flex flex-col justify-between">
                        <!-- Baris Gambar dan Judul -->
                        <div class="flex gap-4">
                            <!-- Gambar kecil -->
                            <div class="w-28 flex-shrink-0">
                                <img src="{{ asset('storage/berita/' . $berita->img) }}"
                                    alt="{{ $berita->judul }}" class="rounded w-full h-auto object-cover">
                            </div>
                            <!-- Judul dan kategori -->
                            <div class="flex flex-col ">
                                <span class="bg-blue-600 text-white text-sm px-2 mb-2 py-1 rounded w-fit mb-1">
                                    {{ $berita->kategori}}
                                </span>
                                <h2 class="text-base md:text-lg font-bold leading-snug">
                                    <a href="{{ route('berita.show', $berita->slug) }}">
                                        {{ $berita->judul }}
                                    </a>
                                </h2>
                            </div>
                        </div>
                        <!-- Deskripsi -->
                        <div class="mt-4 text-gray-700 prose text-xs sm:text-sm md:text-base text-justify">
                            {!! Str::limit($berita->deskripsi, 150, '...') !!}
                        </div>
                        <!-- Footer -->
                        <div class="flex items-center justify-between mt-4 text-xs text-gray-500">
                            <div class="flex items-center gap-1">
                                <i class="fa-regular fa-clock mr-3"></i>
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
            <aside class=" hidden md:block py-4 space-y-4 h-fit">
                <h3 class="font-bold text-lg  pb-2 mb-2 text-center bg-slate-300 px-2 py-1">Latest Local</h3>
                <div class="shadow-md  p-3 bg-slate-300">
                @foreach ($beritaterbarutasik as $story)
                    <div class="flex gap-2 my-5 bg-slate-300 items-start">
                        <img src="{{ asset('storage/berita/' . $story->img) }}" alt="{{ $story->judul }}"
                            class="w-16 h-16 rounded object-cover">
                        <div class="text-sm flex flex-col font-medium">
                            <a href="{{ route('berita.show', $story->slug) }}" class="hover:text-blue-600">
                                {{ Str::limit($story->judul, 60, '...') }}
                            </a>
                            <p class=" mt-2 text-[11px] font-normal">
                                <span><i class="fa-regular fa-clock mr-2"></i>
                                {{ $berita->created_at->translatedFormat('d F Y') }}</span>
                            </p>
                        </div>

                    </div>
                @endforeach
                </div>
            </aside>
        </div>
        @foreach ($beritaselengkapnyatasik as $berita)
            <div class="ml-5 md:ml-60 mb-10">
                <a class="text-xs md:text-base text-white bg-blue-600 h-5 md:h-10 m-10 p-2 px-6 w-50 hover:bg-blue-400 rounded"
                    href="{{ route('kategori.berita' ,  Str::slug($berita->kategori)) }}"> Lihat Seluruh Berita Kota
                    Tasikmalaya<i class="fa-solid ml-4 fa-arrow-right"></i>

                </a>
            </div>
        @endforeach
        </div>
    </main>
</x-layouts.app>
