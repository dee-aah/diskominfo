<x-layouts.app>
    <div class="max-w-6xl mx-auto mt-15 sm:py-12 sm:mt-15 md:mt-20">
        <div class="flex flex-col  lg:flex-row gap-5 items-start">
                <div class="w-full flex justify-center lg:w-1/2">
                    <img src="{{ asset('storage/default/layanan.jpg')}}" alt="Ilustrasi layanan"
                        class="w-full h-100 rounded card-shadow  object-cover" />
                </div>
            <!-- teks kanan -->
            <div class="w-full lg:w-1/2 flex flex-col justify-start">
                <h1 class="text-xl sm:text-2xl lg:text-3xl md:mx-4 text-center sm:text-justify font-extrabold leading-tight">
                    Layanan DPPKBP3A<br />
                    <span class="text-sky-700">Kota Tasikmalaya</span>
                </h1>

                <p class="m-4 text-sm sm:mt-3 text-justify text-slate-600 max-w-xl">
                    Akses Cepat Ke Layanan Prioritas Untuk Keluarga Berencana, Perlindungan Anak, Pemberdayaan Perempuan, serta Program Peluarga Sejahtera.
                </p>

                <!-- thumbnail kecil di bawah judul -->
                <div class=" m-3 sm:mt-4 md:mt-6 flex sm:gap-3 ">
                        <div class="  sm:gap-2">
                            <a>
                                <img src="{{ asset('storage/default/layanan1.jpg')}}" class="w-40 h-40 md:w-50 md:h-50 mx-auto px-2 sm:px-0 object-cover"
                                    alt="">
                            </a>
                            <p class="text-sm text-center pt-3 text-slate-600">Keluarga Berencana</p>
                        </div>
                        <div class="  sm:gap-2">
                            <a>
                                <img src="{{ asset('storage/default/layanan2.jpg')}}" class="w-40 h-40 md:w-50 md:h-50 mx-auto px-2 sm:px-0 object-cover"
                                    alt="">
                            </a>
                            <p class="text-sm text-center pt-3 text-slate-600">Perlindungan Anak</p>
                        </div>
                        <div class="  sm:gap-2">
                            <a>
                                <img src="{{ asset('storage/default/layanan3.jpg')}}" class="w-40 h-40 md:w-50 md:h-50 mx-auto px-2 sm:px-0 object-cover"
                                    alt="">
                            </a>
                            <p class="text-sm text-center pt-3 text-slate-600">Pemberdayaan Perempuan</p>
                        </div>
                    
                </div>
            </div>
        </div>
        <section class="mt-12 mx-w-6xl mx-auto">
            <h2 class="text-sky-700 font-semibold text-center md:text-justify text-xl">Program DPPKBP3A Kota Tasikmalaya</h2>
            <div class="mt-3 border mx-auto w-90 md:w-full border-gray-400"></div>
            @foreach ($layanans as $program => $layanan)
                <div class="my-8 flex items-start sm:gap-4 md:gap-6">
                    <div class="flex-shrink-0 p-4">
                        <div class="w-5 h-5 sm:w-8 sm:h-8 md:w-10 md:h-10 rounded-full bg-gray-200 flex items-center justify-center text-slate-700 font-semibold card-shadow">
                            {{ $loop->iteration }}
                        </div>
                    </div>
                    <div class="flex-1 ">
                        <h3 class="text-sm pt-4  sm:text-lg font-semibold">{{ $program }}</h3>
                        <div class="mt-6 grid grid-cols-1 sm:grid-cols-3 gap-5 ">
                            @foreach ($layanan as $detail)
                                <a href="{{ route('layanans.show', $detail->slug) }}" class="max-w-80 ">
                                    <div class="bg-gray-300 text-center overflow-hidden max-w-xl card-shadow">
                                        <div class="md:h-full md:w-full w-80 h-40 overflow-hidden">
                                            <img src="{{ asset('storage/layanan/' . $detail->img) }}"
                                                alt="{{ $detail->nama }}" class=" w-80 h-40 md:w-full md:h-50 object-top object-cover" />
                                        </div>
                                        <div class="px-3 py-3 hover:bg-gray-500 hover:text-white transition">
                                            <p class="text-sm  text-black text-center">{{ $detail->nama }}</p>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </section>
    </div>
</x-layouts.app>
