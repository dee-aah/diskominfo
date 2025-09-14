<x-layouts.sideb>
    <body class="bg-gray-50 font-sans p-6">
        <div class="bg-white   max-w-5xl mx-auto">
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
                <ul class="list-disc pl-6 text-sm text-gray-700 space-y-2">
                    <li><b>kode_provinsi:</b> menyatakan kode Provinsi Jawa Barat sesuai ketentuan BPS merujuk pada
                        aturan Peraturan Badan Pusat Statistik Nomor 3 Tahun 2019 dengan tipe data numerik.</li>
                    <li><b>nama_provinsi:</b>menyatakan lingkup data berasal dari wilayah Provinsi Jawa Barat sesuai
                        ketentuan BPS merujuk pada aturan Peraturan Badan Pusat Statistik Nomor 3 Tahun 2019 dengan tipe
                        data teks.</li>
                    <li><b>kode_kabupaten_kota:</b>menyatakan kode Kota Tasikmalaya sesuai ketentuan BPS merujuk pada
                        Peraturan Badan Pusat Statistik Nomor 3 Tahun 2019 dengan tipe data numerik.</li>
                    <li><b>nama_kabupaten_kota:</b> menyatakan lingkup data berasal dari wilayah Kota Tasikmalaya sesuai
                        penamaan BPS merujuk pada Peraturan Badan Pusat Statistik Nomor 3 Tahun 2019 dengan tipe data
                        teks.</li>
                    <li><b>kode_kecamatan:</b> menyatakan kode dari setiap kecamatan di Kota Tasikmalaya sesuai
                        ketentuan BPS merujuk pada Peraturan Badan Pusat Statistik Nomor 3 Tahun 2019 dengan tipe data
                        numerik.</li>
                    <li><b>nama_kecamatan:</b> menyatakan lingkup data berasal dari setiap kecamatan di Kota Tasikmalaya
                        sesuai penamaan BPS merujuk pada Peraturan Badan Pusat Statistik Nomor Nomor 3 Tahun 2019 dengan
                        tipe data teks.</li>
                    <li><b>jumlah_pasangan_usia_subur:</b> menyatakan jumlah pasangan usia subur dengan tipe data
                        numerik.</li>
                    <li><b>satuan:</b> menyatakan satuan dari pengukuran jumlah pasangan usia subur dalam orang dengan
                        tipe data teks.</li>
                    <li><b>tahun: </b> menyatakan tahun produksi data dengan tipe data numerik.</li>
                </ul>
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
                                    <th class="border px-3 py-2">Nama Kecamatan</th>
                                    <th class="border px-3 py-2">Jumlah Peserta Kb Aktip</th>
                                    <th class="border px-3 py-2">Satuan</th>
                                    <th class="border px-3 py-2">Tahun</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datasubur as $row)
                                    <tr>
                                        <td class="border text-justify px-2 py-1">{{ $row['nama_provinsi'] ?? '-' }}</td>
                                        <td class="border text-justify px-2 py-1">{{ $row['nama_kabupaten_kota'] ?? '-' }}</td>
                                        <td class="border text-justify px-2 py-1">{{ $row['nama_kecamatan'] ?? '-' }}</td>
                                        <td class="border text-justify px-2 py-1">{{ number_format($row['jumlah_pasangan_usia_subur'] ?? '-', 0, ',', '.') }}</td>
                                        <td class="border text-justify px-2 py-1">{{ $row['satuan'] ?? '-' }}</td>
                                        <td class="border text-justify px-2 py-1">{{ $row['tahun'] ?? '-' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="mt-4">
                            {{ $datasubur->links('pagination::tailwind') }}
                        </div>
                    </div>
                </div>

                <!-- Konten Grafik -->
                <div id="contentGrafik" class="p-4  hidden">
                    <canvas id="suburChart" height="120"></canvas>
                </div>
            </div>
        </div>

        <!-- Script Tab & Grafik -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const tabTabel = document.getElementById("tabTabel");
            const tabGrafik = document.getElementById("tabGrafik");
            const contentTabel = document.getElementById("contentTabel");
            const contentGrafik = document.getElementById("contentGrafik");

            // Tab handler
            tabTabel.addEventListener("click", () => {
                contentTabel.classList.remove("hidden");
                contentGrafik.classList.add("hidden");
                tabTabel.classList.add("text-blue-600", "border-b-2", "border-blue-600");
                tabGrafik.classList.remove("text-blue-600", "border-b-2", "border-blue-600");
                tabGrafik.classList.add("text-gray-600");
            });

            tabGrafik.addEventListener("click", () => {
                contentGrafik.classList.remove("hidden");
                contentTabel.classList.add("hidden");
                tabGrafik.classList.add("text-blue-600", "border-b-2", "border-blue-600");
                tabTabel.classList.remove("text-blue-600", "border-b-2", "border-blue-600");
                tabTabel.classList.add("text-gray-600");
            });

            // Data untuk grafik
            const labels = @json($KecamatanList);
const datasets = @json($datasets);

// Tambahkan warna dinamis biar beda per tahun
const colors = [
    "rgba(54, 162, 235, 0.6)",
    "rgba(255, 99, 132, 0.6)",
    "rgba(255, 206, 86, 0.6)",
    "rgba(75, 192, 192, 0.6)",
    "rgba(153, 102, 255, 0.6)",
    "rgba(255, 159, 64, 0.6)"
];

datasets.forEach((ds, i) => {
    ds.fill = true;
    ds.backgroundColor = colors[i % colors.length];
    ds.borderColor = colors[i % colors.length].replace("0.6", "1");
    ds.tension = 0.3;
});

new Chart(document.getElementById("suburChart"), {
    type: 'bar', // bisa diganti 'bar' kalau mau grouped bar
    data: {
        labels: labels,
        datasets: datasets
    },
    options: {
        responsive: true,
        plugins: {
            legend: { position: 'top' },
            title: {
                display: true,
                text: 'Jumlah Pasangan Usia Subur Berdasarkan Kecamatan '
            }
        },
        scales: {
            x: { stacked: false },
            y: { beginAtZero: true }
        }
    }
});

        </script>
    </body>
</x-layouts.app>
