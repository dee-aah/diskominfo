<x-layouts.app>
    <section class="relative bg-gray-800 text-white rounded-2xl overflow-hidden max-w-5xl mx-auto mt-24">
        <!-- Background Image -->
        <img src="{{asset('storage/sektorall/'.$sektoral->gambar)}}" alt="Family" class="w-full h-full object-cover opacity-80">

        <!-- Overlay -->
        <div class="absolute inset-1 bg-gradient-to-r from-gray-900/70 to-transparent flex items-end">
            <div class="px-8 mb-6 py-10 max-w-2xl">
                <h1 class="text-5xl font-bold mb-3">Data Statistik Sektoral</h1>
                <p class="text-[20px] text-justify leading-relaxed">
                    {{$sektoral->deskripsi}}
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
                <a href="{{route('sektoral.PasanganSubur')}}" class="text-3xl font-bold mt-2">{{number_format($datasuburterbaru, 0, ',', '.')}}</a>
                <p class="text-sm mt-2">Total Pasangan Usia Subur se-Kota Tasikmalaya Tahun {{$tahunsuburterbaru}}.</p>
            </div>

            <!-- Card 2 -->
            <div class="bg-blue-600 text-white p-6 rounded-xl shadow-md text-center">
                <h3 class="text-lg font-medium">Peserta Keluarga Berencana</h3>
                <a href="{{route('sektoral.KeluargaBerencana')}}" class="text-3xl font-bold mt-2">{{number_format($datakbterbaru, 0, ',', '.')}}</a>
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
    </section>
</x-layouts.app>
