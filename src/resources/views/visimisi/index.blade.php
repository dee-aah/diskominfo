<x-layouts.app>
    <body>
    <section class="relative h-screen overflow-hidden pt-15 "> <!-- tambahkan pt-16 untuk kompensasi navbar -->
        <div>
            <img class="absolute brightness-50  left-0 w-full h-full object-cover object-top z-0 transform-translate-y-5"
                src="{{asset('storage/konten/' . $konten->img) }}" alt="">
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

    <!-- Container Grid Visi Misi (Atas Bawah) -->
    <div class="flex justify-center max-w-6xl mx-auto px-4 py-10 bg-white">
        <div class="grid grid-cols-1 gap-6 max-w-6xl w-full">
            <!-- Visi -->
            <div class="bg-white py-6 rounded-[1rem] text-center shadow-md border-2 border-[#147DF8]">
                <div class="flex items-center justify-center mb-4  ">
                    <div class=" grid grid-flow-col grid-rows-2  mb-2">
                        <div class="rounded-full row-span-2 text-center flex bg-blue-100 py-6 px-6">
                            <img width="30" style="color:blue; " height="30" src="https://img.icons8.com/ios-glyphs/30/visible--v1.png" alt="visible--v1"/>
                        </div>
                        <div class="col-span-2 row-span-1 "></div>
                        <div class="col-span-2 align-bottom mt-2 ">
                            <h2 class="text-xl   font-bold border px-3  text-[#147df8]  rounded-full border-[#147DF8]   ">Visi</h2>
                        </div>
                    </div>
                </div>
                <p class="text-gray-700 prose  leading-relaxed">
                    {!!$visi->visi!!}
                </p>
            </div>

            <!-- Misi -->
            <div class="bg-white p-6 rounded-[1rem] text-center shadow-md border-2 border-[#36F700]">
                <div class="flex items-center justify-center mb-4  ">
                    <div class=" grid grid-flow-col grid-rows-2  mb-2">
                        <div class="rounded-full row-span-2 text-center flex bg-green-100 py-6 px-6">
                            <img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/goal.png" alt="goal"/>
                        </div>
                        <div class="col-span-2 row-span-1 "></div>
                        <div class="col-span-2 align-bottom mt-2 ">
                            <h2 class="text-xl   font-bold border px-3  text-[#36F700]  rounded-full border-[#36F700]   ">Misi</h2>
                        </div>
                    </div>
                </div>
                <p class="text-gray-700 leading-relaxed">
                    {!!$visi->misi!!}
                </p>
            </div>

        </div>
    </div>
    </body>
</x-layouts.app>
