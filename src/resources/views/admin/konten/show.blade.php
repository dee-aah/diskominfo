<x-layouts.sidebar>
    <div id="main-content" class="max-w-5xl mx-auto   min-h-screen ml-2 ">
        <div  class="rounded-2xl border  border-gray-200 bg-white ">
            <div class=" justify-between px-3  items-center ">
                {{-- Tombol kembali --}}
                <div class="flex text-[13px] p-5 text-gray-500justify-start">
                    <a href="{{ route('konten.dashboard') }}" class="inline-block mb-2  hover:underline">
                        Dashboard
                    </a>
                    <span class="mx-2">/</span>
                    <a class="inline-block mb-2 hover:underline">
                        Konten
                    </a>
                </div>
                <div id="main-content" class="text-center p-5 ">
                {{-- Judul artikel --}}
                <h1 class="text-[30px] text-blue-500 text-center font-bold mb-4">{{$konten->nama}}</h1>
                <p class="text-gray-500 text-center text-sm mb-3">
                    Dipublikasikan Pada {{ $konten->created_at->translatedFormat('l d F Y.') }}
                </p>
                {{-- Isi artikel --}}
                <div class="prose max-w-none text-center">

                    @if ($konten->img)
                    <div class="mb-6">
                        <img src="{{ asset('storage/konten/' . $konten->img) }}"
                            class="w-full mx-auto  object-cover justify-content-center rounded-lg shadow-md">
                    </div>
                    @endif
                    <div class="mb-6">
                    <video autoplay muted loop playsinline
                            class="brightness-50  w-1/2 object-cover mx-auto justify-content-center pointer-events-none">
                            <source src="{{ asset('storage/konten/' . $konten->video) }}" loading="lazy" type="video/mp4" />
                    </video>

                    </div>
                    <p class="text-justify leading-relaxed">
                        {!! $konten->deskripsi!!}
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-layouts.sidebar>
