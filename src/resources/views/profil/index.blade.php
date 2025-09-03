<x-layouts.app>
    <main>
        <section class="relative h-screen overflow-hidden pt-20"> <!-- tambahkan pt-16 untuk kompensasi navbar -->
            <div><img class="absolute brightness-25 top-0 left-0 w-full h-full object-cover object-top z-0 transform -translate-y-5"
                    src="{{asset('storage/profil_cont/'. $profil_cont->gambar)}}" alt="">
            </div>
            <!-- Overlay -->
            <div class="absolute  bg-black bg-opacity-50 z-10"></div>
            <!-- Konten Hero -->
            <div class="relative z-20 flex items-center justify-center min-h-screen text-center px-4 pt-8 pb-8">
                <div class="text-white max-w-2xl">
                    <h1 id="typewriter"
                        class="text-4xl md:text-5xl font-bold leading-normal mb-4 text-white whitespace-nowrap ">Profil
                        Pimpinan</h1>

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
        <div class="bg-white mx-auto max-w-5xl justify-center">
            <h2 class="text-center text-lg font-semibold text-gray-800 mb-2">
                Profil Pimpinan
            </h2>
            <div class="border-b-2 border-blue-500 w-24 mx-auto mt-3 mb-4"></div>
            <p class="text-center text-sm text-gray-600 mb-8">
                {{$profil_cont->deskripsi}}
            </p>
            <div>
                <div class="bg-white p-8 flex flex-col items-center ">
                    <!-- Kepala Dinas -->
                    @if ($profils)
                    <div class="w-72 mb-10 ">
                        <div class="frame rounded">
                            <img src="{{ asset('storage/profil/' . $profils->gambar) }}" alt="Kepala Dinas">
                        </div>
                        <p class="text-center font-bold mt-2">{{$profils->nama}}</p>
                        <p class="text-center text-sm">{{$profils->jabatan}}</p>
                    </div>
                    @endif
                    <!-- Sekretaris -->
                    <div class="grid grid-cols-3 gap-8 ">
                        @foreach ($profil as $item )
                        <div class="w-60 ">
                            <div class="frame rounded">
                                <img src="{{asset('storage/profil/'. $item->gambar)}}" alt="Sekretaris" class="h-60 w-40">
                            </div>
                            <p class="text-center font-bold mt-2">{{$item->nama}}</p>
                            <p class="text-center text-sm">{{$item->jabatan}}</p>
                        </div>
                        @endforeach
                    </div>
                </div>
    </main>
</x-layouts.app>
