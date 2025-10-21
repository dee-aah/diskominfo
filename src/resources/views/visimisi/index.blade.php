<x-layouts.app>
    <section class=" relative h-80 sm:h-screen md:h-screen overflow-hidden pt-20 "> <!-- tambahkan pt-16 untuk kompensasi navbar -->
        <div>
            <img class="absolute brightness-50   sm:object-top left-0 w-full h-full object-cover object-top z-0 transform-translate-y-5"
                src="{{asset('storage/konten/' . $konten->img) }}" alt="">
        </div>
        <!-- Overlay -->
        <div class="absolute  bg-black bg-opacity-50 z-10"></div>
        <!-- Konten Hero -->
        <div class="relative z-20 flex items-center justify-center sm:min-h-screen text-center px-4 sm:pt-5 md:pt-5 pt-8 pb-8">
            <div class="text-white sm:max-w-2xl sm:mt-5 md:mt-5 mt-8 mx-auto">
                <h1 id="typewriter" class="text-lg sm:text-4xl font-bold leading-normal mb-4 text-white whitespace-nowrap">Visi dan Misi
                </h1>
                <p class="text-xs sm:text-lg md:text-lg sm:mb-6 mb-6">Dinas Pengendalian Penduduk, Keluarga Berencana, Pemberdayaan Perempuan, dan
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
                        <div class="rounded-full row-span-2 text-center flex bg-blue-100 p-5 sm:p-5 md:p-5 ">
                            <img width="30" style="color:blue; " height="30" src="https://img.icons8.com/ios-glyphs/30/visible--v1.png" alt="visible--v1" class="w-6 h-6 sm:w-7 sm:h-7 md:w-8 md:h-8"/>
                        </div>
                        <div class="col-span-2 row-span-1 "></div>
                        <div class="col-span-2 align-bottom  ">
                            <h2 class="text-lg sm:text-xl  font-bold border px-3  text-[#147df8]  rounded-full border-[#147DF8]   ">Visi</h2>
                        </div>
                    </div>
                </div>
                <div class="text-gray-700 font-medium prose text-xs sm:text-lg md:text-xl  leading-relaxed">
                    {!!$visi->visi!!}
                </div>
            </div>

            <!-- Misi -->
            <div class="bg-white p-6 rounded-[1rem] text-center shadow-md border-2 border-[#36F700]">
                <div class="flex items-center justify-center mb-4  ">
                    <div class=" grid grid-flow-col grid-rows-2  mb-2">
                        <div class="rounded-full row-span-2 text-center flex bg-green-100 p-5 sm:p-5 md:p-5">
                            <img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/goal.png" alt="goal" class="w-6 h-6 sm:w-7 sm:h-7 md:w-8 md:h-8"/>
                        </div>
                        <div class="col-span-2 row-span-1 "></div>
                        <div class="col-span-2 align-bottom  ">
                            <h2 class="text-lg  sm:text-xl font-bold border px-3  text-[#36F700]  rounded-full border-[#36F700]   ">Misi</h2>
                        </div>
                    </div>
                </div>
                <div class="text-gray-700 font-medium text-xs sm:text-lg md:text-xl leading-relaxed">
                    {!!$visi->misi!!}
                </div>
            </div>

        </div>
    </div>
</x-layouts.app>
