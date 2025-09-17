<x-layouts.app>
    <section class="relative bg-gray-800 text-white rounded-3xl overflow-hidden max-w-6xl mx-auto mt-24">
        <!-- Background Image -->
        <img src="{{ asset('storage/sektorall/' . $sektoral->gambar) }}" alt="Family"
            class="w-full h-full object-cover bg-white rounded-3xl opacity-80">

        <!-- Overlay -->
        <div class="absolute inset-1 bg-gradient-to-r from-gray-900/70 to-transparent flex items-end">
            <div class="px-8 mb-6 py-10 max-w-2xl">
                <h1 class="text-5xl font-bold mb-3">Data Statistik Sektoral</h1>
                <p class="text-[20px] text-justify prose leading-relaxed">
                    {!! $sektoral->deskripsi !!}
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
                <ul class="space-y-2">
                    <li>
                        <a href="#" onclick="loadContent('/sektoral/PasanganSubur')"
                            class="block bg-gray-200 px-3 py-2 rounded text-sm text-gray-700">
                            Jumlah Pasangan Subur
                        </a>
                    </li>
                    <li>
                        <a href="#" onclick="loadContent('/sektoral/PasanganSuburKecamatan')"
                            class="block bg-gray-200 px-3 py-2 rounded text-sm text-gray-700">
                            Jumlah Pasangan Subur Berdasarkan Kecamatan
                        </a>
                    </li>
                </ul>
            </div>
            <div class="bg-white shadow border border-gray-200 rounded-lg p-4">
                <h2 class="font-semibold text-gray-700 mb-4">Keluarga Berencana</h2>
                <ul class="space-y-2">
                    <li>
                        <a href="#" onclick="loadContent('/sektoral/KeluargaBerencana')"
                            class="block bg-gray-200 px-3 py-2 rounded text-sm text-gray-700">
                            Jumlah Keluarga Berencana Aktip
                        </a>
                    </li>
                    <li>
                        <a href="#" onclick="loadContent('/sektoral/KbKecamatan')"
                            class="block bg-gray-200 px-3 py-2 rounded text-sm text-gray-700">
                            Jumlah Keluarga Berencana Aktip Berdasarkan Kecamatan
                        </a>
                    </li>
                    <li>
                        <a href="#" onclick="loadContent('/sektoral/KbKontrasepsi')"
                            class="block bg-gray-200 px-3 py-2 rounded text-sm text-gray-700">
                            Jumlah Keluarga Berencana Aktip Berdasarkan Metode Alat Kontrasepsi
                        </a>
                    </li>
                    <li>
                        <a href="#" onclick="loadContent('/sektoral/KbKontrasepsiKecamatan')"
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
                <ul class="space-y-2">
                    <li><a href="#" onclick="loadContent('/sektoral/kasus')"
                            class="block bg-gray-200 px-3 py-2 rounded text-sm text-gray-700">Jumlah Kasus Kekerasan
                        </a>
                    </li>
                    <li>
                        <a href="#" onclick="loadContent('/sektoral/jenisKekerasan') "
                            class="block bg-gray-200 px-3 py-2 rounded text-sm text-gray-700">Jenis Kasus Kekerasan
                        </a>
                    </li>
                </ul
            </div></div>
            <div class="bg-white shadow border border-gray-200 rounded-lg p-4">
                <h2 class="font-semibold text-center px-2 text-gray-700 mb-4">
                    Index Macro
                </h2>
                <ul class="space-y-2">
                    <li><a href="#" onclick="loadContent('/sektoral/PembangunanGender')"
                            class="block bg-gray-200 px-3 py-2 rounded text-sm text-gray-700">Jumlah Pembangunan Gender
                        </a>
                    </li>
                    <li>
                        <a href="#" onclick="loadContent('/sektoral/PemberdayaanGender') "
                            class="block bg-gray-200 px-3 py-2 rounded text-sm text-gray-700">Jumlah Pemberdayaan Gender
                        </a>
                    </li>
                </ul
            </div>
        </aside>
        <main id="content-area" class="col-span-9 bg-white rounded-xl border border-gray-200 shadow p-6">
            {{-- Slot konten dari halaman lain --}}

        </main>
    </section>
    {{-- <section class="max-w-5xl mx-auto  py-10">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Card Kiri -->
            @if (isset($sektoral_card[0]))
            <div class="bg-white rounded-2xl shadow-md p-6 text-center border border-gray-400">
                <h2 class="text-[20px] font-semibold my-4">Pengendalian Penduduk</h2>
                <img src="{{ asset('storage/sektoral_cont/' . $sektoral_card[0]->gambar) }}" alt="Keluarga" class="mx-auto rounded-lg mb-6">
                <div class="space-y-3">
                    <div class="bg-gray-200 py-3 px-4 rounded-xl text-sm font-medium">
                        <a href="{{route('sektoral.PasanganSubur')}}">Jumlah Pasangan Usia Subur Kota Tasikmalayaya</a>
                    </div>
                    <div class="bg-gray-200 py-3 px-4 rounded-xl text-sm font-medium">
                            <a href="{{route('sektoral.PasanganSuburKecamatan')}}">Jumlah Pasangan Usia Subur Berdasarkan Kecamatan</a>
                    </div>
                </div>
            </div>
            @endif
            @if (isset($sektoral_card[1]))
            <div class="bg-white rounded-2xl shadow-md p-6 text-center border border-gray-400">
                <h2 class="text-[20px] font-semibold my-4">Keluarga Berencana</h2>
                <img src="{{ asset('storage/sektoral_cont/' . $sektoral_card[1]->gambar) }}" alt="Keluarga" class="mx-auto rounded-lg mb-6">
                <div class="space-y-3">
                    <div class="bg-gray-200 py-3 px-4 rounded-xl text-sm font-medium">
                            <a href="{{route('sektoral.KbKecamatan')}}"> Jumlah Peserta KB Aktip Berdasarkan Kecamatan</a>
                    </div>
                    <div class="bg-gray-200 py-3 px-4 rounded-xl text-sm font-medium">
                            <a href="{{route('sektoral.KbKontrasepsi')}}">Jumlah Peserta KB Aktip Metode Alat Kontrasepsi</a>
                    </div>
                    <div class="bg-gray-200 py-3 px-4 rounded-xl text-sm font-medium">
                        <a href="{{route('sektoral.KbKontrasepsiKecamatan')}}">Jumlah Pemakai Alat Kontrasepsi Berdasarkan Kecamatan</a>
                    </div>
                </div>
            </div>
            @endif
            @if (isset($sektoral_card[2]))
            <!-- Card Kanan -->
            <div class="bg-white rounded-2xl shadow-md p-6 text-center border border-gray-400">
                <h2 class="text-lg font-semibold my-4">Pemberdayaan Perempuan dan Perlindungan Anak</h2>
                <img src="{{ asset('storage/sektoral_cont/' . $sektoral_card[2]->gambar) }}" alt="Keluarga" class="mx-auto rounded-lg mb-6">
                <div class="space-y-3">
                    <div class="bg-gray-200 py-3 px-4 rounded-xl text-sm font-medium">
                        <a href="{{route('sektoral.kasus')}}">Jumlah Kasus Kekerasan Perempuan dan Anak di Kota Tasikmalaya</a>
                    </div>
                    <div class="bg-gray-200 py-3 px-4 rounded-xl text-sm font-medium">
                        <a href="{{route('sektoral.jenisKekerasan')}}">Jumlah Kasus Kekerasan Perempuan dan Anak berdasarkan Jenis Kekerasan</a>
                    </div>
                </div>
            </div>
            @endif
            @if (isset($sektoral_card[3]))
            <div class="bg-white rounded-2xl shadow-md p-6 text-center border border-gray-400">
                <h2 class="text-[20px] font-semibold my-4">Indikator Makro</h2>
                <img src="{{ asset('storage/sektoral_cont/' . $sektoral_card[3]->gambar) }}" alt="Keluarga" class="mx-auto rounded-lg mb-6">
                <div class="space-y-3">
                    <div class="bg-gray-200 py-3 px-4 rounded-xl text-sm font-medium">
                        <a href="{{route('sektoral.PemberdayaanGender')}}">Indek Pemberdayaan Gender di Kota Tasikmalaya</a>
                    </div>
                    <div class="bg-gray-200 py-3 px-4 rounded-xl text-sm font-medium">
                        <a href="{{route('sektoral.PembangunanGender')}}">Indek Pembangunan Gender di Kota Tasikmalaya</a>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </section> --}}
    <script>
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
</x-layouts.app>
