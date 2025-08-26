<x-layouts.app>
    <main class="bg-white">
        <body onload="animatePage()" class="opacity-0 translate-y-4 transition-all duration-700 ease-out bg-indigo-100">
            <div class="min-h-screen flex items-center justify-center px-6 pt-10 bg-indigo-100">
                <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-3 items-center">
                    <!-- Gambar Kiri -->
                    <div class="flex justify-center">
                        <img src="{{ asset('storage/produkimg/'. $ProdukHukumCont->img_cont) }}"  class="w-70 md:w-100 rounded shadow-lg">
                    </div>
                    <!-- Konten Teks Kanan -->
                    <div>
                        <h1 class="text-2xl text-center md:text-3xl font-bold mb-4">
                            <span>JDIH DPPKBP3A</span> Kota Tasikmalaya
                        </h1>
                        <p class="text-base md:text-lg text-gray-700 mb-6 text-justify leading-relaxed">
                            {{$ProdukHukumCont->deskripsi}}
                        </p>
                    </div>

                </div>
            </div>
            <div class="max-w-6xl mx-auto p-4 bg-white min-h-screen">
                <!-- FILTER DROPDOWN -->
                <div class="mb-4">

                    <div class="relative inline-block">
                        <button onclick="toggleDropdown()"
                            class="bg-blue-700 text-white px-4 py-1 rounded text-sm shadow flex items-center space-x-1">
                            <span id="selectedFilter">Filter</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div id="dropdownMenu" class="absolute z-10 mt-1 w-48 bg-white border rounded shadow hidden">
                            <button onclick="selectFilter('Peraturan Daerah')"
                                class="block w-full text-left px-4 py-2 hover:bg-blue-100">Peraturan Daerah</button>
                            <button onclick="selectFilter('Peraturan Walikota')"
                                class="block w-full text-left px-4 py-2 hover:bg-blue-100">Peraturan Walikota</button>
                        </div>
                    </div>
                </div>

                <!-- INPUT PENCARIAN -->
                <div class="flex flex-wrap items-center gap-2 mb-6">
                    <input type="text" placeholder="Masukkan Kata Kunci Pencarian"
                        class="border px-4 py-2 rounded-md w-full md:w-[400px]" />
                    <button
                        class="bg-blue-700 text-white px-6 py-2 rounded hover:bg-blue-800 font-semibold">Cari</button>
                </div>

                <!-- LIST ITEM -->
                <div class="space-y-6">
    @foreach($produkhukum as $item)
        <div class="{{ $loop->odd ? 'bg-blue-50' : 'bg-gray-100' }} rounded-md shadow p-4 flex items-start gap-10">
            <div class="w-24 text-center">
                <img src="{{ asset('storage/produkimg/'. $ProdukHukumCont->img_pdf) }}"
                    class="mx-auto w-24 h-auto" alt="PDF Thumbnail" />
            </div>
            <div class="flex-1 space-y-2">
                <a href="{{ asset('storage/produk/'.$item->lampiran) }}"
                   class="text-sm  font-semibold text-blue-900 underline" target="_blank">
                    {{ $item->judul }}
                </a>
                <p class="text-[14px] text-gray-800 leading-snug">
                    <p class="font-bold text-[20px]">{{ $item->judul_peraturan }}</p>
                    Registrasi : {{ $item->reg }}<br/>
                    Nomor      : {{ $item->nomor }}<br/>
                    Tahun      : {{ $item->tahun_terbit }}<br/>
                </p>
                <div class="flex gap-2 mt-2">
                    <a  class="bg-green-700 hover:bg-green-800 text-white text-xs px-4 py-1 rounded">
                        {{ strtoupper($item->status) }}
                    </a>
                    <a href="{{ route('produkhukum.download', $item->id) }}"
                        class="bg-blue-700 hover:bg-blue-800 text-white text-xs px-4 py-1 rounded">UNDUH
                    </a>
                    <a href="{{ route('produkhukum.show',$item->id)}}"
                        class="bg-blue-700 hover:bg-blue-800 text-white text-xs px-4 py-1 rounded">
                        Lihat Detail
                    </a>
                </div>
            </div>
        </div>
    @endforeach
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
