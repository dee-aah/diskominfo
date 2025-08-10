<x-layouts.app>
    <main class="mx-auto max-w-6xl">
        {{-- Judul Section --}}
        <h1 class="text-[50px] font-bold text-center pb-10 pt-30">Artikel Terkini</h2>
            <div class=" justify-center mx-auto max-w-6xl">
                <div class="grid grid-cols-8  p-6 gap-2 md:grid-cols-8 mr-2">
                    {{-- Artikel Terbaru --}}
                    @if ($artikel)
                        <div class="md:col-span-4 shadow-md relative">
                            <img src="{{ asset('storage/artikel/' . $artikel->gambar) }}" alt="{{ $artikel->judul }}"
                                class="w-142  h-100 object-cover ">
                            <div class="absolute bottom-0 bg-gradient-to-t from-black to-transparent w-full p-4 rounded-b-lg">
                                <span
                                    class="bg-blue-600 text-white text-[14px] px-2 py-1 rounded">{{ $artikel->kategori->nama ?? '' }}</span>
                                <h4 class="text-white text-2xl font-bold mt-2">{{ $artikel->judul }}</h4>
                                <a href="{{ route('artikel.show', $artikel->id) }}"
                                    class="text-gray-100 text-[12px]">BACA SELENGKAPNYA...</a>
                            </div>
                        </div>
                    @endif
                    {{-- Artikel Lainnya --}}
                    <div class="grid grid-cols-2 hover:bg-blue-100 shadow-md col-span-4 gap-2 ">
                        @foreach ($artikels as $a)
                            <div class="relative">
                                <img src="{{ asset('storage/artikel/' . $a->gambar) }}" alt="{{ $a->judul }}"
                                    class="w-full h-44 object-cover ">
                                <div class="absolute bottom-0 bg-gradient-to-t from-black to-transparent w-full p-2 ">
                                    <span
                                        class="bg-blue-600 text-white text-xs px-2 py-1 rounded">{{ $a->kategori->nama ?? '' }}</span>
                                    <p class="text-white text-[12px] font-bold mt-1">{{ $a->judul }}</p>
                                    <a href="{{ route('artikel.show', $a->id) }}"
                                        class="text-gray-100 text-[10px] ">BACA SELENGKAPNYA...</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- sercing --}}
            <div class=" px-6 mx-auto  max-w-6xl py-4">
                <form action="{{ route('artikel.index') }}" method="GET" class="flex gap-2 justify-end my-4">
                    <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="Cari judul...."
                        class="border rounded px-3 py-2 w-1/3">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                        Cari
                    </button>
                </form>
                <div class="container bg-stone-50  max-w-6xl mx-auto px-4 py-8 grid mt-10 grid-cols-1 lg:grid-cols-4 gap-6">
                    {{-- Kolom Kiri - Daftar Berita --}}
                    <div class="lg:col-span-3 grid md:grid-cols-2 gap-6">
                        @foreach ($artikels as $artikel)
                            <div class=" p-4 rounded shadow-sm bg-white">
                                {{-- Gambar --}}
                                <img src="{{ asset('storage/artikel/' . $artikel->gambar) }}"
                                    alt="{{ $artikel->judul }}" class="w-full h-48 object-cover rounded">
                                {{-- Kategori --}}
                                <span class="inline-block mt-3 px-2 py-1 text-sm text-white rounded">
                                    {{ $artikel->judul }}
                                </span>

                                {{-- Judul --}}
                                <h2 class="mt-2 text-lg font-bold hover:text-blue-600">
                                    <a href="{{ route('artikel.show', $artikel->id) }}">{{ $artikel->judul }}</a>
                                </h2>

                                {{-- Deskripsi Singkat --}}
                                <p class="text-gray-600 mt-2">
                                    {{ Str::limit($artikel->deskripsi, 150) }}
                                </p>

                                {{-- Info tanggal & penulis --}}
                                <div class="flex items-center text-sm text-gray-500 mt-4 space-x-4">
                                <a href="{{route('artikel.show', $artikel->id)}}" class="justify-center"><span>BACA SELENGKAPNYA...</span></a>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    {{-- Kolom Kanan - Latest Stories --}}
                    <div class="lg:col-span-1">
                        <h3 class="text-lg font-semibold mb-4">Latest Stories</h3>
                        <div class="space-y-4">
                            @foreach ($latest as $item)
                                <div class="flex space-x-3">
                                    <img src="{{ asset('storage/artikel/' . $item->gambar) }}"
                                        alt="{{ $item->judul }}" class="w-20 h-20 object-cover rounded">
                                    <div>
                                        <a href="{{ route('artikel.show', $item->id) }}"
                                            class="font-semibold hover:text-blue-600 text-sm">
                                            {{ Str::limit($item->judul, 50) }}
                                        </a>
                                        <div class="text-xs text-gray-500">
                                            {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d F Y') }}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
    </main>
</x-layouts.app>
