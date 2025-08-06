<x-layouts.app>
    <body>
    <section class="relative h-screen overflow-hidden pt-15 "> <!-- tambahkan pt-16 untuk kompensasi navbar -->
        <div>
            <img class="absolute brightness-25  left-0 w-full h-full object-cover object-top z-0 transform-translate-y-5"
                src="{{ asset('img/3.jpg') }}" alt="">
        </div>

        <!-- Overlay -->
        <div class="absolute  bg-black bg-opacity-50 z-10"></div>

        <!-- Konten Hero -->
        <div class="relative z-20 flex items-center justify-center min-h-screen text-center px-4 pt-8 pb-8">
            <div class="text-white max-w-2xl">
                <h1 id="typewriter"
                    class="text-4xl md:text-5xl font-bold leading-normal mb-4 text-white whitespace-nowrap">Visi dan Misi
                </h1>

                <p class="text-lg mb-6">Dinas Pengendalian Penduduk, Keluarga Berencana, Pemberdayaan Perempuan, dan
                    Perlindungan Anak.</p>

            </div>
        </div>

        <!-- Wave SVG -->
        <div class="absolute bottom-0 left-0 right-0 overflow-hidden leading-[0] z-20">
            <svg class="relative block w-full h-[100px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"
                preserveAspectRatio="none">
                <path fill="oklch(0.985 0.001 106.423)" fill-opacity="1"
                    d="M0,128L48,154.7C96,181,192,235,288,234.7C384,235,480,181,576,149.3C672,117,768,107,864,122.7C960,139,1056,181,1152,192C1248,203,1344,181,1392,170.7L1440,160L1440,320L0,320Z">
                </path>
            </svg>
        </div>
    </section>
    <section class="bg-stone-50 text-center py-10 -mt-1">
        <h2 class="text-2xl font-bold text-black mb-4">Visi dan Misi DPPKBP3A</h2>
        <p class="text-black max-w-2xl mx-auto px-4">
            Panduan dan arah kebijakan pembangunan daerah untuk mewujudkan masyarakat yang sejahtera, adil, dan makmur
        </p>
    </section>

    <!-- Container Grid Visi Misi (Atas Bawah) -->
    <div class="flex justify-center px-4 py-10 bg-stone-50">
        <div class="grid grid-cols-1 gap-6 max-w-4xl w-full">

            <!-- Visi -->
            <div class="bg-white p-6 rounded-[2rem] text-center shadow-md border-2 border-green-600">
                <div class="flex items-center justify-center  gap-4">
                    <img width="50" height="50" class="mb-1" src="https://img.icons8.com/ios/50/stargaze.png" alt="stargaze"/>
                    <h2 class="text-3xl font-bold  ">Visi</h2>
                </div>
                <hr class="w-29 mx-auto border-t-2 border-blue-300 mb-4" />
                <p class="text-gray-700 leading-relaxed">
                    Terwujudnya Kemandirian Masyarakat yang berwawasan Kependudukan, Gender dan Anak
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident tempora pariatur molestiae
                    assumenda maiores quia rem perspiciatis natus eaque error voluptas incidunt in, nobis aliquid
                    inventore, similique sequi mollitia ratione.
                </p>
            </div>

            <!-- Misi -->
            <div class="bg-white p-6 rounded-[2rem] text-center shadow-md border-2 border-green-600">
                <div class="flex items-center justify-center  gap-4">
                    <img width="50" height="50" class="mb-1" src="https://img.icons8.com/external-goofy-line-kerismaker/50/external-Goals-business-goofy-line-kerismaker.png" alt="external-Goals-business-goofy-line-kerismaker"/>
                    <h2 class="text-3xl font-bold  ">Misi</h2>
                </div>
                <hr class="w-29 mx-auto border-t-2 border-blue-300 mb-4" />
                <p class="text-gray-700 leading-relaxed">
                    Mewujudkan Program Nyata yang Berorientasi Pada Pembangunan Masyarakat Inklusif
                </p>
            </div>

        </div>
    </div>
    <section class="bg-stone-50 py-16 text-center">
        <h2 class="text-2xl md:text-3xl font-bold mb-2">Pencapaian & Dampak</h2>
        <p class="text-gray-600 mb-10">Komitmen nyata dalam melayani masyarakat Kota Tasikmalaya</p>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 px-4 md:px-20 max-w-4xl mx-auto">
            <!-- Keluarga Terlayani -->
            <div class="bg-white rounded-xl shadow-md p-6">
                <div class="flex justify-center mb-3">
                    <div class="bg-blue-100 p-3 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-500" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a4 4 0 00-5-4m-6 6H2v-2a4 4 0 015-4h1m3 0a4 4 0 100-8 4 4 0 000 8zm6-4a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                </div>
                <h3 class="text-2xl font-bold text-blue-500">15K+</h3>
                <p class="text-sm text-gray-700 mt-1">Keluarga Terlayani</p>
            </div>

            <!-- Program KB -->
            <div class="bg-white rounded-xl shadow-md p-6">
                <div class="flex justify-center mb-3">
                    <div class="bg-green-100 p-3 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-500" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 10h16m-7 4h7m-7 4h7M3 14h3m-3 4h3" />
                        </svg>
                    </div>
                </div>
                <h3 class="text-2xl font-bold text-green-500">8K+</h3>
                <p class="text-sm text-gray-700 mt-1">Program KB</p>
            </div>

            <!-- Anak Terlindungi -->
            <div class="bg-white rounded-xl shadow-md p-6">
                <div class="flex justify-center mb-3">
                    <div class="bg-blue-100 p-3 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-400" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4v4m0 0a4 4 0 014 4v4a4 4 0 01-4 4m0-8a4 4 0 00-4 4v4a4 4 0 004-4" />
                        </svg>
                    </div>
                </div>
                <h3 class="text-2xl font-bold text-blue-400">12K+</h3>
                <p class="text-sm text-gray-700 mt-1">Anak Terlindungi</p>
            </div>

            <!-- Tingkat Kepuasan -->
            <div class="bg-white rounded-xl shadow-md p-6">
                <div class="flex justify-center mb-3">
                    <div class="bg-green-100 p-3 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-400" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 11V7a4 4 0 018 0v4a4 4 0 01-8 0zM5 17h14M5 21h14" />
                        </svg>
                    </div>
                </div>
                <h3 class="text-2xl font-bold text-green-400">95%</h3>
                <p class="text-sm text-gray-700 mt-1">Tingkat Kepuasan</p>
            </div>
        </div>
    </section>
    </body>
</x-layouts.app>
