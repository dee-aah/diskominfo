<x-layouts.app>
    <div class="max-w-6xl mx-auto mt-20 p-5">
        {{-- Breadcrumb --}}
        <nav class="sm:text-sm text-xs  mb-4 text-gray-500">
            <a href="{{ url('/beranda') }}" class="hover:underline">Beranda</a> >
            <a href="{{ url('/layanans') }}" class="hover:underline">Layanan</a> >
            <span class="text-gray-700">{{ $layanan->nama }}</span>
        </nav>

        {{-- Gambar utama + judul --}}
        <div class="relative">
            <img src="{{ asset('storage/layanan/' . $layanan->img) }}"
                class="md:w-300 md:h-130 sm:w-150 sm:h-75 h-55 w-100 brightness-70 object-cover object-top rounded-lg">
            <div class="absolute py-6 flex flex-col inset-x-0 bottom-0 h-15 sm:h-25 md:h-30 justify-center  bg-black/40 text-center ">
                <h2 class="text-white text-sm sm:text-1xl md:text-2xl font-bold">{{ $layanan->nama }}</h2>
                <div class="text-white prose text-xs sm:text-lg sm:mt-2">{!! $layanan->deskripsi_singkat !!}</div>
            </div>
        </div>
        <div class="mt-6  text-sm sm:text-xl prose font-semibold text-justify text-gray-600">{!! $layanan->deskripsi !!}</div>

        {{-- Detail layanan --}}
        <div class="my-8 grid grid-cols-2 md:gap-12 sm:gap-8 gap-3">
            @foreach ($layanan->layanan_details as $detail)
                <div class="bg-gray-200 shadow justify-center rounded-lg overflow-hidden">
                    <img src="{{ asset('storage/layanan_detail/' . $detail->img) }}"
                        class="md:size-80 md:w-full sixe-40 h-40 object-cover">
                    {{-- Teks tujuan --}}
                    <div class="md:mx-6 py-6 font-normal">
                        <h3 class="font-semibold text-sm sm:text-lg md:text-xl text-center p-3 text-gray-800">{{ $detail->jenis }}</h3>
                        <div class=" prose text-xs sm:text-base md:text-lg ">
                            {!!$detail->deskripsi!!}
                        </div>
                    </div>
                </div>
            @endforeach
            {{-- <div class="bg-gray-200 rounded shadow">
                <img src="{{ asset('storage/layanan_detail/layanan5.jpg') }}" alt="Syarat & Alur Layanan"
                    class="w-full h-80 object-cover rounded-t">
                <div class="ml-4 py-6">
                    <h3 class="font-semibold text-[18px] text-center p-3 text-gray-800">Kontak Layanan</h3>
                    <ol class="list-none text-[14px] pl-4 space-y-1">
                        <li class="flex"><img width="20" height="20" class="mr-4 flex"
                                src="https://img.icons8.com/fluency/48/phone.png" alt="phone" /> 08234567890</li>
                        <li class="flex"><img width="20" height="20" class="mr-4 flex"
                                src="https://img.icons8.com/fluency/48/gmail-new.png" alt="gmail-new" />
                            dppkbp3atasikmalayakota.go.id</li>
                    </ol>
                </div>
            </div> --}}
        </div>
</x-layouts.app>
