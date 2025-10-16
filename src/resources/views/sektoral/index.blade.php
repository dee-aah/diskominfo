<x-layouts.app>
    <section class="relative text-white bg-white overflow-hidden max-w-6xl p-4 md:p-0 mx-auto mt-24">
        <!-- Background Image -->
        <img src="{{ asset('storage/default/sektoral.jpg') }}" alt="Family"
            class="w-full h-full object-cover bg-white rounded-3xl opacity-80">

        <!-- Overlay -->
        <div class="absolute inset-1 bg-gradient-to-r from-gray-900/70 rounded-3xl to-transparent  p-4 md:p-0 flex items-end">
            <div class="px-8 mb-6 pt-25 max-w-6xl">
                <h1 class="text-lg  md:text-5xl font-bold mb-2">Data Statistik Sektoral</h1>
                <p class="text-xs md:text-lg text-justify ">
                    Data Statistik Sektoral DPPKBP3A berisi gambaran angka dan informasi seputar penduduk, keluarga
                    berencana, perlindungan anak, serta pemberdayaan perempuan di Kota Tasikmalaya
                </p>
            </div>
        </div>
    </section>
    <!-- Highlight Section -->
    <section class="max-w-6xl mx-auto  p-4 md:p-0 py-10">
        <h2 class="text-xl  font-semibold mb-6">Sorotan Data Utama</h2>
        <div class="grid grid-cols-2 md:grid-cols-1 gap-5">
            <!-- Card 1 -->
            <div class="bg-[#2563EB] text-white p-6 rounded-xl shadow-md text-center">
                <h3 class="text-sm md:text-lg font-medium">Index Pemberdayaan Gender</h3>
                <div class=" text-xl md:text-3xl font-bold mt-2">{{ number_format($datapemberdayaanterbaru, 2, ',', '.') }}</div>
                <p class="text-xs md:text-sm mt-2"> Poin se-Kota Tasikmalaya Tahun {{ $tahunpemberdayaanterbaru }}.
                </p>
            </div>

            <!-- Card 2 -->
            <div class="bg-[#43A047] text-white p-6 rounded-xl shadow-md text-center">
                <h3 class="text-sm md:text-lg font-medium">Peserta Keluarga Berencana</h3>
                <div class="text-xl md:text-3xl font-bold mt-2">{{ number_format($datakbterbaru, 0, ',', '.') }}</div>
                <p class="text-xs md:text-sm mt-2">Jumlah Akseptor Keluarga Berencana Aktif Tahun {{ $tahunkbterbaru }}.</p>
            </div>
            <div class="bg-[#8E24AA] text-white p-6 rounded-xl shadow-md text-center">
                <h3 class="text-sm md:text-lg font-medium">Pasangan Usia Subur</h3>
                <div class="text-xl md:text-3xl font-bold mt-2">{{ number_format($datasuburterbaru, 0, ',', '.') }}</div>
                <p class="text-xs md:text-sm mt-2">Total Pasangan Usia Subur se-Kota Tasikmalaya Tahun {{ $tahunsuburterbaru }}.
                </p>
            </div>
            <!-- Card 3 -->
            <div class="bg-[#FB8C00] text-white p-6 rounded-xl shadow-md text-center">
                <h3 class="text-sm md:text-lg font-medium">Kasus Kekerasan</h3>
                <div class="text-xl md:text-3xl font-bold mt-2">{{ $datakasusterbaru }}
                    </d>
                    <p class="text-xs md:text-sm font-normal mt-2">Kasus Kekerasan Terhadap Perempuan & Anak Ditangani Tahun
                        {{ $tahunkasusterbaru }}</p>
                </div>
            </div>
    </section>
    <section class="grid grid-cols-1 md:grid-cols-12 gap-5 my-5 mx-auto max-w-6xl px-4 ">
        <aside class="md:col-span-3 order-2 md:order-1 space-y-6">
            <div class="bg-white shadow border border-gray-200 rounded-lg p-4">
                <h2 class="font-semibold text-gray-700 mb-4 text-center md:text-left">Pengendalian Penduduk</h2>
                <ul class="space-y-2 " role="tablist">
                    <li>
                        <a href="#" data-tab-target="subur" role="tab" aria-selected="true"
                            aria-controls="subur" class="block bg-gray-200 px-3 py-2 rounded text-sm text-gray-700 text-center md:text-left">
                            Jumlah Pasangan Subur
                        </a>
                    </li>
                    <li>
                        <a href="#" data-tab-target="suburkecamatan"role="tab" aria-selected="false"
                            aria-controls="suburkecamatan"
                            class="block bg-gray-200 px-3 py-2 rounded text-sm text-gray-700 text-center md:text-left">
                            Jumlah Pasangan Subur Berdasarkan Kecamatan
                        </a>
                    </li>
                </ul>
            </div>
            <div class="bg-white shadow border border-gray-200 rounded-lg p-4">
                <h2 class="font-semibold text-gray-700 mb-4 text-center md:text-left">Keluarga Berencana</h2>
                <ul class="space-y-2" role="tablist">
                    <li>
                        <a href="#" data-tab-target="keluargaberencana"role="tab" aria-selected="false"
                            aria-controls="keluargaberencana"
                            class="block bg-gray-200 px-3 py-2 rounded text-sm text-gray-700 text-center md:text-left">
                            Jumlah Keluarga Berencana Aktip
                        </a>
                    </li>
                    <li>
                        <a href="#" data-tab-target="keluargaberencanakecamatan"role="tab" aria-selected="false"
                            aria-controls="keluargaberencanakecamatan"
                            class="block bg-gray-200 px-3 py-2 rounded text-sm text-gray-700 text-center md:text-left">
                            Jumlah Keluarga Berencana Aktip Berdasarkan Kecamatan
                        </a>
                    </li>
                    <li>
                        <a href="#" data-tab-target="kbkontrasepsi"role="tab" aria-selected="false"
                            aria-controls="kbkontrasepsi"
                            class="block bg-gray-200 px-3 py-2 rounded text-sm text-gray-700 text-center md:text-left">
                            Jumlah Keluarga Berencana Aktip Berdasarkan Metode Kontrasepsi
                        </a>
                    </li>                  
                    <li>
                        <a href="#" data-tab-target="pemakaialatkontrasepsi"role="tab" aria-selected="false"
                            aria-controls="pemakaialatkontrasepsi"
                            class="block bg-gray-200 px-3 py-2 rounded text-sm text-gray-700 text-center md:text-left">
                            Jumlah Pengunaan Alat Kontrasepsi Berdasarkan Kecamatan
                        </a>
                    </li>
                </ul>
            </div>
            <div class="bg-white shadow border border-gray-200 rounded-lg p-4">
                <h2 class="font-semibold text-gray-700 mb-4 text-center md:text-left">Pemberdayaan Perempuan dan Perlindungan
                    Anak
                </h2>
                <ul class="space-y-2 " role="tablist">
                    <li><a href="#" data-tab-target="kekerasan"role="tab" aria-selected="false"
                            aria-controls="kekerasan"
                            class="block bg-gray-200 px-3 py-2 rounded text-sm text-gray-700 text-center md:text-left">Jumlah Kasus Kekerasan
                        </a>
                    </li>
                    <li>
                        <a href="#" data-tab-target="jeniskekerasan"role="tab" aria-selected="false"
                            aria-controls="jeniskekerasan"
                            class="block bg-gray-200 px-3 py-2 rounded text-sm text-gray-700 text-center md:text-left">Jenis Kasus Kekerasan
                        </a>
                    </li>
                </ul </div>
            </div>
            <div class="bg-white shadow border border-gray-200 rounded-lg p-4">
                <h2 class="font-semibold text-gray-700 mb-4 text-center md:text-left">
                    Index Macro
                </h2>
                <ul class="space-y-2" role="tablist">
                    <li><a href="#" data-tab-target="pembangunangender"role="tab" aria-selected="false"
                            aria-controls="pembangunangender"
                            class="block bg-gray-200 px-3 py-2 rounded text-sm text-gray-700 text-center md:text-left">Jumlah Pembangunan Gender
                        </a>
                    </li>
                    <li>
                        <a href="#" data-tab-target="pemberdayaangender"role="tab" aria-selected="false"
                            aria-controls="peberdayaanangender"
                            class="block bg-gray-200 px-3 py-2 rounded text-sm text-gray-700 text-center md:text-left">Jumlah Pemberdayaan Gender
                        </a>
                    </li>
                </ul </div>
        </aside>
        <main  class="md:col-span-9 order-1 md:order-2 bg-white rounded-xl border border-gray-200 shadow p-6">
            {{-- Slot konten dari halaman lain --}}
            {{-- pasangan subur --}}
            <div id="subur" data-tab-content role="tabpanel" class="bg-white  max-w-5xl mx-auto">
                <!-- Judul -->
                <h1 class="text-center text-lg md:text-xl font-bold text-gray-800 mb-5">
                    Jumlah Pasangan Usia Subur Kota Tasikmalaya
                </h1>
                <!-- Box Deskripsi -->
                <div class=" p-4 ">
                    <p class="text-gray-700 text-sm leading-relaxed ">
                        Dataset ini berisi data jumlah pasangan usia subur berdasarkan kecamatan di Kota Tasikmalaya
                        dari
                        tahun 2019 s.d. 2024.
                        Dataset terkait topik Pengendalian Penduduk ini dihasilkan oleh Dinas Pengendalian Penduduk,
                        Keluarga Berencana,
                        Pemberdayaan Perempuan dan Perlindungan Anak Kota Tasikmalaya yang dikeluarkan dalam periode 1
                        tahun
                        sekali.
                    </p>
                </div>
                <!-- Tabs -->
                <div id="main-content" class=" mb-5 ">
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
                                        <td class="border-2 border-gray-300  px-2 py-1">
                                            {{ $row['nama_provinsi'] ?? '-' }} </td>
                                        <td class="border-2 border-gray-300  px-2 py-1">
                                            {{ $row['nama_kabupaten_kota'] ?? '-' }}</td>
                                        <td class="border-2 border-gray-300  px-2 py-1">
                                            {{ number_format($row['jumlah_pasangan_usia_subur'] ?? '-', 0, ',', '.') }}
                                        </td>
                                        <td class="border-2 border-gray-300  px-2 py-1">{{ $row['satuan'] ?? '-' }}
                                        </td>
                                        <td class="border-2 border-gray-300  px-2 py-1">{{ $row['tahun'] ?? '-' }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{-- pasangan subur perkecamatan --}}
            <div id="suburkecamatan" data-tab-content role="tabpanel" class="hidden bg-white max-w-5xl mx-auto">
                <!-- Judul -->
                <h1 class="text-center text-xl font-bold text-gray-800 mb-5">
                    Jumlah Pasangan Usia Subur Berdasarkan Kecamatan di Kota Tasikmalaya
                </h1>
                <!-- Box Deskripsi -->
                <div class=" p-4 ">
                    <p class="text-gray-700 text-sm text-justify leading-relaxed ">
                        Dataset ini berisi data jumlah pasangan usia subur berdasarkan kecamatan di Kota Tasikmalaya
                        dari
                        tahun 2019 s.d. 2024.
                        Dataset terkait topik Pengendalian Penduduk ini dihasilkan oleh Dinas Pengendalian Penduduk,
                        Keluarga Berencana,
                        Pemberdayaan Perempuan dan Perlindungan Anak Kota Tasikmalaya yang dikeluarkan dalam periode 1
                        tahun
                        sekali.
                    </p>
                </div>
                <!-- Tabs -->
                <div id="main-content"  class="mb-5">
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
                                            <td class="border-2 border-gray-300  px-2 py-1">{{ $loop->iteration }}
                                            </td>
                                            <td class="border-2 border-gray-300  px-2 py-1">
                                                {{ $row['nama_provinsi'] ?? '-' }}</td>
                                            <td class="border-2 border-gray-300  px-2 py-1">
                                                {{ $row['nama_kabupaten_kota'] ?? '-' }}</td>
                                            <td class="border-2 border-gray-300  px-2 py-1">
                                                {{ $row['nama_kecamatan'] ?? '-' }}</td>
                                            <td class="border-2 border-gray-300  px-2 py-1">
                                                {{ number_format($row['jumlah_pasangan_usia_subur'] ?? '-', 0, ',', '.') }}
                                            </td>
                                            <td class="border-2 border-gray-300  px-2 py-1">
                                                {{ $row['satuan'] ?? '-' }}</td>
                                            <td class="border-2 border-gray-300  px-2 py-1">{{ $row['tahun'] ?? '-' }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            {{-- keluarga berencana --}}
            <div id="keluargaberencana" data-tab-content role="tabpanel" class="bg-white hidden max-w-5xl mx-auto">
                <!-- Judul -->
                <h1 class="text-center text-lg md:text-xl font-bold text-gray-800 mb-5">
                    Jumlah Peserta Keluarga Berencana Aktip Kota Tasikmalaya
                </h1>
                <!-- Box Deskripsi -->
                <div class=" p-4">
                    <p class="text-gray-700 text-sm text-justify leading-relaxed ">
                        Dataset ini berisi data jumlah pasangan usia subur berdasarkan kecamatan di Kota Tasikmalaya
                        dari
                        tahun 2019 s.d. 2024.
                        Dataset terkait topik Pengendalian Penduduk ini dihasilkan oleh Dinas Pengendalian Penduduk,
                        Keluarga Berencana,
                        Pemberdayaan Perempuan dan Perlindungan Anak Kota Tasikmalaya yang dikeluarkan dalam periode 1
                        tahun
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
                                        <td class="border-2 border-gray-300 px-2 py-1">
                                            {{ $row['nama_provinsi'] ?? '-' }}</td>
                                        <td class="border-2 border-gray-300 px-2 py-1">
                                            {{ $row['nama_kabupaten_kota'] ?? '-' }}</td>
                                        <td class="border-2 border-gray-300 px-2 py-1">
                                            {{ number_format($row['jumlah_peserta_keluarga_berencana_aktif'] ?? '-', 0, ',', '.') }}
                                        </td>
                                        <td class="border-2 border-gray-300 px-2 py-1">{{ $row['satuan'] ?? '-' }}
                                        </td>
                                        <td class="border-2 border-gray-300 px-2 py-1">{{ $row['tahun'] ?? '-' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{-- keluarga berencana berdasarkan kecamatan --}}
            <div id="keluargaberencanakecamatan" data-tab-content role="tabpanel" class="bg-white hidden max-w-5xl mx-auto">
                <!-- Judul -->
                <h1 class="text-center text-lg md:text-xl font-bold text-gray-800 mb-5">
                    Jumlah Peserta Keluarga Berencana Aktip Berdasarkan Kecamatan di Kota Tasikmalaya
                </h1>
                <!-- Box Deskripsi -->
                <div class=" p-4 ">
                    <p class="text-gray-700 text-sm  text-justify leading-relaxed ">
                        Dataset ini berisi data jumlah pasangan usia subur berdasarkan kecamatan di Kota Tasikmalaya
                        dari
                        tahun 2019 s.d. 2024.
                        Dataset terkait topik Pengendalian Penduduk ini dihasilkan oleh Dinas Pengendalian Penduduk,
                        Keluarga Berencana,
                        Pemberdayaan Perempuan dan Perlindungan Anak Kota Tasikmalaya yang dikeluarkan dalam periode 1
                        tahun
                        sekali.
                    </p>
                </div>
                <!-- Konten Tabel -->
                <div class="p-4">
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
                                        <td class="border-2 border-gray-300 px-2 py-1">
                                            {{ $row['nama_provinsi'] ?? '-' }}</td>
                                        <td class="border-2 border-gray-300 px-2 py-1">
                                            {{ $row['nama_kabupaten_kota'] ?? '-' }}</td>
                                        <td class="border-2 border-gray-300 px-2 py-1">
                                            {{ $row['nama_kecamatan'] ?? '-' }}</td>
                                        <td class="border-2 border-gray-300 px-2 py-1">
                                            {{ number_format($row['jumlah_peserta_keluarga_berencana_aktif'] ?? '-', 0, ',', '.') }}
                                        </td>
                                        <td class="border-2 border-gray-300 px-2 py-1">{{ $row['satuan'] ?? '-' }}
                                        </td>
                                        <td class="border-2 border-gray-300 px-2 py-1">{{ $row['tahun'] ?? '-' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

                {{-- keluarga berencana berdasarkan alat Kontrasepsi --}}
            <div id="kbkontrasepsi" data-tab-content role="tabpanel"class="bg-white hidden max-w-5xl mx-auto">
                <!-- Judul -->
                <h1 class="text-center text-lg md:text-xl font-bold text-gray-800 mb-5">
                    Jumlah Peserta Keluarga Berencana Aktip Berdasarkan Penggunaan Metode  Alat Kontrasepsi di Kota Tasikmalaya
                </h1>
                <!-- Box Deskripsi -->
                <div class=" p-4 ">
                    <p class="text-gray-700 text-sm  text-justify leading-relaxed ">
                        Dataset ini berisi data jumlah pasangan usia subur berdasarkan kecamatan di Kota Tasikmalaya
                        dari
                        tahun 2019 s.d. 2024.
                        Dataset terkait topik Pengendalian Penduduk ini dihasilkan oleh Dinas Pengendalian Penduduk,
                        Keluarga Berencana,
                        Pemberdayaan Perempuan dan Perlindungan Anak Kota Tasikmalaya yang dikeluarkan dalam periode 1
                        tahun
                        sekali.
                    </p>
                </div>
                <!-- Konten Tabel -->
                <div class="p-4">
                    <div class="overflow-x-auto">
                        <table class="w-full  text-sm text-gray-700">
                            <thead class="bg-blue-100 text-center font-bold">
                                <tr>
                                    <th class="border-2 border-gray-300 px-3 py-2">No</th>
                                    <th class="border-2 border-gray-300 px-3 py-2">Nama Provinsi</th>
                                    <th class="border-2 border-gray-300 px-3 py-2">Nama Kota</th>
                                    <th class="border-2 border-gray-300 px-3 py-2">Metode Alat Kontrasepsi</th>
                                    <th class="border-2 border-gray-300 px-3 py-2">Jumlah Peserta Kb Aktip</th>
                                    <th class="border-2 border-gray-300 px-3 py-2">Satuan</th>
                                    <th class="border-2 border-gray-300 px-3 py-2">Tahun</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datakontrasepsiMetode as $row)
                                    <tr class="text-center">
                                        <td class="border-2 border-gray-300 px-2 py-1">{{ $loop->iteration }}</td>
                                        <td class="border-2 border-gray-300 px-2 py-1">
                                            {{ $row['nama_provinsi'] ?? '-' }}</td>
                                        <td class="border-2 border-gray-300 px-2 py-1">
                                            {{ $row['nama_kabupaten_kota'] ?? '-' }}</td>
                                        <td class="border-2 border-gray-300 px-2 py-1">
                                            {{ $row['metode_alat_kontrasepsi'] ?? '-' }}</td>
                                        <td class="border-2 border-gray-300 px-2 py-1">
                                            {{ number_format($row['jumlah_peserta_keluarga_berencana_aktif'] ?? '-', 0, ',', '.') }}
                                        </td>
                                        <td class="border-2 border-gray-300 px-2 py-1">{{ $row['satuan'] ?? '-' }}
                                        </td>
                                        <td class="border-2 border-gray-300 px-2 py-1">{{ $row['tahun'] ?? '-' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            <div>
                {{-- keluarga Berencana berdasarkan pemakai alat kontrasepsi --}}
            <div id="pemakaialatkontrasepsi" data-tab-content role="tabpanel"class="bg-white hidden max-w-5xl mx-auto">
                <!-- Judul -->
                <h1 class="text-center text-lg md:text-xl font-bold text-gray-800 mb-5">
                    Jumlah Pemakaian Alat Kontrasepsi Berdasarkan Kecamatan
                </h1>
                <!-- Box Deskripsi -->
                <div class=" p-4 ">
                    <p class="text-gray-700 text-sm  text-justify leading-relaxed ">
                        Dataset ini berisi data jumlah pasangan usia subur berdasarkan kecamatan di Kota Tasikmalaya
                        dari
                        tahun 2019 s.d. 2024.
                        Dataset terkait topik Pengendalian Penduduk ini dihasilkan oleh Dinas Pengendalian Penduduk,
                        Keluarga Berencana,
                        Pemberdayaan Perempuan dan Perlindungan Anak Kota Tasikmalaya yang dikeluarkan dalam periode 1
                        tahun
                        sekali.
                    </p>
                </div>
                <!-- Konten Tabel -->
                <div class="p-4">
                    <div class="overflow-x-auto">
                        <table class="w-full  text-sm text-gray-700">
                            <thead class="bg-blue-100 text-center font-bold">
                                <tr>
                                    <th class="border-2 border-gray-300 px-3 py-2">No</th>
                                    <th class="border-2 border-gray-300 px-3 py-2">Nama Provinsi</th>
                                    <th class="border-2 border-gray-300 px-3 py-2">Nama Kota</th>
                                    <th class="border-2 border-gray-300 px-3 py-2">Metode Alat Kontrasepsi</th>
                                    <th class="border-2 border-gray-300 px-3 py-2">Jumlah Peserta Kb Aktip</th>
                                    <th class="border-2 border-gray-300 px-3 py-2">Satuan</th>
                                    <th class="border-2 border-gray-300 px-3 py-2">Tahun</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datakontrasepsi as $row)
                                    <tr class="text-center">
                                        <td class="border-2 border-gray-300 px-2 py-1">{{ $loop->iteration }}</td>
                                        <td class="border-2 border-gray-300 px-2 py-1">
                                            {{ $row['nama_provinsi'] ?? '-' }}</td>
                                        <td class="border-2 border-gray-300 px-2 py-1">
                                            {{ $row['nama_kabupaten_kota'] ?? '-' }}</td>
                                        <td class="border-2 border-gray-300 px-2 py-1">
                                            {{ $row['metode_alat_kontrasepsi'] ?? '-' }}</td>
                                        <td class="border-2 border-gray-300 px-2 py-1">
                                            {{ $row['jumlah_peserta_keluarga_berencana_aktif'] ?? '-' }}
                                        </td>
                                        <td class="border-2 border-gray-300 px-2 py-1">{{ $row['satuan'] ?? '-' }}
                                        </td>
                                        <td class="border-2 border-gray-300 px-2 py-1">{{ $row['tahun'] ?? '-' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            <div>
            
            {{-- kekerasan pada perempuan --}}
            <div id="kekerasan" data-tab-content role="tabpanel" class="bg-white hidden max-w-5xl mx-auto">
                <!-- Judul -->
                <h1 class="text-center text-lg md:text-xl font-bold text-gray-800 mb-5">
                    Jumlah Kasus Kekerasan Pada Perempuan dan Anak Di Kota Tasikmalaya
                </h1>
                <!-- Box Deskripsi -->
                <div class=" p-4 ">
                    <p class="text-gray-700 text-sm text-justify leading-relaxed">
                        Dataset ini berisi data jumlah pasangan usia subur berdasarkan kecamatan di Kota Tasikmalaya
                        dari
                        tahun 2019 s.d. 2024.
                        Dataset terkait topik Pengendalian Penduduk ini dihasilkan oleh Dinas Pengendalian Penduduk,
                        Keluarga Berencana, Pemberdayaan Perempuan dan Perlindungan Anak Kota Tasikmalaya yang
                        dikeluarkan dalam periode 1 tahun
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
                                        <td class="border-2 border-gray-300 text-center px-2 py-1">
                                            {{ $loop->iteration }}</td>
                                        <td class="border-2 border-gray-300 text-center px-2 py-1">
                                            {{ $row['nama_provinsi'] ?? '-' }}</td>
                                        <td class="border-2 border-gray-300 text-center px-2 py-1">
                                            {{ $row['nama_kabupaten_kota'] ?? '-' }}</td>
                                        <td class="border-2 border-gray-300 text-center px-2 py-1">
                                            {{ number_format($row['jumlah_kasus'] ?? '-', 0, ',', '.') }}</td>
                                        <td class="border-2 border-gray-300 text-center px-2 py-1">
                                            {{ $row['satuan'] ?? '-' }}</td>
                                        <td class="border-2 border-gray-300 text-center px-2 py-1">
                                            {{ $row['tahun'] ?? '-' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{-- jenis kekerasan  --}}
            <div id="jeniskekerasan" data-tab-content role="tabpanel" class="bg-white hidden max-w-5xl mx-auto">
                <!-- Judul -->
                <h1 class="text-center text-lg md:text-xl font-bold text-gray-800 mb-5">
                    Jumlah Kasus Kekerasan Pada Perempuan dan Anak Berdasarkan Kecamatan di Kota Tasikmalaya
                </h1>
                <!-- Box Deskripsi -->
                <div class="p-4 ">
                    <p class="text-gray-700  text-sm text-justify text-sm">
                        Dataset ini berisi data jumlah pasangan usia subur berdasarkan kecamatan di Kota Tasikmalaya
                        dari
                        tahun 2019 s.d. 2024.
                        Dataset terkait topik Pengendalian Penduduk ini dihasilkan oleh Dinas Pengendalian Penduduk,
                        Keluarga Berencana,
                        Pemberdayaan Perempuan dan Perlindungan Anak Kota Tasikmalaya yang dikeluarkan dalam periode 1
                        tahun sekali.
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
                                    <th class="border-2 border-gray-300 px-3 py-2">Jenis Kekerasan</th>
                                    <th class="border-2 border-gray-300 px-3 py-2">Jumlah Kasus</th>
                                    <th class="border-2 border-gray-300 px-3 py-2">Satuan</th>
                                    <th class="border-2 border-gray-300 px-3 py-2">Tahun</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datakasusJenis as $row)
                                    <tr>
                                        <td class="border-2 border-gray-300 text-center px-2 py-1">
                                            {{ $loop->iteration }}</td>
                                        <td class="border-2 border-gray-300 text-center px-2 py-1">
                                            {{ $row['nama_provinsi'] ?? '-' }}</td>
                                        <td class="border-2 border-gray-300 text-center px-2 py-1">
                                            {{ $row['nama_kabupaten_kota'] ?? '-' }}</td>
                                        <td class="border-2 border-gray-300 text-center px-2 py-1">
                                            {{ $row['jenis_kekerasan'] ?? '-' }}</td>
                                        <td class="border-2 border-gray-300 text-center px-2 py-1">
                                            {{ number_format($row['jumlah_kasus'] ?? 0, 0, ',', '.') }}</td>
                                        <td class="border-2 border-gray-300 text-center px-2 py-1">
                                            {{ $row['satuan'] ?? '-' }}</td>
                                        <td class="border-2 border-gray-300 text-center px-2 py-1">
                                            {{ $row['tahun'] ?? '-' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{-- pembangunan Gender --}}
            <div id="pembangunangender" data-tab-content role="tabpanel" class="bg-white hidden max-w-5xl mx-auto">
                <!-- Judul -->
                <h1 class="text-center text-lg md:text-xl font-bold text-gray-800 mb-5">
                    Index Pembangunan Gender Kota Tasikmalaya
                </h1>
                <!-- Box Deskripsi -->
                <div class="p-4 ">
                    <p class="text-gray-700 text-sm text-center leading-relaxed ">
                        Dataset ini berisi data jumlah pasangan usia subur berdasarkan kecamatan di Kota Tasikmalaya
                        dari
                        tahun 2019 s.d. 2024.
                        Dataset terkait topik Pengendalian Penduduk ini dihasilkan oleh Dinas Pengendalian Penduduk,
                        Keluarga Berencana,
                        Pemberdayaan Perempuan dan Perlindungan Anak Kota Tasikmalaya yang dikeluarkan dalam periode 1
                        tahun
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
                                    <th class="border-2 border-gray-300 px-3 py-2">Index</th>
                                    <th class="border-2 border-gray-300 px-3 py-2">Satuan</th>
                                    <th class="border-2 border-gray-300 px-3 py-2">Tahun</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datapembangunan as $row)
                                    <tr class="text-center">
                                        <td class="border-2 border-gray-300 px-2 py-1">{{ $loop->iteration }}</td>
                                        <td class="border-2 border-gray-300 px-2 py-1">
                                            {{ $row['nama_provinsi'] ?? '-' }}</td>
                                        <td class="border-2 border-gray-300 px-2 py-1">
                                            {{ $row['nama_kabupaten_kota'] ?? '-' }}</td>
                                        <td class="border-2 border-gray-300 px-2 py-1">
                                            {{ $row['indeks_pembangunan_gender'] ?? '-' }}</td>
                                        <td class="border-2 border-gray-300 px-2 py-1">{{ $row['satuan'] ?? '-' }}
                                        </td>
                                        <td class="border-2 border-gray-300 px-2 py-1">{{ $row['tahun'] ?? '-' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{-- pemberdayaan gender --}}
            <div id="pemberdayaangender" data-tab-content role="tabpanel" class="bg-white hidden max-w-5xl mx-auto">
                <!-- Judul -->
                <h1 class="text-center text-lg md:text-xl font-bold text-gray-800 mb-5">
                    Index Pemberdayaan Gender Kota Tasikmalaya
                </h1>
                <!-- Box Deskripsi -->
                <div class=" p-4 ">
                    <p class="text-gray-700 text-sm leading-relaxed mb-3">
                        Dataset ini berisi data jumlah pasangan usia subur berdasarkan kecamatan di Kota Tasikmalaya
                        dari
                        tahun 2019 s.d. 2024.
                        Dataset terkait topik Pengendalian Penduduk ini dihasilkan oleh Dinas Pengendalian Penduduk,
                        Keluarga Berencana,
                        Pemberdayaan Perempuan dan Perlindungan Anak Kota Tasikmalaya yang dikeluarkan dalam periode 1
                        tahun
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
                                        <th class="border-2 border-gray-300 px-3 py-2">Index</th>
                                        <th class="border-2 border-gray-300 px-3 py-2">Satuan</th>
                                        <th class="border-2 border-gray-300 px-3 py-2">Tahun</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datapemberdayaan as $row)
                                        <tr class="text-center">
                                            <td class="border-2 border-gray-300 px-2 py-1">{{ $loop->iteration }}</td>
                                            <td class="border-2 border-gray-300 px-2 py-1">
                                                {{ $row['nama_provinsi'] ?? '-' }}</td>
                                            <td class="border-2 border-gray-300 px-2 py-1">
                                                {{ $row['nama_kabupaten_kota'] ?? '-' }}</td>
                                            <td class="border-2 border-gray-300 px-2 py-1">
                                                {{ $row['indeks_pemberdayaan_gender'] ?? '-' }}</td>
                                            <td class="border-2 border-gray-300 px-2 py-1">{{ $row['satuan'] ?? '-' }}
                                            </td>
                                            <td class="border-2 border-gray-300 px-2 py-1">{{ $row['tahun'] ?? '-' }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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

        // function loadContent(url) {
        //     const scrollY = window.scrollY; // simpan posisi scroll sebelum konten diganti

        //     fetch(url)
        //         .then(res => res.text())
        //         .then(html => {
        //             document.getElementById("content-area").innerHTML = html;
        //             window.scrollTo(0, scrollY); // balikin ke posisi scroll semula
        //         })
        //         .catch(err => console.error(err));
        // }
        // document.addEventListener("DOMContentLoaded", function() {
        //     loadContent('/sektoral/kasus');
        // });
    </script>
    <script src="node_modules/@material-tailwind/html/scripts/tabs.js"></script>

    <!-- from cdn -->
    <script src="https://unpkg.com/@material-tailwind/html@latest/scripts/tabs.js"></script>
</x-layouts.app>
