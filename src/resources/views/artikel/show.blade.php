<x-layouts.app>
    <div class=" container max-w-6xl mx-auto mt-20 px-4 py-8">
        {{-- Tombol kembali --}}
        <div class="flex text-[10px] md:text-xs text-gray-500justify-start">
            <a href="{{ url('/beranda') }}" class="inline-block mb-6  hover:underline">
                Beranda
            </a>
            <span class="mx-2">/</span>
            <a href="{{ route('artikel.index') }}" class="inline-block mb-6  hover:underline">
                Artikel
            </a> <span class="mx-2">/</span>
            <a  class="inline-block mb-6 hover:underline">
                {{ $artikel->judul }}
            </a>
        </div>


        {{-- Judul artikel --}}
        <h1 class="sm:text-2xl text-xl md:text-3xl text-blue-500 text-center font-bold mb-4">{{ $artikel->judul }}</h1>
        <p class="text-gray-500 text-center mt-3 text-xs md:text-sm mb-2">
            {{ $artikel->penulis }}
        </p>
        <p class="text-gray-500 text-center text-xs md:text-sm mb-3">
            Dipublikasikan Pada {{ $artikel->created_at->translatedFormat('l d F Y.') }}
        </p>

        {{-- Gambar artikel --}}
        @if ($artikel->img)
            <div class="mb-6">
                <img src="{{ asset('storage/artikel/' . $artikel->img) }}" alt="{{ $artikel->judul }}"
                    class="w-full max-h-[500px] object-cover rounded-lg shadow-md">
            </div>
        @endif

        {{-- Isi artikel --}}
        <div class="prose max-w-none flex text-justify">
            <div class="text-justify prose text-sm sm:text-base leading-relaxed">
                <span class="font-semibold">Kota Tasikmalaya - </span>
                {!! preg_replace('/^<p>(.*?)<\/p>$/', '$1', $artikel->deskripsi) !!}
            </div>
        </div>
        <div class="mt-6 font-semibold text-black text-sm md:text-base">#Tagline
            @php
                $tags = explode(',', $artikel->tag); // pecah string jadi array
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
