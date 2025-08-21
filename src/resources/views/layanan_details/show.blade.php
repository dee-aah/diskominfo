<x-layouts.app>
    <div class="max-w-5xl mx-auto mt-20 p-4">
        {{-- Breadcrumb --}}
        <nav class="text-[13px] mb-4 text-gray-500">
            <a href="{{ url('/beranda') }}" class="hover:underline">Beranda</a> >
            <a href="{{ url('/layanans') }}" class="hover:underline">Layanan</a> >
            <span class="text-gray-700">{{ $layanan->nama }}</span>
        </nav>

        {{-- Gambar utama + judul --}}
        <div class="relative">
            <img src="{{ asset('storage/layanan/' . $layanan->gambar) }}" class="w-300 h-150 brightness-70 object-cover rounded-lg">
            <div class="absolute py-6 flex flex-col inset-x-0 bottom-0 h-35 justify-center  bg-black/40 text-center ">
        <h2 class="text-white text-[50px] font-bold">{{ $layanan->nama }}</h2>
        <p class="text-white text-lg mt-2">{{ $layanan->des_singkat }}</p>
            </div>
        </div>
        <p class="mt-4 py-6 text-[20px] font-semibold text-justify text-gray-600">{{ $layanan->deskripsi }}</p>

        {{-- Konten utama --}}
        <div class="mt-6 prose max-w-none">
            {!! $layanan->isi !!}
        </div>

        {{-- Detail layanan --}}
        <div class="mt-8 grid md:grid-cols-2 gap-6">
           @foreach ($layanan->layanan_details as $detail)
    <div class="bg-white shadow justify-center rounded-lg overflow-hidden">
        <img src="{{ asset('storage/layanan_detail/' . $detail->gambar) }}" class="size-80 w-full object-cover">

        {{-- Teks tujuan --}}
        <div class="ml-4 py-6">
            <h3 class="font-semibold text-[18px] text-center p-3 text-gray-800">{{ $detail->jenis }}</h3>
            <ol class="list-decimal text-[14px] pl-4">
                @foreach([$detail->isi_1, $detail->isi_2, $detail->isi_3, $detail->isi_4, $detail->isi_5] as $isi)
                    @if(!empty($isi))
                        <li>{{ $isi }}</li>
                    @endif
                @endforeach
            </ol>
        </div>
    </div>
@endforeach

        </div>
    </div>
</x-layouts.app>
