<x-layouts.sidebar>
    <div id="main-content" class="max-w-5xl mx-auto   min-h-screen ml-2 ">
        <div  class="rounded-2xl border  border-gray-200 bg-white ">
            <div class=" justify-between px-3  items-center ">
                {{-- Tombol kembali --}}
                <div class="flex text-[13px] p-5 text-gray-500justify-start">
                    <a href="{{ route('visi.dashboard') }}" class="inline-block mb-2  hover:underline">
                        Dashboard
                    </a>
                    <span class="mx-2">/</span>
                    <a class="inline-block mb-2 hover:underline">
                        Visi Dan Misi
                    </a>
                </div>
                <div id="main-content" class="text-center p-5 ">
                {{-- Judul artikel --}}
                <p class="text-gray-500 text-center text-sm mb-3">
                    Dipublikasikan Pada {{ $visi->created_at->translatedFormat('l d F Y.') }}
                </p>
                {{-- Isi artikel --}}
                <div class="prose max-w-none text-justify">
                     <h1 class="text-center font-medium text-2xl">Visi</h1>
                    <p class="text-justify leading-relaxed">
                        {!! $visi->misi!!}
                    </p>
                     <h1 class="text-center font-medium text-2xl">Misi</h1>
                    <p class="text-justify leading-relaxed">
                        {!! $visi->misi!!}
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-layouts.sidebar>
