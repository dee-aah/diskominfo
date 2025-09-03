<x-layouts.app>
    <section class="relative h-screen overflow-hidden pt-16"> <!-- tambahkan pt-16 untuk kompensasi navbar -->
        <div><img class="absolute top-0 left-0 w-full h-full object-cover object-top z-0 transform -translate-y-5"
                src="gambar/bg2.jpg" alt="">
        </div>

        <!-- Overlay -->
        <div class="absolute inset-0 bg-black bg-opacity-50 z-10"></div>

        <!-- Konten Hero -->
        <div class="relative z-20 flex items-center justify-center min-h-screen text-center px-4 pt-8 pb-8">
            <div class="text-white max-w-2xl">
                <h1 id="typewriter"
                    class="text-4xl md:text-5xl font-bold leading-normal mb-4 text-white whitespace-nowrap">Dokumen
                    Perencanaan</h1>

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


    <section class="max-w-5xl mx-auto py-10">
        <h1 class="text-2xl font-bold mb-2 text-center">Dokumen Perencanaan</h1>
        <div class="border-b-2 border-blue-500 w-24 mx-auto mt-3 mb-4"></div>
        <p class="text-gray-600 mb-8 text-center">
            Dokumen strategis yang menjadi pedoman pelaksanaan program dan kegiatan DPPKBP3A Kota Tasikmalaya
        </p>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-8">

            <!-- Rencana Strategis -->
            <a href="https://drive.google.com/file/d/ID_FILE1/preview" target="_blank" class="group">
                <img src="{{asset('storage/default/dok.png')}}" alt="Rencana Strategis"
                    class="rounded shadow-lg transform group-hover:scale-105 transition duration-300">
                <p class="mt-2 text-justify font-semibold">Rencana Strategis</p>
            </a>

            <!-- Rencana Kerja -->
            <a href="https://drive.google.com/file/d/ID_FILE2/preview" target="_blank" class="group">
                <img src="{{asset('storage/default/dok.png')}}" alt="Rencana Kerja"
                    class="rounded shadow-lg transform group-hover:scale-105 transition duration-300">
                <p class="mt-2 text-justify font-semibold">Rencana Kerja</p>
            </a>

            <!-- Rencana Strategis 2 -->
            <a href="https://drive.google.com/file/d/ID_FILE3/preview" target="_blank" class="group">
                <img src="{{asset('storage/default/dok.png')}}" alt="Rencana Strategis"
                    class="rounded shadow-lg transform group-hover:scale-105 transition duration-300">
                <p class="mt-2 text-justify font-semibold">Rencana Strategis</p>
            </a>

            <!-- Rencana Kerja 2 -->
            <a href="https://drive.google.com/file/d/ID_FILE4/preview" target="_blank" class="group">
                <img src="{{asset('storage/default/dok.png')}}" alt="Rencana Kerja"
                    class="rounded shadow-lg transform group-hover:scale-105 transition duration-300">
                <p class="mt-2 text-justify font-semibold">Rencana Kerja</p>
            </a>

        </div>
    </section>
</x-layouts.app>
