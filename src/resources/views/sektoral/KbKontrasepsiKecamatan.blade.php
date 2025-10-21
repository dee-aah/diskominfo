<x-layouts.sideb>
    <body class="bg-gray-50 font-sans p-6">
        <div class="bg-white   max-w-5xl mx-auto">
            <!-- Judul -->
            <h1 class="text-center text-xl font-bold text-gray-800 mb-5">
                Jumlah Pemakaian Alat Kontrasepsi Berdasarkan Kecamatan
            </h1>
            <!-- Box Deskripsi -->
            <div class=" p-4 ">
                <p class="text-gray-700 text-sm text-justify leading-relaxed ">
                    Dataset ini berisi data jumlah pasangan usia subur berdasarkan kecamatan di Kota Tasikmalaya dari
                    tahun 2019 s.d. 2024.
                    Dataset terkait topik Pengendalian Penduduk ini dihasilkan oleh Dinas Pengendalian Penduduk,
                    Keluarga Berencana,
                    Pemberdayaan Perempuan dan Perlindungan Anak Kota Tasikmalaya yang dikeluarkan dalam periode 1 tahun
                    sekali.
                </p>
            </div>
                <div  class="p-4">
                    <div class="overflow-x-auto">
                        <table class="w-full  text-sm text-gray-700">
                            <thead class="bg-blue-100 text-center font-bold">
                                <tr>
                                    <th class="border-2 border-gray-300 px-3 py-2">No</th>
                                    <th class="border-2 border-gray-300 px-3 py-2">Nama Provinsi</th>
                                    <th class="border-2 border-gray-300 px-3 py-2">Nama Kota</th>
                                    <th class="border-2 border-gray-300 px-3 py-2">Nama Kecamatan</th>
                                    <th class="border-2 border-gray-300 px-3 py-2">Jumlah Alat Kontrasepsi</th>
                                    <th class="border-2 border-gray-300 px-3 py-2">Satuan</th>
                                    <th class="border-2 border-gray-300 px-3 py-2">Tahun</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datakontrasepsi as $row)
                                    <tr class="text-center">
                                        <td class="border-2 border-gray-300 px-2 py-1">{{ $loop->iteration }}</td>
                                        <td class="border-2 border-gray-300 px-2 py-1">{{ $row['nama_provinsi'] ?? '-' }}</td>
                                        <td class="border-2 border-gray-300 px-2 py-1">{{ $row['nama_kabupaten_kota'] ?? '-' }}</td>
                                        <td class="border-2 border-gray-300 px-2 py-1">{{ $row['nama_kecamatan'] ?? '-' }}</td>
                                        <td class="border-2 border-gray-300 px-2 py-1">{{ number_format($row['jumlah_alat_kontrasepsi'] ?? '-', 0, ',', '.') }}</td>
                                        <td class="border-2 border-gray-300 px-2 py-1">{{ $row['satuan'] ?? '-' }}</td>
                                        <td class="border-2 border-gray-300 px-2 py-1">{{ $row['tahun'] ?? '-' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </body>
</x-layouts.app>
