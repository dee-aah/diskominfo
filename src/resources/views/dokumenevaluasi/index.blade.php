<x-layouts.app>
    <section class=" relative h-80 sm:h-screen md:h-screen overflow-hidden pt-20 ">
        <!-- tambahkan pt-16 untuk kompensasi navbar -->
        <div>
            <img class="absolute brightness-50   sm:object-top left-0 w-full h-full object-cover object-top z-0 transform-translate-y-5"
                src="{{ asset('storage/konten/' . $konten->img) }}" alt="">
        </div>
        <!-- Overlay -->
        <div class="absolute  bg-black bg-opacity-50 z-10"></div>
        <!-- Konten Hero -->
        <div
            class="relative z-20 flex items-center justify-center sm:min-h-screen text-center px-4 sm:pt-5 md:pt-5 pt-8 pb-8">
            <div class="text-white sm:max-w-2xl sm:mt-5 md:mt-5 mt-8 mx-auto">
                <h1 id="typewriter"
                    class="text-lg sm:text-5xl font-bold leading-normal mb-4 text-white whitespace-nowrap">Dokumen Evaluasi
                </h1>
                <p class="text-xs sm:text-lg md:text-lg sm:mb-6 mb-6">Dinas Pengendalian Penduduk, Keluarga Berencana,
                    Pemberdayaan Perempuan, dan
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
    <section class="bg-white text-center max-w-6xl mx-auto py-8 sm:mt-10">
        {{-- <h2 class="text-2xl text-center font-bold text-black pb-3">
                Dokumen Evaluasi
        </h2>
        <h4 class="text-center mx-auto max-w-5xl prose font-medium text-black mb-10">
            {!!$evaluasi_cont->deskripsi_singkat!!}
        </h4> --}}
        <div class="grid grid-cols-2 p-5 sm:my-5 md:grid-cols-4 gap-4 sm:gap-6 md:gap-8">
            <!-- Rencana Strategis -->
            @foreach ($evaluasi as $item)
            <a href="{{$item->link}}" target="_blank" class="group">
                <img src="{{ asset('storage/perencanaan/' . $item->img_pdf) }}" alt="Rencana Strategis"
                    class="rounded shadow-lg transform w-4/5 mx-auto group-hover:scale-105 transition duration-300">
                <p class="mt-2 text-center text-sm sm:text-base font-semibold">{{$item->nama}}</p>
            </a>
            @endforeach
        </div>
    </section>
</x-layouts.app>
