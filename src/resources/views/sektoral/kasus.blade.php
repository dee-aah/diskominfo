<x-layouts.sideb>

    <body class="bg-gray-50 font-sans p-6">

        {{-- <div class="bg-white  max-w-5xl mx-auto">
            <!-- Judul -->
            <h1 class="text-center text-xl font-bold text-gray-800 mb-6">
                Jumlah Peserta KB (2020–2024) - Metode Kontrasepsi
            </h1>

            <!-- Box Deskripsi -->
            <div class="border rounded-lg p-4 mb-6">
                <h2 class="text-center font-semibold text-gray-700 border-b pb-2 mb-4">
                    Deskripsi
                </h2>
                <p class="text-gray-700 text-sm leading-relaxed mb-3">
                    Dataset ini berisi data jumlah pasangan usia subur berdasarkan kecamatan di Kota Tasikmalaya dari
                    tahun 2019 s.d. 2024.
                    Dataset terkait topik Pengendalian Penduduk ini dihasilkan oleh Dinas Pengendalian Penduduk,
                    Keluarga Berencana,
                    Pemberdayaan Perempuan dan Perlindungan Anak Kota Tasikmalaya yang dikeluarkan dalam periode 1 tahun
                    sekali.
                </p>

                <p class="text-gray-700 text-sm leading-relaxed mb-3">
                    Penjelasan mengenai variabel di dalam dataset ini:
                </p>


            </div>
            <!-- Tabs -->
            <div class="border mb-6 rounded-lg">
                <div class="flex border-b">
                    <button id="tabTabel"
                        class="flex-1 text-center py-2 font-semibold text-blue-600 border-b-2 border-blue-600">Tabel</button>
                    <button id="tabGrafik" class="flex-1 text-center py-2 font-semibold text-gray-600">Grafik</button>
                </div>
                <!-- Konten Tabel -->
                <div id="contentTabel" class="p-4">
                    <div class="overflow-x-auto">
                        <table class="w-full border text-sm text-gray-700">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="border px-3 py-2">Nama Provinsi</th>
                                    <th class="border px-3 py-2">Nama Kota</th>
                                    <th class="border px-3 py-2">Jumlah Kasus</th>
                                    <th class="border px-3 py-2">Satuan</th>
                                    <th class="border px-3 py-2">Tahun</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $row)
                                    <tr>
                                        <td class="border text-justify px-2 py-1">{{ $row['nama_provinsi'] ?? '-' }}</td>
                                        <td class="border text-justify px-2 py-1">{{ $row['nama_kabupaten_kota'] ?? '-' }}</td>
                                        <td class="border text-justify px-2 py-1">{{ number_format($row['jumlah_kasus'] ?? '-', 0, ',', '.') }}</td>
                                        <td class="border text-justify px-2 py-1">{{ $row['satuan'] ?? '-' }}</td>
                                        <td class="border text-justify px-2 py-1">{{ $row['tahun'] ?? '-' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Konten Grafik -->
                <div id="contentGrafik" class="p-4  hidden">
                    <canvas id="kasusChartMain" height="120"></canvas>
                </div>
            </div>
        </div> --}}
        <div class="border mb-6 rounded-lg">
    <div class="flex border-b">
        <button id="tabTabel"
            class="flex-1 text-center py-2 font-semibold text-blue-600 border-b-2 border-blue-600">
            Tabel
        </button>
        <button id="tabGrafik"
            class="flex-1 text-center py-2 font-semibold text-gray-600">
            Grafik
        </button>
    </div>

    <!-- Konten Tabel (default tampil) -->
    <div id="contentTabel" class="p-4">
        <div class="overflow-x-auto">
            <table class="w-full border text-sm text-gray-700">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border px-3 py-2">Nama Provinsi</th>
                        <th class="border px-3 py-2">Nama Kota</th>
                        <th class="border px-3 py-2">Jumlah Kasus</th>
                        <th class="border px-3 py-2">Satuan</th>
                        <th class="border px-3 py-2">Tahun</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $row)
                        <tr>
                            <td class="border px-2 py-1">{{ $row['nama_provinsi'] ?? '-' }}</td>
                            <td class="border px-2 py-1">{{ $row['nama_kabupaten_kota'] ?? '-' }}</td>
                            <td class="border px-2 py-1">{{ number_format($row['jumlah_kasus'] ?? '-', 0, ',', '.') }}</td>
                            <td class="border px-2 py-1">{{ $row['satuan'] ?? '-' }}</td>
                            <td class="border px-2 py-1">{{ $row['tahun'] ?? '-' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Konten Grafik (default disembunyikan) -->
    <div id="contentGrafik" class="p-4 hidden">
        <canvas id="kasusChartMain" height="120"></canvas>
    </div>
</div>

@push('scripts')
        <!-- Script Tab & Grafik -->
        <script>
    const tabTabel = document.getElementById("tabTabel");
    const tabGrafik = document.getElementById("tabGrafik");
    const contentTabel = document.getElementById("contentTabel");
    const contentGrafik = document.getElementById("contentGrafik");
    let chartRendered = false;

    tabTabel.addEventListener("click", () => {
        contentTabel.classList.remove("hidden");
        contentGrafik.classList.add("hidden");

        // styling aktif
        tabTabel.classList.add("text-blue-600", "border-b-2", "border-blue-600");
        tabTabel.classList.remove("text-gray-600");

        tabGrafik.classList.remove("text-blue-600", "border-b-2", "border-blue-600");
        tabGrafik.classList.add("text-gray-600");
    });

    tabGrafik.addEventListener("click", () => {
        contentGrafik.classList.remove("hidden");
        contentTabel.classList.add("hidden");

        // styling aktif
        tabGrafik.classList.add("text-blue-600", "border-b-2", "border-blue-600");
        tabGrafik.classList.remove("text-gray-600");

        tabTabel.classList.remove("text-blue-600", "border-b-2", "border-blue-600");
        tabTabel.classList.add("text-gray-600");

        // render chart hanya sekali
        if (!chartRendered) {
            renderKasusChart(@json($tahunList), @json($totalKasusPerTahun));
            chartRendered = true;
        }
    });
</script>@endpush

</body>
</x-layouts.sideb>
