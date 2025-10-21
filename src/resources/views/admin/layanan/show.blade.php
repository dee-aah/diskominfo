<x-layouts.sidebar>
    <div id="main-content" class="max-w-5xl mx-auto   min-h-screen ml-2 ">
        <div  class="rounded-2xl border  border-gray-200 bg-white ">
            <div class=" justify-between px-3  items-center ">
                {{-- Tombol kembali --}}
                <div class="flex text-[13px] p-5 text-gray-500justify-start">
                    <a href="{{ route('layanan.dashboard') }}" class="inline-block mb-2  hover:underline">
                        Dashboard
                    </a>
                    <span class="mx-2">/</span>
                    <a class="inline-block mb-2 hover:underline">
                        {{$layanan->slug}}
                    </a>
                </div>
                <div id="main-content" class="text-center p-5 ">
                {{-- Judul artikel --}}
                <h1 class="text-[30px] text-blue-500 text-center font-bold mb-4">{{$layanan->program}}</h1>
                <p class="text-gray-500 text-center text-sm mb-3">
                    Dipublikasikan Pada {{ $layanan->created_at->translatedFormat('l d F Y.') }}
                </p>

                {{-- Gambar artikel --}}
                @if ($layanan->img)
                    <div class="mb-6">
                        <img src="{{ asset('storage/layanan/' . $layanan->img) }}"
                            class="w-full mx-auto  object-cover justify-content-center rounded-lg shadow-md">
                    </div>
                @endif
                <h1 class="text-[20px]  text-center font-bold mb-4">{{$layanan->nama}}</h1>
                <div class="prose max-w-none flex text-justify">
                    <p class="text-justify leading-relaxed">
                        {!! $layanan->deskripsi!!}
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-layouts.sidebar>
