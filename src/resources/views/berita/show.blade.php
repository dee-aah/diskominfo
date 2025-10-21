<x-layouts.app>
    <div class=" container max-w-6xl mx-auto mt-20 px-4 py-8">
        {{-- Tombol kembali --}}
        <div class="flex text-[10px] md:text-sm text-gray-500 justify-start">
            <a href="{{ url('/beranda') }}" class="inline-block mb-6  hover:underline">
                Beranda
            </a>
            <span class="mx-2">></span>
            <a href="{{ route('berita.index') }}" class="inline-block mb-6  hover:underline">
                Berita
            </a> <span class="mx-2">></span>
            <a href="{{ route('berita.index') }}" class="inline-block mb-6 hover:underline">
                {{ $berita->judul }}
            </a>
        </div>

        <h1 class="text-xl sm:text-2xl md:text-3xl text-blue-500 text-center font-bold mb-4">{{ $berita->judul }}</h1>
        <p class="text-gray-500 text-center mt-3 text-xs mb:text-sm mb-2">
            {{ $berita->penulis }}
        </p>
        <p class="text-gray-500 text-center text-xs mb:text-sm mb-3">
            Dipublikasikan Pada {{ $berita->created_at->translatedFormat('l d F Y.') }}
        </p>

        @if ($berita->img)
            <div class="mb-6">
                <img src="{{ asset('storage/berita/' . $berita->img) }}" alt="{{ $berita->judul }}"
                    class="w-full max-h-[500px] object-cover rounded-lg shadow-md">
            </div>
        @endif

        <div class="prose max-w-none flex text-justify">
            <div class="prose text-sm sm:text-base"><span style="font-weight:600"> Kota Tasikmalaya - {{ $berita->waktu->translatedFormat('l d F Y.') }}
                </span>
                {!! preg_replace('/^<p>(.*?)<\/p>$/', '$1', $berita->deskripsi) !!}
            </div>
        </div>
        <div class="mt-6 font-semibold text-black text:sm md:text-lg">#Tagline
            @php
                $tags = explode(',', $berita->tag); // pecah string jadi array
            @endphp
            <p class=" text-xs md:text-sm text-white h-10 mt-3 mb-6 ">
                @foreach ($tags as $tag)
                    <span class="bg-gray-700 text-white px-2 py-1 mr-3">
                        {{ trim($tag) }}
                    </span>
                @endforeach
            </p </div>
        </div>
</x-layouts.app>
