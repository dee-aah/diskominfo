<x-layouts.app>
    <main class="mx-auto max-w-6xl">
        {{-- Judul Section --}}
        <h1 class="text-[50px] font-bold text-center pb-10 pt-30">Berita Terkini</h2>
            <div class=" justify-center mx-auto max-w-6xl">
                <div class="grid grid-cols-8  p-6 gap-2 md:grid-cols-8 mr-2">
                    {{-- Artikel Terbaru --}}
                    @if ($beritapertama)
                        <div class="md:col-span-4 shadow-md relative">
                            <img src="{{ asset('storage/berita/' . $beritapertama->gambar) }}" alt="{{ $beritapertama->judul }}"
                                class="w-142  h-100 object-cover ">
                            <div class="absolute bottom-0 bg-gradient-to-t from-black to-transparent w-full p-4 rounded-b-lg">
                                <span
                                    class="bg-blue-600 text-white text-[14px] px-2 py-1 rounded">{{ $beritapertama->kategori->nama ?? '' }}</span>
                                <h4 class="text-white text-2xl font-bold mt-2">{{ $beritapertama->judul }}</h4>
                                <a href="{{ route('beritakita.show', $beritapertama->id) }}"
                                    class="text-gray-100 text-[12px]">BACA SELENGKAPNYA...</a>
                            </div>
                        </div>
                    @endif
                    {{-- Artikel Lainnya --}}
                    <div class="grid grid-cols-2 hover:bg-blue-100 shadow-md col-span-4 gap-2 ">
                        @foreach ($beritalain as $a)
                            <div class="relative">
                                <img src="{{ asset('storage/berita/' . $a->gambar) }}" alt="{{ $a->judul }}"
                                    class="w-full h-44 object-cover ">
                                <div class="absolute bottom-0 bg-gradient-to-t from-black to-transparent w-full p-2 ">
                                    <span
                                        class="bg-blue-600 text-white text-xs px-2 py-1 rounded">{{ $a->kategori->nama ?? '' }}</span>
                                    <p class="text-white text-[12px] font-bold mt-1">{{ $a->judul }}</p>
                                    <a href="{{ route('beritakita.show', $a->id) }}"
                                        class="text-gray-100 text-[10px] ">BACA SELENGKAPNYA...</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- sercing --}}
            <div class=" px-6 mx-auto  max-w-6xl py-4">
                <form action="{{ route('beritakita.index') }}" method="GET" class="flex gap-2 justify-end my-4">
                    <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="Cari judul...."
                        class="border rounded px-3 py-2 w-1/3">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                        Cari
                    </button>
                </form>
                <div class="container bg-stone-50  max-w-6xl mx-auto px-4 py-8 mt-10 ">
                    {{-- Kolom Kiri - Daftar Berita --}}
                    @foreach ($kategoris as $kategori)
                    <h1 class="text-3xl text-blue-600 font-bold mt-6 ">{{ $kategori->nama }}</h1>
                    <h1 class="h-1 w-25 bg-blue-600 mt-2 mb-4 justify-start "></h1>
                    <div class="grid mt-10 grid-cols-1 lg:grid-cols-3 gap-3 ">
                        @foreach ($kategori->beritas as $berita)
                            <div class=" p-4 rounded shadow-sm bg-white">
                                {{-- Gambar --}}
                                <img src="{{ asset('storage/berita/' . $berita->gambar) }}"
                                    alt="{{ $berita->judul }}" class="w-full h-48 object-cover rounded">
                                {{-- Kategori --}}
                                <span class="inline-block mt-3 px-2 py-1 text-sm text-white rounded">
                                    {{ $berita->judul }}
                                </span>

                                {{-- Judul --}}
                                <h2 class="mt-2 text-lg font-bold hover:text-blue-600">
                                    <a href="{{ route('artikel.show', $berita->id) }}">{{ $berita->judul }}</a>
                                </h2>

                                {{-- Deskripsi Singkat --}}
                                <p class="text-gray-600 mt-2">
                                    {{ Str::limit($berita->deskripsi, 150) }}
                                </p>

                                {{-- Info tanggal & penulis --}}
                                <div class="flex items-center text-sm text-gray-500 mt-4 space-x-4">
                                <a href="{{route('artikel.show', $berita->id)}}" class="justify-center"><span>BACA SELENGKAPNYA...</span></a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <a href="{{route('beritakita.kategori',$kategori->id)}}">Lihat Semua Berita</a>
                @endforeach
                </div>
            </div>
    </main>
</x-layouts.app>
