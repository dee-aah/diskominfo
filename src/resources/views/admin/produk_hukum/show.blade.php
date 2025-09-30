<x-layouts.sidebar>
    <div id="main-content" class="max-w-5xl mx-auto   min-h-screen ml-2 ">
        <div  class="rounded-2xl border  border-gray-200 bg-white ">
            <div class=" justify-between px-3  items-center ">
                {{-- Tombol kembali --}}
                <div class="flex text-[13px] p-5 text-gray-500justify-start">
                    <a href="{{ route('produk_hukum.dashboard') }}" class="inline-block mb-2  hover:underline">
                        Dashboard
                    </a>
                    <span class="mx-2">/</span>
                    <a class="inline-block mb-2 hover:underline">
                        Produk Hukum
                    </a>
                </div>
                <div id="main-content" class="text-center p-5 ">
                {{-- Judul artikel --}}
                <h1 class="text-[30px] text-blue-500 text-center font-bold mb-4">Produk Hukum</h1>
                <p class="text-gray-500 text-center text-sm mb-3">
                    Dipublikasikan Pada {{ $produk_hukum->created_at->translatedFormat('l d F Y.') }}
                </p>
            <div class="grid grid-cols-1 md:grid-cols-4  gap-3">
        <!-- Thumbnail + Unduh -->
        <div class="text-center justify-start">
            <img src="{{ asset('storage/default/dok.png') }}"
                 alt="Thumbnail"
                 class="mx-auto w-48 shadow-md border rounded" />
            {{-- <a href="{{ route('produkhukum.download', $produk->id) }}"
               class="mt-3 inline-block bg-green-600 hover:bg-green-700 text-white text-sm px-4 py-2 rounded">
                Unduh
            </a> --}}
        </div>
                <div class="col-span-3">
            <table class="w-full text-sm border border-black">
                <tbody>
                    <tr class="border-b"><td class="bg-gray-100 p-2 font-semibold w-48">Jenis Peraturan</td><td class="p-2">{{ $produk_hukum->jenis_peraturan }}</td></tr>
                    <tr class="border-b"><td class="bg-gray-100 p-2 font-semibold">Judul Peraturan</td><td class="p-2">{{ $produk_hukum->judul_peraturan }}</td></tr>
                    <tr class="border-b"><td class="bg-gray-100 p-2 font-semibold">Nomor</td><td class="p-2">{{ $produk_hukum->nomor }}</td></tr>
                    <tr class="border-b"><td class="bg-gray-100 p-2 font-semibold">Tahun Terbit</td><td class="p-2">{{ $produk_hukum->tahun_terbit }}</td></tr>
                    <tr class="border-b"><td class="bg-gray-100 p-2 font-semibold">Singkatan Jenis</td><td class="p-2">{{ $produk_hukum->singkatan_jenis }}</td></tr>
                    <tr class="border-b"><td class="bg-gray-100 p-2 font-semibold">Tahun Penetapan</td><td class="p-2">{{ $produk_hukum->tahun_penetapan }}</td></tr>
                    <tr class="border-b"><td class="bg-gray-100 p-2 font-semibold">Tanggal Pengundangan</td><td class="p-2">{{ $produk_hukum->tanggal_pengundangan }}</td></tr>
                    <tr class="border-b"><td class="bg-gray-100 p-2 font-semibold">T.E.U Badan / Pengarang</td><td class="p-2">{{ $produk_hukum->pengarang }}</td></tr>
                    <tr class="border-b"><td class="bg-gray-100 p-2 font-semibold">Sumber</td><td class="p-2">{{ $produk_hukum->sumber }}</td></tr>
                    <tr class="border-b"><td class="bg-gray-100 p-2 font-semibold">Tempat Terbit</td><td class="p-2">{{ $produk_hukum->tempat_terbit }}</td></tr>
                    <tr class="border-b"><td class="bg-gray-100 p-2 font-semibold">Bidang Hukum</td><td class="p-2">{{ $produk_hukum->bidang_hukum }}</td></tr>
                    <tr class="border-b"><td class="bg-gray-100 p-2 font-semibold">Subjek</td><td class="p-2">{{ $produk_hukum->subjek }}</td></tr>
                    <tr class="border-b"><td class="bg-gray-100 p-2 font-semibold">Bahasa</td><td class="p-2">{{ $produk_hukum->bahasa }}</td></tr>
                    <tr class="border-b"><td class="bg-gray-100 p-2 font-semibold">Lokasi</td><td class="p-2">{{ $produk_hukum->lokasi }}</td></tr>
                    <tr class="border-b"><td class="bg-gray-100 p-2 font-semibold">Status</td><td class="p-2">{{ strtoupper($produk_hukum->status) }}</td></tr>
                    <tr class="border-b">
                        <td class="bg-gray-100 p-2 font-semibold">Lampiran</td>
                    </tr>
                </tbody>
            </table>

            <!-- Bagian Naskah Akademik -->
            <div class="my-5 ">
                <h2 class="font-semibold text-gray-700">Naskah Akademik</h2>
                @if($produk_hukum->naskah_akademik)
                    <a href="{{ route('produkhukum.download', $produk_hukum->id) }}"
                       class="text-red-600 hover:underline">Download</a>
                @else
                    <p class="text-gray-500 text-sm">Tidak tersedia</p>
                @endif
                <iframe src="{{asset('/storage/produk/'.$produk_hukum->lampiran)}}" width="100%" class="mb-6" height="600px"></iframe>
            </div>
        </div>
    </div>

            </div>
        </div>
    </div>
</x-layouts.sidebar>
