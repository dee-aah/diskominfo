<x-layouts.app>
    <section class="relative bg-gray-800 text-white rounded-2xl overflow-hidden max-w-5xl mx-auto mt-24">
        <!-- Background Image -->
        <img src="{{asset('img/keluarga.jpg')}}" alt="Family" class="w-full h-full object-cover opacity-80">

        <!-- Overlay -->
        <div class="absolute inset-1 bg-gradient-to-r from-gray-900/70 to-transparent flex items-end">
            <div class="px-8 mb-6 py-10 max-w-2xl">
                <h1 class="text-5xl font-bold mb-3">Data Statistik Sektoral</h1>
                <p class="text-[20px] text-justify leading-relaxed">
                    Data Statistik Sektoral DPPKBP3A berisi gambaran angka dan informasi seputar penduduk, keluarga
                    berencana,
                    perlindungan anak, serta pemberdayaan perempuan di Kota Tasikmalaya
                </p>
            </div>
        </div>
    </section>

    <!-- Highlight Section -->
    <section class="max-w-5xl mx-auto  py-10">
        <h2 class="text-xl font-semibold mb-6">Sorotan Data Utama</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <!-- Card 1 -->
            <div class="bg-blue-600 text-white p-6 rounded-xl shadow-md text-center">
                <h3 class="text-lg font-medium">Pasangan Usia Subur</h3>
                <p class="text-3xl font-bold mt-2">{{$datasuburterbaru}}</p>
                <p class="text-sm mt-2">Total Pasangan Usia Subur se-Kota Tasikmalaya Tahun {{$tahunsuburterbaru}}.</p>
            </div>

            <!-- Card 2 -->
            <div class="bg-blue-600 text-white p-6 rounded-xl shadow-md text-center">
                <h3 class="text-lg font-medium">Peserta Keluarga Berencana</h3>
                <p class="text-3xl font-bold mt-2">{{$datakbterbaru}}</p>
                <p class="text-sm mt-2">Jumlah Akseptor Keluarga Berencana Aktif Tahun  {{ $tahunkbterbaru }}.</p>
            </div>

            <!-- Card 3 -->
            <div class="bg-blue-600 text-white p-6 rounded-xl shadow-md text-center">
                <h3 class="text-lg font-medium">Kasus Kekerasan</h3>
                    <a href="{{route('sektoral.kasus')}}"
                     class="text-3xl font-bold mt-2">{{ $datakasusterbaru }}
                    </a>
                <p class="text-sm mt-2">Kasus Kekerasan Terhadap Perempuan & Anak Ditangani Tahun {{ $tahunkasusterbaru }}</p>
            </div>
        </div>
    </section>
    <section class="max-w-5xl mx-auto  py-10">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

            <!-- Card Kiri -->
            <div class="bg-white rounded-2xl shadow-md p-6 text-center border border-gray-400">
                <h2 class="text-lg font-semibold mb-4">Keluarga Berencana</h2>
                <img src="gambar/layanan.jpg" alt="Keluarga" class="mx-auto rounded-lg mb-6">

                <div class="space-y-3">
                    <a href="isi-sektoral.html">
                        <div class="bg-gray-200 py-3 px-4 rounded-xl text-sm font-medium">
                            Jumlah Peserta KB (2020-2024) - Metode Kontrasepsi
                        </div>
                    </a>
                    <a href="isi.html">
                        <div class="bg-gray-200 py-3 px-4 rounded-xl text-sm font-medium">
                            Pasangan Usia Subur Kota Tasikmalaya (2019-2024)
                        </div>
                    </a>
                    <div class="bg-gray-200 py-3 px-4 rounded-xl text-sm font-medium">
                        Pemakaian Alat Kontrasepsi Kota Tasikmalaya (2024)
                    </div>
                </div>
            </div>

            <!-- Card Kanan -->
            <div class="bg-white rounded-2xl shadow-md p-6 text-center border border-gray-400">
                <h2 class="text-lg font-semibold mb-4">Keluarga Sejahtera</h2>
                <img src="gambar/layanan1.jpg" alt="Keluarga" class="mx-auto rounded-lg mb-6">

                <div class="space-y-3">
                    <div class="bg-gray-200 py-3 px-4 rounded-xl text-sm font-medium">
                        Jumlah Keluarga Pra Sejahtera (2020-2024)
                    </div>
                    <div class="bg-gray-200 py-3 px-4 rounded-xl text-sm font-medium">
                        Jumlah Keluarga Sejahtera Tahap I (2019-2024)
                    </div>
                    <div class="bg-gray-200 py-3 px-4 rounded-xl text-sm font-medium">
                        Jumlah Keluarga Sejahtera Tahap II (2024)
                    </div>
                </div>
            </div>

        </div>
    </section>
</x-layouts.app>
