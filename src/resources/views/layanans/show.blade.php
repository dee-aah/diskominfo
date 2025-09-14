<x-layouts.app>
    <div class="max-w-6xl mx-auto mt-20 p-4">
        {{-- Breadcrumb --}}
        <nav class="text-[13px] mb-4 text-gray-500">
            <a href="{{ url('/beranda') }}" class="hover:underline">Beranda</a> >
            <a href="{{ url('/layanans') }}" class="hover:underline">Layanan</a> >
            <span class="text-gray-700">{{ $layanan->nama }}</span>
        </nav>

        {{-- Gambar utama + judul --}}
        <div class="relative">
            <img src="{{ asset('storage/layanan/' . $layanan->gambar) }}"
                class="w-300 h-150 brightness-70 object-cover rounded-lg">
            <div class="absolute py-6 flex flex-col inset-x-0 bottom-0 h-35 justify-center  bg-black/40 text-center ">
                <h2 class="text-white text-[35px] font-bold">{{ $layanan->nama }}</h2>
                <p class="text-white text-lg mt-2">{{ $layanan->des_singkat }}</p>
            </div>
        </div>
        <p class="mt-4 py-6 text-[16px] font-semibold text-justify text-gray-600">{{ $layanan->deskripsi }}</p>

        {{-- Konten utama --}}
        <div class="mt-6 prose max-w-none">
            {!! $layanan->isi !!}
        </div>

        {{-- Detail layanan --}}
        <div class="my-8 grid md:grid-cols-2 gap-12">
            @foreach ($layanan->layanan_details as $detail)
                <div class="bg-gray-200 shadow justify-center rounded-lg overflow-hidden">
                    <img src="{{ asset('storage/layanan_detail/' . $detail->gambar) }}"
                        class="size-80 w-full object-cover">
                    {{-- Teks tujuan --}}
                    <div class="mx-6 py-6 text-[14px] font-normal">
                        <h3 class="font-semibold text-[18px] text-center p-3 text-gray-800">{{ $detail->jenis }}</h3>
                        <p class="list-decimal  prose text-[12px] ml-6">
                            {!!$detail->deskripsi!!}
                        </p>
                        <style>
                            ul { list-style-type: disc; padding-left: 1.5rem; margin-bottom: 0.5rem; }
                            ol { list-style-type: decimal; padding-left: 1.5rem; margin-bottom: 0.5rem; }
                        </style>
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
