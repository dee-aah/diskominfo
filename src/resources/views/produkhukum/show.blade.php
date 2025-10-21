<x-layouts.app>
    <div class="max-w-6xl mx-auto mt-8 bg-white  pt-20">
        <h1 class="text-xl font-bold text-black  my-4">
            {{ strtoupper($produk->jenis_peraturan) }} NOMOR {{ $produk->nomor }} TAHUN {{ $produk->tahun_terbit }}
        </h1>
        <h4 class="border-b-3 my-4 text-[18px]">Dokumen Detail</h4>
        <div class="grid grid-cols-1 md:grid-cols-4  gap-3">
            <!-- Thumbnail + Unduh -->
            <div class="text-center justify-start">
                <a href="{{ route('produkhukum.download', $produk->id) }}"><img src="{{ asset('storage/default/pdf.png') }}" alt="Thumbnail"
                    class=" w-full  shadow-lg rounded" /></a>
                <a href="{{ route('produkhukum.download', $produk->id) }}"
                    class="mt-3 inline-block bg-[#728DB2] hover:bg-gray-700 text-white text-sm px-8 py-2 rounded">
                    Unduh
                </a>
            </div>
            <!-- Detail Dokumen -->
            <div class="col-span-3">
                <table class="w-full text-sm shadow-lg">
                    <tbody>
                        <tr>
                            <td class="bg-gray-100 p-2 font-semibold w-48">Jenis Peraturan</td>
                            <td class="p-2 bg-gray-100">{{ $produk->jenis_peraturan }}</td>
                        </tr>
                        <tr>
                            <td class=" p-2 font-semibold">Judul Peraturan</td>
                            <td class="p-2 ">{{ $produk->judul_peraturan }}</td>
                        </tr>
                        <tr>
                            <td class="bg-gray-100 p-2 font-semibold">Nomor</td>
                            <td class="p-2 bg-gray-100">{{ $produk->nomor }}</td>
                        </tr>
                        <tr>
                            <td class=" p-2 font-semibold">Tahun Terbit</td>
                            <td class="p-2 ">{{ $produk->tahun_terbit }}</td>
                        </tr>
                        <tr>
                            <td class="bg-gray-100 p-2 font-semibold">Singkatan Jenis</td>
                            <td class="p-2 bg-gray-100">{{ $produk->singkatan_jenis }}</td>
                        </tr>
                        <tr>
                            <td class=" p-2 font-semibold">Tahun Penetapan</td>
                            <td class="p-2">{{ $produk->tahun_penetapan }}</td>
                        </tr>
                        <tr>
                            <td class="bg-gray-100 p-2 font-semibold">Tanggal Pengundangan</td>
                            <td class="p-2 bg-gray-100">{{ $produk->tanggal_pengundangan }}</td>
                        </tr>
                        <tr>
                            <td class=" p-2 font-semibold">T.E.U Badan / Pengarang</td>
                            <td class="p-2 ">{{ $produk->pengarang }}</td>
                        </tr>
                        <tr>
                            <td class="bg-gray-100 p-2 font-semibold">Sumber</td>
                            <td class="p-2 bg-gray-100">{{ $produk->sumber }}</td>
                        </tr>
                        <tr>
                            <td class=" p-2 font-semibold">Tempat Terbit</td>
                            <td class="p-2">{{ $produk->tempat_terbit }}</td>
                        </tr>
                        <tr>
                            <td class="bg-gray-100 p-2 font-semibold">Bidang Hukum</td>
                            <td class="p-2 bg-gray-100">{{ $produk->bidang_hukum }}</td>
                        </tr>
                        <tr>
                            <td class=" p-2 font-semibold">Subjek</td>
                            <td class="p-2">{{ $produk->subjek }}</td>
                        </tr>
                        <tr>
                            <td class="bg-gray-100 p-2 font-semibold">Bahasa</td>
                            <td class="p-2 bg-gray-100">{{ $produk->bahasa }}</td>
                        </tr>
                        <tr>
                            <td class=" p-2 font-semibold">Lokasi</td>
                            <td class="p-2 ">{{ $produk->lokasi }}</td>
                        </tr>
                        <tr>
                            <td class="bg-gray-100 p-2 font-semibold">Status</td>
                            <td class="p-2 bg-gray-100">{{ strtoupper($produk->status) }}</td>
                        </tr>
                        <tr>
                            <td class=" p-2 font-semibold">Naskah Akademik</td>
                            <td class="p-2">
                                @if ($produk->naskah_akademik)
                                    <a href="{{ route('produkhukum.download', $produk->id) }}"
                                        class="text-red-600 hover:underline">Download</a>
                                @else
                                    <p class="text-black text-sm">Tidak tersedia</p>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>

                <!-- Bagian Naskah Akademik -->
                <div class="my-5 ">
                    <h2 class="font-semibold my-5 text-gray-700">Lampiran</h2>
                    <iframe src="{{ asset('/storage/produk/' . $produk->lampiran) }}" width="100%" class="mb-6"
                        height="600px"></iframe>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
