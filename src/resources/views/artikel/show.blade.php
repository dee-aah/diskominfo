<x-layouts.app>
    <div class=" container max-w-6xl mx-auto mt-20 px-4 py-8">
        {{-- Tombol kembali --}}
        <div class="flex text-[13px] text-gray-500justify-start">
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
        <h1 class="text-[30px] text-blue-500 text-center font-bold mb-4">{{ $artikel->judul }}</h1>
        <p class="text-gray-500 text-center mt-3 text-sm mb-2">
            {{ $artikel->penulis }}
        </p>
        <p class="text-gray-500 text-center text-sm mb-3">
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
            <p class="text-justify leading-relaxed">
    <span class="font-semibold">Kota Tasikmalaya - </span>
    {!! preg_replace('/^<p>(.*?)<\/p>$/', '$1', $artikel->deskripsi) !!}
</p>
        </div>
        <div class="mt-6 font-semibold text-black text-[18px]">#Tagline
            @php
                $tags = explode(',', $artikel->tag); // pecah string jadi array
            @endphp
            <p class=" text-[14px] text-white h-10 mt-3 mb-6 ">
                @foreach ($tags as $tag)
                    <span class="bg-gray-700 text-white px-2 py-1 mr-3">
                        {{ trim($tag) }}
                    </span>
                @endforeach
            </p </div>
        </div>
</x-layouts.app>
