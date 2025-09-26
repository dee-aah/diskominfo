<x-layouts.sidebar>
    <div id="main-content" class="max-w-5xl mx-auto   min-h-screen ml-2 ">
        <div  class="rounded-2xl border  border-gray-200 bg-white ">
            <div class=" justify-between px-3  items-center ">
                {{-- Tombol kembali --}}
                <div class="flex text-[13px] p-5 text-gray-500justify-start">
                    <a href="{{ route('beritaa.dashboard') }}" class="inline-block mb-2  hover:underline">
                        Dashboard
                    </a>
                    <span class="mx-2">/</span>
                    <a class="inline-block mb-2 hover:underline">
                        {{ $berita->judul }}
                    </a>
                </div>
                <div id="main-content" class="text-center p-5 ">
                {{-- Judul artikel --}}
                <h1 class="text-[30px] text-blue-500 text-center font-bold mb-4">{{ $berita->judul }}</h1>
                <p class="text-gray-500 text-center mt-3 text-sm mb-2">
                    {{ $berita->penulis }}
                </p>
                <p class="text-gray-500 text-center text-sm mb-3">
                    Dipublikasikan Pada {{ $berita->created_at->translatedFormat('l d F Y.') }}
                </p>

                {{-- Gambar artikel --}}
                @if ($berita->img)
                    <div class="mb-6">
                        <img src="{{ asset('storage/berita/' . $berita->img) }}" alt="{{ $berita->judul }}"
                            class="w-full mx-auto  object-cover justify-content-center rounded-lg shadow-md">
                    </div>
                @endif

                {{-- Isi artikel --}}
                <div class="prose max-w-none flex text-justify">
                    <p class="text-justify leading-relaxed">
                        <span class="font-semibold">Kota Tasikmalaya - </span>
                        {!! preg_replace('/^<p>(.*?)<\/p>$/', '$1', $berita->deskripsi) !!}
                    </p>
                </div>
                <div class="mt-6 font-semibold text-justify text-black text-[18px]">#Tagline
                    @php
                        $tags = explode(',', $berita->tag); // pecah string jadi array
                    @endphp
                    <p class=" text-[14px] text-white h-10 mt-3  ">
                        @foreach ($tags as $tag)
                            <span class="bg-gray-700 text-white px-2 py-1 mr-3">
                                {{ trim($tag) }}
                            </span>
                        @endforeach
                    </p
                </div>
            </div>
        </div>
    </div>
</x-layouts.sidebar>
