<x-layouts.app>
    <div class="max-w-6xl mx-auto px-6 py-12 mt-16">
        <div class="flex flex-col  lg:flex-row gap-8 items-start">
            <!-- gambar besar kiri -->
            @if (isset($layanann[0]))
                <div class="w-full flex justify-center lg:w-1/2">
                    <img src="{{ asset('storage/layanan/' . $layanann[0]->gambar) }}" alt="Ilustrasi layanan"
                        class="size-90 rounded card-shadow  object-cover" />
                </div>
            @endif
            <!-- teks kanan -->
            <div class="w-full lg:w-1/2 flex flex-col justify-start">
                <h1 class="text-2xl lg:text-3xl font-extrabold leading-tight">
                    Layanan DPPKBP3A<br />
                    <span class="text-sky-700">Kota Tasikmalaya</span>
                </h1>

                <p class="mt-3 text-slate-600 max-w-xl">
                    Akses Cepat Ke Layanan Prioritas Untuk Keluarga Berencana, Perlindungan Anak,
                    Pemberdayaan Perempuan, serta Program Peluarga Sejahtera.
                </p>

                <!-- thumbnail kecil di bawah judul -->
                <div class="mt-6 flex gap-4 items-center">
                    @foreach ($layananlain as $item)
                        <div class="items-center gap-3">
                            <a>
                                <img src="{{ asset('storage/layanan/' . $item->gambar) }}" class="size-50"
                                    alt="{{ $item->nama }}"></a>
                            <span class="text-sm text-center text-slate-600">{{ $item->nama }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <section class="mt-12">
            <h2 class="text-sky-700 font-semibold text-xl">Program DPPKBP3A Kota Tasikmalaya</h2>
            <div class="mt-3 border border-gray-400"></div>
            @foreach ($layanans as $program => $layanan)
                <div class="mt-8 flex items-start gap-6">
                    <div class="flex-shrink-0">
                        <div
                            class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center text-slate-700 font-semibold card-shadow">
                            {{ $loop->iteration }}
                        </div>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-lg font-semibold">{{ $program }}</h3>
                        <div class="mt-6 grid grid-cols-1 sm:grid-cols-3 gap-5">
                            @foreach ($layanan as $detail)
                                <a href="{{ route('layanans.show', $detail->slug) }}">
                                    <div class="bg-gray-300 text-center overflow-hidden card-shadow">
                                        <div class="h-40 w-full overflow-hidden">
                                            <img src="{{ asset('storage/layanan/' . $detail->gambar) }}"
                                                alt="{{ $detail->nama }}" class="w-full h-full object-cover" />
                                        </div>
                                        <div class="px-3 py-3 hover:bg-[#476A9A] hover:text-white transition">
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
