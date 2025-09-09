<x-layouts.app>
    <body>
    <section class="relative h-screen overflow-hidden pt-15 "> <!-- tambahkan pt-16 untuk kompensasi navbar -->
        <div>
            <img class="absolute brightness-25  left-0 w-full h-full object-cover object-top z-0 transform-translate-y-5"
                src="{{asset('storage/visi/' . $visi->gambar) }}" alt="">
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
                <path fill="#ffffff" fill-opacity="1"
                    d="M0,128L48,154.7C96,181,192,235,288,234.7C384,235,480,181,576,149.3C672,117,768,107,864,122.7C960,139,1056,181,1152,192C1248,203,1344,181,1392,170.7L1440,160L1440,320L0,320Z">
                </path>
            </svg>
        </div>
    </section>
    <section class="bg-white text-center max-w-6xl mx-auto py-8 -mt-1">
        <h2 class="text-xl md:text-2xl font-bold text-black pb-3">Visi dan Misi DPPKBP3A</h2>
        <p class="text-black max-w-5xl text-sm mx-auto px-4">
            {{$visi->des_singkat}}
        </p>
    </section>

    <!-- Container Grid Visi Misi (Atas Bawah) -->
    <div class="flex justify-center max-w-6xl mx-auto px-4 pb-8 bg-white">
        <div class="grid grid-cols-1 gap-6 max-w-6xl w-full">

            <!-- Visi -->
            <div class="bg-white p-6 rounded-[2rem] text-center shadow-md border-2 border-[#476A9A]">
                <div class="flex items-center justify-center  gap-4">
                    <img width="50" height="50" class="mb-1" src="https://img.icons8.com/ios/50/stargaze.png" alt="stargaze"/>
                    <h2 class="text-3xl font-bold  ">Visi</h2>
                </div>
                <hr class="w-29 mx-auto border-t-2 border-blue-300 mb-4" />
                <p class="text-gray-700 leading-relaxed">
                    {{$visi->visi}}
                </p>
            </div>

            <!-- Misi -->
            <div class="bg-white p-6 rounded-[2rem] text-center shadow-md border-2 border-[#476A9A]">
                <div class="flex items-center justify-center  gap-4">
                    <img width="50" height="50" class="mb-1" src="https://img.icons8.com/external-goofy-line-kerismaker/50/external-Goals-business-goofy-line-kerismaker.png" alt="external-Goals-business-goofy-line-kerismaker"/>
                    <h2 class="text-3xl font-bold  ">Misi</h2>
                </div>
                <hr class="w-29 mx-auto border-t-2 border-blue-300 mb-4" />
                <p class="text-gray-700 leading-relaxed">
                    {{$visi->misi}}
                </p>
            </div>

        </div>
    </div>
    </body>
</x-layouts.app>
