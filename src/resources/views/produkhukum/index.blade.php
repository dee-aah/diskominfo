<x-layouts.app>
    <main class="bg-white">
        <section class="relative h-screen overflow-hidden pt-20"> <!-- tambahkan pt-16 untuk kompensasi navbar -->
            <div>
                <img class="absolute brightness-25  left-0 w-full h-full object-cover object-top z-0 transform-translate-y-5"
                    src="{{ asset('storage/konten/'. $konten->img ) }}" alt="">
            </div>
            <!-- Overlay -->
            <div class="absolute bg-black bg-opacity-50 z-10"></div>
            <!-- Konten Hero -->
            <div class="relative z-20 flex items-center justify-center min-h-screen text-center px-4 pt-8 pb-8">
                <div class="text-white max-w-2xl">
                    <h1 id="typewriter"
                        class="text-4xl md:text-5xl font-bold leading-normal mb-4 text-white whitespace-nowrap"> Produk
                        Hukum</h1>
                    <p class="text-lg  mb-6">Dinas Pengendalian Penduduk, Keluarga Berencana, Pemberdayaan Perempuan, dan
                        Perlindungan Anak.
                    </p>
                </div>
            </div>

            <!-- Wave SVG -->
            <div class="absolute bottom-0 left-0 right-0 overflow-hidden leading-[0] z-20">
                <svg class="relative block w-full h-[100px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"
                    preserveAspectRatio="none">
                    <path fill="#ffffff" fill-opacity="1"
                        d="M0,128L48,154.7C96,181,192,235,288,234.7C384,235,480,181,576,149.3C672,117,768,107,864,122.7C960,139,1056,181,1152,192C1248,203,1344,181,1392,170.7L1440,160L1440,320L0,320Z">
                    </path>
                </svg>
            </div>
        </section>

        <body onload="animatePage()" class="opacity-0 translate-y-4 transition-all duration-700 ease-out bg-white">
            <div class="min-h-screen flex items-center justify-center px-6 pt-10 bg-white">
                <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-3 items-center">
                    <!-- Gambar Kiri -->
                    <div class="flex justify-center">
                        <img src="{{ asset('storage/konten/' . $produk->img) }}"
                            class="w-70 md:w-100 rounded ">
                    </div>
                    <!-- Konten Teks Kanan -->
                    <div>
                        <h1 class="text-2xl text-center md:text-3xl font-bold mb-4">
                            <span>JDIH DPPKBP3A</span> Kota Tasikmalaya
                        </h1>
                        <div class="text-base md:text-lg prose text-gray-700 mb-6 text-justify leading-relaxed">
                            {!! $produk->deskripsi !!}
                        </div>
                    </div>

                </div>
            </div>
            <div class="max-w-6xl mx-auto p-4 bg-white min-h-screen">
                <!-- FILTER DROPDOWN -->
                <div class="mb-4">

                <form method="GET" action="{{ route('produkhukum.index') }}" class="flex gap-2 mb-6">
    <!-- Dropdown Filter -->
    <select name="jenis_peraturan" class="border-1 border-gray-300 placeholder:text-sm
                        text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500   placeholder:italic rounded-xl px-2 py-1">
        <option value="">Filter</option>
        <option value="Peraturan Daerah" {{ request('jenis_peraturan') == 'Peraturan Daerah' ? 'selected' : '' }}>Peraturan Daerah</option>
        <option value="Peraturan Walikota" {{ request('jenis_peraturan') == 'Peraturan Walikota' ? 'selected' : '' }}>Peraturan Walikota</option>
    </select>

    <!-- Input Search -->
    <input type="text" name="search" value="{{ request('search') }}"
        placeholder="Masukkan Kata Kunci Pencarian"
        class=" px-4 py-2 border-1 border-gray-300 rounded-xl max-w-2xl  placeholder:text-sm
                            placeholder:italic   w-100  text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" />

    <!-- Tombol Cari -->
    <button type="submit"
        class="bg-blue-700 text-white px-6 py-2 rounded-xl hover:bg-blue-800 font-semibold">Cari</button>
</form>


<!-- LIST ITEM -->
<div class="space-y-6">
    @forelse ($produkhukum as $item)
        <div class="{{ $loop->odd ? 'bg-blue-50' : 'bg-gray-100' }} rounded-md shadow p-4 flex items-start gap-10">
            <a href="{{ route('produkhukum.show', $item->id) }}" class="w-24 text-center">
                <img src="{{ asset('storage/default/pdf.png') }}"
                     class="mx-auto w-24 h-auto" alt="PDF Thumbnail" />
            </a>
            <div class="flex-1 space-y-2">
                <a href="{{ route('produkhukum.show', $item->id) }}"
                   class="font-bold text-[20px]" target="_blank">
                   {{ $item->judul_peraturan }}
                </a>
                <p class="text-[14px] text-gray-800 leading-snug">
                    Registrasi : {{ $item->reg }}<br />
                    Nomor : {{ $item->nomor }}<br />
                    Tahun : {{ $item->tahun_terbit }}<br />
                </p>
                <div class="flex gap-2 mt-2">
                    <span class="bg-gray-200  text-gray-800 text-xs px-4 py-1 rounded-xl">
                        {{ strtoupper($item->status) }}
                    </span>
                    <a href="{{ route('produkhukum.download', $item->id) }}"
                       class="bg-blue-700 hover:bg-blue-800 text-white text-xs px-4 py-1 rounded">UNDUH</a>
                    {{-- <a href="{{ route('produkhukum.show', $item->id) }}"
                       class="bg-green-700 hover:bg-green-800 text-white text-xs px-4 py-1 rounded">Lihat Detail</a> --}}
                </div>
            </div>
        </div>
    @empty
        <div class="p-6 text-center bg-red-50 text-red-600 rounded-md">
            <p class="font-semibold">❌ Data tidak ditemukan</p>
            <a href="{{ route('produkhukum.index') }}"
               class="inline-block mt-2 px-4 py-1 bg-blue-600 text-white rounded hover:bg-blue-700">
               Reset Filter
            </a>
        </div>
    @endforelse
    <div class="mt-6">
    {{ $produkhukum->withQueryString()->links() }}
</div>

</div>

            <script>
                function toggleDropdown() {
                    const dropdown = document.getElementById("dropdownMenu");
                    dropdown.classList.toggle("hidden");
                }

                function selectFilter(value) {
                    document.getElementById("selectedFilter").innerText = value;
                    document.getElementById("dropdownMenu").classList.add("hidden");
                }

                window.addEventListener("click", function(e) {
                    const dropdown = document.getElementById("dropdownMenu");
                    const button = document.querySelector("button[onclick='toggleDropdown()']");
                    if (!button.contains(e.target)) {
                        dropdown.classList.add("hidden");
                    }
                });

                function animatePage() {
                    document.body.classList.remove('opacity-0', 'translate-y-4');
                }
            </script>

        </body>
    </main>
</x-layouts.app>
