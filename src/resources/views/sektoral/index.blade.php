<x-layouts.app>
    <section class="relative bg-gray-800 text-white rounded-3xl overflow-hidden max-w-6xl mx-auto mt-24">
        <!-- Background Image -->
        <img src="{{ asset('storage/default/sektoral.jpg') }}" alt="Family"
            class="w-full h-full object-cover bg-white rounded-3xl opacity-80">

        <!-- Overlay -->
        <div class="absolute inset-1 bg-gradient-to-r from-gray-900/70 to-transparent flex items-end">
            <div class="px-8 mb-6 py-10 max-w-6xl">
                <h1 class="text-5xl font-bold mb-3">Data Statistik Sektoral</h1>
                <p class="text-[20px] text-justify ">
                    Data Statistik Sektoral DPPKBP3A berisi gambaran angka dan informasi seputar penduduk, keluarga berencana, perlindungan anak, serta pemberdayaan perempuan di Kota Tasikmalaya
                </p>
            </div>
        </div>
    </section>
    <!-- Highlight Section -->
    <section class="max-w-6xl mx-auto  py-10">
        <h2 class="text-xl font-semibold mb-6">Sorotan Data Utama</h2>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-5">
            <!-- Card 1 -->
            <div class="bg-[#2563EB] text-white p-6 rounded-xl shadow-md text-center">
                <h3 class="text-lg font-medium">Index Pemberdayaan Gender</h3>
                <div
                    class="text-3xl font-bold mt-2">{{ number_format($datapemberdayaanterbaru, 2, ',', '.') }}</div>
                <p class="text-sm mt-2"> Poin  se-Kota Tasikmalaya Tahun {{ $tahunpemberdayaanterbaru }}.
                </p>
            </div>

            <!-- Card 2 -->
            <div class="bg-[#43A047] text-white p-6 rounded-xl shadow-md text-center">
                <h3 class="text-lg font-medium">Peserta Keluarga Berencana</h3>
                <div
                    class="text-3xl font-bold mt-2">{{ number_format($datakbterbaru, 0, ',', '.') }}</div>
                <p class="text-sm mt-2">Jumlah Akseptor Keluarga Berencana Aktif Tahun {{ $tahunkbterbaru }}.</p>
            </div>
            <div class="bg-[#8E24AA] text-white p-6 rounded-xl shadow-md text-center">
                <h3 class="text-lg font-medium">Pasangan Usia Subur</h3>
                <div
                    class="text-3xl font-bold mt-2">{{ number_format($datasuburterbaru, 0, ',', '.') }}</div>
                <p class="text-sm mt-2">Total Pasangan Usia Subur se-Kota Tasikmalaya Tahun {{ $tahunsuburterbaru }}.
                </p>
            </div>
            <!-- Card 3 -->
            <div class="bg-[#FB8C00] text-white p-6 rounded-xl shadow-md text-center">
                <h3 class="text-lg font-medium">Kasus Kekerasan</h3>
                <div  class="text-3xl font-bold mt-2">{{ $datakasusterbaru }}
                </d>
                <p class="text-sm font-normal mt-2">Kasus Kekerasan Terhadap Perempuan & Anak Ditangani Tahun
                    {{ $tahunkasusterbaru }}</p>
            </div>
        </div>
    </section>
    <section class="flex max-w-6xl grid grid-cols-12 gap-5 my-5 mx-auto ">
        <aside class="col-span-3 text-center space-y-6">
            <div class="bg-white shadow border border-gray-200 rounded-lg p-4">
                <h2 class="font-semibold text-gray-700 mb-4">Pengendalian Penduduk</h2>
                <ul class="space-y-2 " role="tablist">
                    <li>
                        <a href="#" data-tab-target="subur" role="tab" aria-selected="true" aria-controls="subur"
                            class="block bg-gray-200 px-3 py-2 rounded text-sm text-gray-700" >
                            Jumlah Pasangan Subur
                        </a>
                    </li>
                    <li>
                        <a href="#" data-tab-target="suburkecamatan"role="tab" aria-selected="false" aria-controls="suburkecamatan"
                            class="block bg-gray-200 px-3 py-2 rounded text-sm text-gray-700">
                            Jumlah Pasangan Subur Berdasarkan Kecamatan
                        </a>
                    </li>
                </ul>
            </div>
            <div class="bg-white shadow border border-gray-200 rounded-lg p-4">
                <h2 class="font-semibold text-gray-700 mb-4">Keluarga Berencana</h2>
                <ul class="space-y-2" role="tablist">
                    <li>
                        <a href="#" data-tab-target="keluargaberencana"role="tab" aria-selected="false" aria-controls="keluargaberencana"
                            class="block bg-gray-200 px-3 py-2 rounded text-sm text-gray-700">
                            Jumlah Keluarga Berencana Aktip
                        </a>
                    </li>
                    <li>
                        <a href="#" data-tab-target="keluargaberencanakecamatan"role="tab" aria-selected="false" aria-controls="keluargaberencanakecamatan"
                            class="block bg-gray-200 px-3 py-2 rounded text-sm text-gray-700">
                            Jumlah Keluarga Berencana Aktip Berdasarkan Kecamatan
                        </a>
                    </li>
                    <li>
                        <a href="#" data-tab-target="kbkontrasepsi"role="tab" aria-selected="false" aria-controls="kbkontrasepsi"
                            class="block bg-gray-200 px-3 py-2 rounded text-sm text-gray-700">
                            Jumlah Keluarga Berencana Aktip Berdasarkan Metode Alat Kontrasepsi
                        </a>
                    </li>
                    <li>
                        <a href="#" data-tab-target="kbkontrasepsikecamatan"role="tab" aria-selected="false" aria-controls="kbkontrasepsikecamatan"
                            class="block bg-gray-200 px-3 py-2 rounded text-sm text-gray-700">
                            Jumlah Pengunaan Alat Kontrasepsi Berdasarkan Kecamatan
                        </a>
                    </li>
                </ul>
            </div>
            <div class="bg-white shadow border border-gray-200 rounded-lg p-4">
                <h2 class="font-semibold text-center px-2 text-gray-700 mb-4">Pemberdayaan Perempuan dan Perlindungan
                    Anak
                </h2>
                <ul class="space-y-2 " role="tablist">
                    <li><a href="#" data-tab-target="kekerasan"role="tab" aria-selected="false" aria-controls="kekerasan"
                            class="block bg-gray-200 px-3 py-2 rounded text-sm text-gray-700">Jumlah Kasus Kekerasan
                        </a>
                    </li>
                    <li>
                        <a href="#" data-tab-target="jeniskekerasan"role="tab" aria-selected="false" aria-controls="jeniskekerasan"
                            class="block bg-gray-200 px-3 py-2 rounded text-sm text-gray-700">Jenis Kasus Kekerasan
                        </a>
                    </li>
                </ul
            </div></div>
            <div class="bg-white shadow border border-gray-200 rounded-lg p-4">
                <h2 class="font-semibold text-center px-2 text-gray-700 mb-4">
                    Index Macro
                </h2>
                <ul class="space-y-2" role="tablist">
                    <li><a href="#" data-tab-target="pembangunangender"role="tab" aria-selected="false" aria-controls="pembangunangender"
                            class="block bg-gray-200 px-3 py-2 rounded text-sm text-gray-700">Jumlah Pembangunan Gender
                        </a>
                    </li>
                    <li>
                        <a href="#" data-tab-target="pemberdayaangender"role="tab" aria-selected="false" aria-controls="peberdayaanangender"
                            class="block bg-gray-200 px-3 py-2 rounded text-sm text-gray-700">Jumlah Pemberdayaan Gender
                        </a>
                    </li>
                </ul
            </div>
        </aside>
        <main  class="col-span-9 bg-white rounded-xl border border-gray-200 shadow p-6">
            {{-- Slot konten dari halaman lain --}}
        <div id="subur" data-tab-content role="tabpanel" class="bg-white  max-w-5xl mx-auto">
            <!-- Judul -->
            <h1 class="text-center text-xl font-bold text-gray-800 mb-5">
                Jumlah Pasangan Usia Subur Kota Tasikmalaya
            </h1>
            <!-- Box Deskripsi -->
            <div class=" p-4 ">
                <p class="text-gray-700 text-sm leading-relaxed ">
                    Dataset ini berisi data jumlah pasangan usia subur berdasarkan kecamatan di Kota Tasikmalaya dari
                    tahun 2019 s.d. 2024.
                    Dataset terkait topik Pengendalian Penduduk ini dihasilkan oleh Dinas Pengendalian Penduduk,
                    Keluarga Berencana,
                    Pemberdayaan Perempuan dan Perlindungan Anak Kota Tasikmalaya yang dikeluarkan dalam periode 1 tahun
                    sekali.
                </p>
            </div>
            <!-- Tabs -->
            <div class=" mb-5 ">
                    <div class="overflow-x-auto">
                        <table class="w-full  text-sm  text-gray-700">
                            <thead class="bg-blue-100 text-center font-bold">
                                <tr>
                                    <th class="border-2 border-gray-300 px-3 py-2">No</th>
                                    <th class="border-2 border-gray-300 px-3 py-2">Nama Provinsi</th>
                                    <th class="border-2 border-gray-300 px-3 py-2">Nama Kota</th>
                                    <th class="border-2 border-gray-300 px-3 py-2">Jumlah Pasangan</th>
                                    <th class="border-2 border-gray-300 px-3 py-2">Satuan</th>
                                    <th class="border-2 border-gray-300 px-3 py-2">Tahun</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datasubur as $row)
                                    <tr class="text-center">
                                        <td class="border-2 border-gray-300  px-2 py-1">{{ $loop->iteration }}</td>
                                        <td class="border-2 border-gray-300  px-2 py-1">{{ $row['nama_provinsi'] ?? '-' }} </td>
                                        <td class="border-2 border-gray-300  px-2 py-1">{{ $row['nama_kabupaten_kota'] ?? '-' }}</td>
                                        <td class="border-2 border-gray-300  px-2 py-1">{{number_format( $row['jumlah_pasangan_usia_subur'] ?? '-' , 0, ',', '.')}}</td>
                                        <td class="border-2 border-gray-300  px-2 py-1">{{ $row['satuan'] ?? '-' }}</td>
                                        <td class="border-2 border-gray-300  px-2 py-1">{{ $row['tahun'] ?? '-' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div  id="suburkecamatan" data-tab-content role="tabpanel" class="hidden bg-white max-w-5xl mx-auto">
            <!-- Judul -->
            <h1 class="text-center text-xl font-bold text-gray-800 mb-5">
                Jumlah Pasangan Usia Subur Berdasarkan Kecamatan di Kota Tasikmalaya
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
            <!-- Tabs -->
            <div class="mb-5">
                <div class="p-4">
                    <div class="overflow-x-auto">
                        <table class="w-full border text-sm text-gray-700">
                            <thead class="bg-blue-100 text-center font-bold">
                                <tr>
                                    <th class="border-2 border-gray-300 px-3 py-2">No</th>
                                    <th class="border-2 border-gray-300 px-3 py-2">Nama Provinsi</th>
                                    <th class="border-2 border-gray-300 px-3 py-2">Nama Kota</th>
                                    <th class="border-2 border-gray-300 px-3 py-2">Nama Kecamatan</th>
                                    <th class="border-2 border-gray-300 px-3 py-2">Jumlah Peserta Kb Aktip</th>
                                    <th class="border-2 border-gray-300 px-3 py-2">Satuan</th>
                                    <th class="border-2 border-gray-300 px-3 py-2">Tahun</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datasuburkec as $row)
                                    <tr class="text-center">
                                        <td class="border-2 border-gray-300  px-2 py-1">{{ $loop->iteration }}</td>
                                        <td class="border-2 border-gray-300  px-2 py-1">{{ $row['nama_provinsi'] ?? '-' }}</td>
                                        <td class="border-2 border-gray-300  px-2 py-1">{{ $row['nama_kabupaten_kota'] ?? '-' }}</td>
                                        <td class="border-2 border-gray-300  px-2 py-1">{{ $row['nama_kecamatan'] ?? '-' }}</td>
                                        <td class="border-2 border-gray-300  px-2 py-1">{{ number_format($row['jumlah_pasangan_usia_subur'] ?? '-', 0, ',', '.') }}</td>
                                        <td class="border-2 border-gray-300  px-2 py-1">{{ $row['satuan'] ?? '-' }}</td>
                                        <td class="border-2 border-gray-300  px-2 py-1">{{ $row['tahun'] ?? '-' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div id="keluargaberencana" data-tab-content role="tabpanel" class="bg-white hidden max-w-5xl mx-auto">
            <!-- Judul -->
            <h1 class="text-center text-xl font-bold text-gray-800 mb-5">
                Jumlah Peserta Keluarga Berencana Aktip Kota Tasikmalaya
            </h1>
            <!-- Box Deskripsi -->
            <div class=" p-4">
                <p class="text-gray-700 text-sm text-justify leading-relaxed ">
                    Dataset ini berisi data jumlah pasangan usia subur berdasarkan kecamatan di Kota Tasikmalaya dari
                    tahun 2019 s.d. 2024.
                    Dataset terkait topik Pengendalian Penduduk ini dihasilkan oleh Dinas Pengendalian Penduduk,
                    Keluarga Berencana,
                    Pemberdayaan Perempuan dan Perlindungan Anak Kota Tasikmalaya yang dikeluarkan dalam periode 1 tahun
                    sekali.
                </p>
            </div>
                <div class="p-4">
                    <div class="overflow-x-auto">
                        <table class="w-full border text-sm text-gray-700">
                            <thead class="bg-blue-100 text-center font-bold">
                                <tr>
                                    <th class="border-2 border-gray-300 px-3 py-2">No</th>
                                    <th class="border-2 border-gray-300 px-3 py-2">Nama Provinsi</th>
                                    <th class="border-2 border-gray-300 px-3 py-2">Nama Kota</th>
                                    <th class="border-2 border-gray-300 px-3 py-2">Jumlah Peserta KB</th>
                                    <th class="border-2 border-gray-300 px-3 py-2">Satuan</th>
                                    <th class="border-2 border-gray-300 px-3 py-2">Tahun</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datakb as $row)
                                    <tr class="text-center">
                                        <td class="border-2 border-gray-300 px-2 py-1">{{ $loop->iteration }}</td>
                                        <td class="border-2 border-gray-300 px-2 py-1">{{ $row['nama_provinsi'] ?? '-' }}</td>
                                        <td class="border-2 border-gray-300 px-2 py-1">{{ $row['nama_kabupaten_kota'] ?? '-' }}</td>
                                        <td class="border-2 border-gray-300 px-2 py-1">{{ number_format($row['jumlah_peserta_keluarga_berencana_aktif'] ?? '-', 0, ',', '.') }}</td>
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
        <div id="keluargaberencanakecamatan" data-tab-content role="tabpanel" class="bg-white hidden max-w-5xl mx-auto">
            <!-- Judul -->
            <h1 class="text-center text-xl font-bold text-gray-800 mb-5">
                Jumlah Peserta Keluarga Berencana Aktip Berdasarkan Kecamatan di Kota Tasikmalaya
            </h1>
            <!-- Box Deskripsi -->
            <div class=" p-4 ">
                <p class="text-gray-700 text-sm  text-justify leading-relaxed ">
                    Dataset ini berisi data jumlah pasangan usia subur berdasarkan kecamatan di Kota Tasikmalaya dari
                    tahun 2019 s.d. 2024.
                    Dataset terkait topik Pengendalian Penduduk ini dihasilkan oleh Dinas Pengendalian Penduduk,
                    Keluarga Berencana,
                    Pemberdayaan Perempuan dan Perlindungan Anak Kota Tasikmalaya yang dikeluarkan dalam periode 1 tahun
                    sekali.
                </p>
                </div>
                <!-- Konten Tabel -->
                <div  class="p-4">
                    <div class="overflow-x-auto">
                        <table class="w-full  text-sm text-gray-700">
                            <thead class="bg-blue-100 text-center font-bold">
                                <tr>
                                    <th class="border-2 border-gray-300 px-3 py-2">No</th>
                                    <th class="border-2 border-gray-300 px-3 py-2">Nama Provinsi</th>
                                    <th class="border-2 border-gray-300 px-3 py-2">Nama Kota</th>
                                    <th class="border-2 border-gray-300 px-3 py-2">Nama Kecamatan</th>
                                    <th class="border-2 border-gray-300 px-3 py-2">Jumlah Peserta Kb Aktip</th>
                                    <th class="border-2 border-gray-300 px-3 py-2">Satuan</th>
                                    <th class="border-2 border-gray-300 px-3 py-2">Tahun</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datakbKec as $row)
                                    <tr class="text-center">
                                        <td class="border-2 border-gray-300 px-2 py-1">{{ $loop->iteration }}</td>
                                        <td class="border-2 border-gray-300 px-2 py-1">{{ $row['nama_provinsi'] ?? '-' }}</td>
                                        <td class="border-2 border-gray-300 px-2 py-1">{{ $row['nama_kabupaten_kota'] ?? '-' }}</td>
                                        <td class="border-2 border-gray-300 px-2 py-1">{{ $row['nama_kecamatan'] ?? '-' }}</td>
                                        <td class="border-2 border-gray-300 px-2 py-1">{{ number_format($row['jumlah_peserta_keluarga_berencana_aktif'] ?? '-', 0, ',', '.') }}</td>
                                        <td class="border-2 border-gray-300 px-2 py-1">{{ $row['satuan'] ?? '-' }}</td>
                                        <td class="border-2 border-gray-300 px-2 py-1">{{ $row['tahun'] ?? '-' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div id="kbkontrasepsi" data-tab-content role="tabpanel" class="bg-white hidden  max-w-5xl mx-auto">
            <!-- Judul -->
            <h1 class="text-center text-xl font-bold text-gray-800 mb-6">
                Jumlah Peserta Keluarga Berencana Berdasarkan Metode Alat Kontrasepsi
            </h1>
            <!-- Box Deskripsi -->
            <div class=" p-4 mb-6">
                <p class="text-gray-700 text-sm leading-relaxed ">
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
                        <table class="w-full text-center text-sm text-gray-700">
                            <thead class="bg-blue-100 text-center font-bold">
                                <tr>
                                    <th class="border-2 border-gray-300 px-3 py-2">No</th>
                                    <th class="border-2 border-gray-300 px-3 py-2">Nama Provinsi</th>
                                    <th class="border-2 border-gray-300 px-3 py-2">Nama Kota</th>
                                    <th class="border-2 border-gray-300 px-3 py-2">Metode Kontrasepsi</th>
                                    <th class="border-2 border-gray-300 px-3 py-2">Jumlah Peserta Kb Aktip</th>
                                    <th class="border-2 border-gray-300 px-3 py-2">Satuan</th>
                                    <th class="border-2 border-gray-300 px-3 py-2">Tahun</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datakbKec as $row)
                                    <tr class="text-center">
                                        <td class="border-2 border-gray-300 px-2 py-1">{{ $loop->iteration }}</td>
                                        <td class="border-2 border-gray-300 px-2 py-1">{{ $row['nama_provinsi'] ?? '-' }}</td>
                                        <td class="border-2 border-gray-300 px-2 py-1">{{ $row['nama_kabupaten_kota'] ?? '-' }}</td>
                                        <td class="border-2 border-gray-300 px-2 py-1">{{ $row['nama_kecamatan'] ?? '-' }}</td>
                                        <td class="border-2 border-gray-300 px-2 py-1">{{ number_format($row['jumlah_peserta_keluarga_berencana_aktif'] ?? '-', 0, ',', '.') }}</td>
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
        <div id="kbkontrasepsikecamatan" data-tab-content role="tabpanel" class="bg-white  hidden max-w-5xl mx-auto">
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
        <div id="kekerasan" data-tab-content role="tabpanel" class="bg-white hidden max-w-5xl mx-auto">
            <!-- Judul -->
            <h1 class="text-center text-xl font-bold text-gray-800 my-5">
                Jumlah Kasus Kekerasan Pada Perempuan dan Anak Di Kota Tasikmalaya
            </h1>
            <!-- Box Deskripsi -->
            <div class=" p-4 ">
                <p class="text-gray-700 text-sm text-justify leading-relaxed">
                    Dataset ini berisi data jumlah pasangan usia subur berdasarkan kecamatan di Kota Tasikmalaya dari
                    tahun 2019 s.d. 2024.
                    Dataset terkait topik Pengendalian Penduduk ini dihasilkan oleh Dinas Pengendalian Penduduk,
                    Keluarga Berencana, Pemberdayaan Perempuan dan Perlindungan Anak Kota Tasikmalaya yang dikeluarkan dalam periode 1 tahun
                    sekali.
                </p>
            </div>
                <div class="p-4">
                    <div class="overflow-x-auto">
                        <table class="w-full  text-sm text-gray-700">
                            <thead class="bg-blue-100 text-center font-bold">
                                <tr>
                                    <th class="border-2 border-gray-300 px-3 py-2">No</th>
                                    <th class="border-2 border-gray-300 px-3 py-2">Nama Provinsi</th>
                                    <th class="border-2 border-gray-300 px-3 py-2">Nama Kota</th>
                                    <th class="border-2 border-gray-300 px-3 py-2">Jumlah Kasus</th>
                                    <th class="border-2 border-gray-300 px-3 py-2">Satuan</th>
                                    <th class="border-2 border-gray-300 px-3 py-2">Tahun</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datakasus as $row)
                                    <tr>
                                        <td class="border-2 border-gray-300 text-center px-2 py-1">{{ $loop->iteration }}</td>
                                        <td class="border-2 border-gray-300 text-center px-2 py-1">{{ $row['nama_provinsi'] ?? '-' }}</td>
                                        <td class="border-2 border-gray-300 text-center px-2 py-1">{{ $row['nama_kabupaten_kota'] ?? '-' }}</td>
                                        <td class="border-2 border-gray-300 text-center px-2 py-1">{{ number_format($row['jumlah_kasus'] ?? '-', 0, ',', '.') }}</td>
                                        <td class="border-2 border-gray-300 text-center px-2 py-1">{{ $row['satuan'] ?? '-' }}</td>
                                        <td class="border-2 border-gray-300 text-center px-2 py-1">{{ $row['tahun'] ?? '-' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

        </div>
</div>
        <div id="jeniskekerasan" data-tab-content role="tabpanel" class="bg-white hidden max-w-5xl mx-auto">
        <!-- Judul -->
        <h1 class="text-center max-w-4xl mx-auto text-xl font-bold text-gray-800 my-5">
            Jumlah Kasus Kekerasan Pada Perempuan dan Anak Berdasarkan Kecamatan di Kota Tasikmalaya
        </h1>
        <!-- Box Deskripsi -->
        <div class="p-4 ">
            <p class="text-gray-700  text-sm text-justify text-sm">
                Dataset ini berisi data jumlah pasangan usia subur berdasarkan kecamatan di Kota Tasikmalaya dari
                tahun 2019 s.d. 2024.
                Dataset terkait topik Pengendalian Penduduk ini dihasilkan oleh Dinas Pengendalian Penduduk,
                Keluarga Berencana,
                Pemberdayaan Perempuan dan Perlindungan Anak Kota Tasikmalaya yang dikeluarkan dalam periode 1 tahun sekali.
            </p>
        </div>
        <div class="p-4">
            <div  class="overflow-x-auto">
                <table class="w-full border text-sm text-gray-700">
                    <thead class="bg-blue-100 text-center font-bold">
                        <tr>
                            <th class="border-2 border-gray-300 px-3 py-2">No</th>
                            <th class="border-2 border-gray-300 px-3 py-2">Nama Provinsi</th>
                            <th class="border-2 border-gray-300 px-3 py-2">Nama Kota</th>
                            <th class="border-2 border-gray-300 px-3 py-2">Jenis Kekerasan</th>
                            <th class="border-2 border-gray-300 px-3 py-2">Jumlah Kasus</th>
                            <th class="border-2 border-gray-300 px-3 py-2">Satuan</th>
                            <th class="border-2 border-gray-300 px-3 py-2">Tahun</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datakasusJenis as $row)
                            <tr>
                                <td class="border-2 border-gray-300 text-center px-2 py-1">{{ $loop->iteration }}</td>
                                <td class="border-2 border-gray-300 text-center px-2 py-1">{{ $row['nama_provinsi'] ?? '-' }}</td>
                                <td class="border-2 border-gray-300 text-center px-2 py-1">{{ $row['nama_kabupaten_kota'] ?? '-' }}</td>
                                <td class="border-2 border-gray-300 text-center px-2 py-1">{{ $row['jenis_kekerasan'] ?? '-' }}</td>
                                <td class="border-2 border-gray-300 text-center px-2 py-1">{{ number_format($row['jumlah_kasus'] ?? 0, 0, ',', '.') }}</td>
                                <td class="border-2 border-gray-300 text-center px-2 py-1">{{ $row['satuan'] ?? '-' }}</td>
                                <td class="border-2 border-gray-300 text-center px-2 py-1">{{ $row['tahun'] ?? '-' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div id="pembangunangender" data-tab-content role="tabpanel" class="bg-white hidden max-w-5xl mx-auto">
            <!-- Judul -->
            <h1 class="text-center text-xl font-bold text-gray-800 mb-5">
                Index Pembangunan Gender Kota Tasikmalaya
            </h1>
            <!-- Box Deskripsi -->
            <div class="p-4 ">
                <p class="text-gray-700 text-sm text-center leading-relaxed ">
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
                                    <th class="border-2 border-gray-300 px-3 py-2">Index</th>
                                    <th class="border-2 border-gray-300 px-3 py-2">Satuan</th>
                                    <th class="border-2 border-gray-300 px-3 py-2">Tahun</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datapembangunan as $row)
                                    <tr class="text-center">
                                        <td class="border-2 border-gray-300 px-2 py-1">{{ $loop->iteration }}</td>
                                        <td class="border-2 border-gray-300 px-2 py-1">{{ $row['nama_provinsi'] ?? '-' }}</td>
                                        <td class="border-2 border-gray-300 px-2 py-1">{{ $row['nama_kabupaten_kota'] ?? '-' }}</td>
                                        <td class="border-2 border-gray-300 px-2 py-1">{{ $row['indeks_pembangunan_gender'] ?? '-'}}</td>
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
        <div id="pemberdayaangender" data-tab-content role="tabpanel" class="bg-white hidden max-w-5xl mx-auto">
            <!-- Judul -->
            <h1 class="text-center text-xl font-bold text-gray-800 mb-5">
                Index Pemberdayaan Gender Kota Tasikmalaya
            </h1>
            <!-- Box Deskripsi -->
            <div class=" p-4 ">

                <p class="text-gray-700 text-sm leading-relaxed mb-3">
                    Dataset ini berisi data jumlah pasangan usia subur berdasarkan kecamatan di Kota Tasikmalaya dari
                    tahun 2019 s.d. 2024.
                    Dataset terkait topik Pengendalian Penduduk ini dihasilkan oleh Dinas Pengendalian Penduduk,
                    Keluarga Berencana,
                    Pemberdayaan Perempuan dan Perlindungan Anak Kota Tasikmalaya yang dikeluarkan dalam periode 1 tahun
                    sekali.
                </p>
                <div  class="p-4">
                    <div class="overflow-x-auto">
                        <table class="w-full border text-sm text-gray-700">
                            <thead class="bg-blue-100 text-center font-bold">
                                <tr>
                                    <th class="border-2 border-gray-300 px-3 py-2">No</th>
                                    <th class="border-2 border-gray-300 px-3 py-2">Nama Provinsi</th>
                                    <th class="border-2 border-gray-300 px-3 py-2">Nama Kota</th>
                                    <th class="border-2 border-gray-300 px-3 py-2">Index</th>
                                    <th class="border-2 border-gray-300 px-3 py-2">Satuan</th>
                                    <th class="border-2 border-gray-300 px-3 py-2">Tahun</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datapemberdayaan as $row)
                                    <tr class="text-center">
                                        <td class="border-2 border-gray-300 px-2 py-1">{{ $loop->iteration }}</td>
                                        <td class="border-2 border-gray-300 px-2 py-1">{{ $row['nama_provinsi'] ?? '-' }}</td>
                                        <td class="border-2 border-gray-300 px-2 py-1">{{ $row['nama_kabupaten_kota'] ?? '-' }}</td>
                                        <td class="border-2 border-gray-300 px-2 py-1">{{ $row['indeks_pemberdayaan_gender'] ?? '-'}}</td>
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
        </main>
    </section>


<script>
  document.addEventListener("DOMContentLoaded", () => {
    const tabs = document.querySelectorAll("[data-tab-target]");
    const contents = document.querySelectorAll("[data-tab-content]");

    tabs.forEach(tab => {
      tab.addEventListener("click", e => {
        e.preventDefault();

        // reset semua tab & konten
        tabs.forEach(t => t.setAttribute("aria-selected", "false"));
        contents.forEach(c => c.classList.add("hidden"));

        // aktifkan tab yang diklik
        tab.setAttribute("aria-selected", "true");
        const targetId = tab.getAttribute("data-tab-target");
        document.getElementById(targetId).classList.remove("hidden");
      });
    });
  });
        function loadContent(url) {
        const scrollY = window.scrollY; // simpan posisi scroll sebelum konten diganti

        fetch(url)
            .then(res => res.text())
            .then(html => {
                document.getElementById("content-area").innerHTML = html;
                window.scrollTo(0, scrollY); // balikin ke posisi scroll semula
            })
            .catch(err => console.error(err));
    }
    document.addEventListener("DOMContentLoaded", function () {
        loadContent('/sektoral/kasus'); });

    </script>
    <script src="node_modules/@material-tailwind/html/scripts/tabs.js"></script>

<!-- from cdn -->
<script src="https://unpkg.com/@material-tailwind/html@latest/scripts/tabs.js"></script>
</x-layouts.app>
