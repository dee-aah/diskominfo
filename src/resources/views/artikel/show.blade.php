{{-- resources/views/artikel/show.blade.php --}}
<x-layouts.app>
    <div class=" container max-w-5xl mx-auto mt-20 px-4 py-8">
        {{-- Tombol kembali --}}
        <div class="flex justify-start">
            <a href="{{ url('/beranda') }}"
            class="inline-block mb-6 text-blue-500 hover:underline">
            Beranda
            </a>
            <span class="mx-2">/</span>
            <a href="{{ route('artikel.index') }}"
            class="inline-block mb-6 text-blue-500 hover:underline">
            Artikel
            </a> <span class="mx-2">/</span>
            <a href="{{ route('artikel.index') }}"
            class="inline-block mb-6 text-blue-500 hover:underline">
            Artikel Keluarga Berncana
            </a>
        </div>


        {{-- Judul artikel --}}
        <h1 class="text-3xl font-bold mb-4">{{ $artikel->judul }}</h1>

        {{-- Tanggal publikasi --}}
        <p class="text-gray-500 text-sm mb-6">
            Dipublikasikan pada {{ $artikel->created_at->translatedFormat('d F Y') }}
        </p>

        {{-- Gambar artikel --}}
        @if ($artikel->gambar)
            <div class="mb-6">
                <img src="{{ asset('storage/artikel/' . $artikel->gambar) }}"
                     alt="{{ $artikel->judul }}"
                     class="w-full max-h-[500px] object-cover rounded-lg shadow-md">
            </div>
        @endif

        {{-- Isi artikel --}}
        <div class="prose max-w-none">
            {!! nl2br(e($artikel->isi)) !!}
        </div>
    </div>
</x-layouts.app>
