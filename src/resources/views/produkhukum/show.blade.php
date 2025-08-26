<x-layouts.app>
    <div class="max-w-4xl mx-auto mt-8 bg-white  pt-20">
    <h1 class="text-xl font-bold text-red-700  mb-4">
        {{ strtoupper($produk->jenis_peraturan) }} Nomor: {{ $produk->nomor }} Tahun: {{ $produk->tahun_terbit }}
    </h1>
    <h4 class="border-b-3 my-4 text-[12px]">Dokumen Detail
    </h4>
    <div class="grid grid-cols-1 md:grid-cols-4  gap-3">
        <!-- Thumbnail + Unduh -->
        <div class="text-center justify-start">
            <img src="{{ asset('storage/produkimg/'.$ProdukHukumCont->img_pdf) }}"
                 alt="Thumbnail"
                 class="mx-auto w-48 shadow-md border" />
            <a href="{{ route('produkhukum.download', $produk->id) }}"
               class="mt-3 inline-block bg-green-600 hover:bg-green-700 text-white text-sm px-4 py-2 rounded">
                Unduh
            </a>
        </div>

        <!-- Detail Dokumen -->
        <div class="col-span-3">
            <table class="w-full text-sm border border-black">
                <tbody>
                    <tr class="border-b"><td class="bg-gray-100 p-2 font-semibold w-48">Jenis Peraturan</td><td class="p-2">{{ $produk->jenis_peraturan }}</td></tr>
                    <tr class="border-b"><td class="bg-gray-100 p-2 font-semibold">Judul Peraturan</td><td class="p-2">{{ $produk->judul_peraturan }}</td></tr>
                    <tr class="border-b"><td class="bg-gray-100 p-2 font-semibold">Nomor</td><td class="p-2">{{ $produk->nomor }}</td></tr>
                    <tr class="border-b"><td class="bg-gray-100 p-2 font-semibold">Tahun Terbit</td><td class="p-2">{{ $produk->tahun_terbit }}</td></tr>
                    <tr class="border-b"><td class="bg-gray-100 p-2 font-semibold">Singkatan Jenis</td><td class="p-2">{{ $produk->singkatan_jenis }}</td></tr>
                    <tr class="border-b"><td class="bg-gray-100 p-2 font-semibold">Tahun Penetapan</td><td class="p-2">{{ $produk->tahun_penetapan }}</td></tr>
                    <tr class="border-b"><td class="bg-gray-100 p-2 font-semibold">Tanggal Pengundangan</td><td class="p-2">{{ $produk->tanggal_pengundangan }}</td></tr>
                    <tr class="border-b"><td class="bg-gray-100 p-2 font-semibold">T.E.U Badan / Pengarang</td><td class="p-2">{{ $produk->pengarang }}</td></tr>
                    <tr class="border-b"><td class="bg-gray-100 p-2 font-semibold">Sumber</td><td class="p-2">{{ $produk->sumber }}</td></tr>
                    <tr class="border-b"><td class="bg-gray-100 p-2 font-semibold">Tempat Terbit</td><td class="p-2">{{ $produk->tempat_terbit }}</td></tr>
                    <tr class="border-b"><td class="bg-gray-100 p-2 font-semibold">Bidang Hukum</td><td class="p-2">{{ $produk->bidang_hukum }}</td></tr>
                    <tr class="border-b"><td class="bg-gray-100 p-2 font-semibold">Subjek</td><td class="p-2">{{ $produk->subjek }}</td></tr>
                    <tr class="border-b"><td class="bg-gray-100 p-2 font-semibold">Bahasa</td><td class="p-2">{{ $produk->bahasa }}</td></tr>
                    <tr class="border-b"><td class="bg-gray-100 p-2 font-semibold">Lokasi</td><td class="p-2">{{ $produk->lokasi }}</td></tr>
                    <tr class="border-b"><td class="bg-gray-100 p-2 font-semibold">Status</td><td class="p-2">{{ strtoupper($produk->status) }}</td></tr>
                    <tr class="border-b">
                        <td class="bg-gray-100 p-2 font-semibold">Lampiran</td>
                        <td class="p-2">
                            <a href="{{ route('produkhukum.download', $produk->id) }}"
                                class="text-red-600 hover:underline">Download</a>
                        </td>
                    </tr>
                </tbody>
            </table>

            <!-- Bagian Naskah Akademik -->
            <div class="mt-4 ">
                <h2 class="font-semibold text-gray-700">Naskah Akademik</h2>
                @if($produk->naskah_akademik)
                    <a href="{{ route('produkhukum.download', $produk->id) }}"
                       class="text-red-600 hover:underline">Download</a>
                @else
                    <p class="text-gray-500 text-sm">Tidak tersedia</p>
                @endif
            </div>
        </div>

    </div>@if ($pdfUrl)
        <iframe
            src="{{ asset('pdfjs-5.4.54-dist/web/viewer.html') }}?file={{ rawurlencode($pdfUrl) }}"
            class="w-full h-[80vh] border rounded-lg"></iframe>
    @else
        <p class="text-gray-500 text-sm">Lampiran belum tersedia</p>
    @endif
</div>
</x-layouts.app>
