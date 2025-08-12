<x-layouts.app>
    <main class="mx-auto max-w-6xl">
        {{-- Judul Section --}}
        <div class="max-w-6xl mx-auto mt-30">
            <h1 class="text-[30px] font-semibold  py-3 ">Artikel</h1>
            <hr class="w-full border-t-2 border-gray-400 mb-4">
            <div class="grid grid-cols-3 grid-rows-2 py-8 h-[600px] gap-2">
                <!-- Gambar 1 -->
                @if (isset($artikelpopuler[0]))
                    <div class="relative col-span-1 row-span-1">
                        <a href="{{ route('artikel.show', $artikelpopuler[0]->slug) }}">
                            <img src="{{ asset('storage/artikel/' . $artikelpopuler[0]->gambar) }}"
                                class="w-full h-full object-cover">
                        </a>
                        <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-40 text-white p-3 rounded-b-lg">
                            <h3 class="text-sm font-semibold">
                                {{ $artikelpopuler[0]->kategori->nama ?? 'Tanpa Kategori' }}</h3>
                            <p class="text-xs">{{ $artikelpopuler[0]->created_at->format('d F Y') }}</p>
                        </div>
                    </div>
                @endif
                <!-- Gambar 2 -->
                @if (isset($artikelpopuler[1]))
                    <div class="relative col-span-1 row-span-1">
                        <a href="{{ route('artikel.show', $artikelpopuler[1]->slug) }}">
                            <img src="{{ asset('storage/artikel/' . $artikelpopuler[1]->gambar) }}"
                                class="w-full h-full object-cover">
                        </a>
                        <div
                            class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-40 text-white p-3 rounded-b-lg">
                            <h3 class="text-sm font-semibold">{{ $artikelpopuler[1]->judul }}</h3>
                            <p class="text-xs">{{ $artikelpopuler[1]->created_at->format('d F Y') }}</p>
                        </div>
                    </div>
                @endif
                <!-- Gambar 4 (tinggi di kanan) -->
                @if (isset($artikelpopuler[2]))
                    <div class="relative col-span-1 row-span-2">
                        <a href="{{ route('artikel.show', $artikelpopuler[2]->slug) }}">
                            <img src="{{ asset('storage/artikel/' . $artikelpopuler[2]->gambar) }}"
                                class="w-full h-full object-cover">
                        </a>
                        <div
                            class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-40 text-white p-3 rounded-b-lg">
                            <h3 class="text-sm font-semibold">{{ $artikelpopuler[2]->judul }}</h3>
                            <p class="text-xs">{{ $artikelpopuler[2]->created_at->format('d F Y') }}</p>
                        </div>
                    </div>
                @endif
                <!-- Gambar 3 (lebar di bawah) -->
                @if (isset($artikelpopuler[3]))
                    <div class="relative col-span-2 row-span-1">
                        <a href="{{ route('artikel.show', $artikelpopuler[3]->slug) }}">
                            <img src="{{ asset('storage/artikel/' . $artikelpopuler[3]->gambar) }}"
                                class="w-full h-full object-cover">
                        </a>
                        <div
                            class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-40 text-white p-3 rounded-b-lg">
                            <h3 class="text-sm font-semibold">{{ $artikelpopuler[3]->judul }}</h3>
                            <p class="text-xs">{{ $artikelpopuler[3]->created_at->format('d F Y') }}</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        <div id="articleGrid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 my-6 gap-3">

    @foreach ($artikellain as $artikel )
      <div class="article-item bg-white rounded-lg shadow overflow-hidden">
        <a href="{{ route('artikel.show', $artikel->slug) }}">
        <img src="{{ asset('storage/artikel/' . $artikel->gambar) }}" alt="{{ $artikel->judul }}"
                    class="rounded w-full h-auto object-cover">
        </a>
        <div class="p-4">
          <a href="{{route('artikel.show',$artikel->slug)}}"><h2 class="font-semibold text-[20px] mb-1"> {{ $artikel->judul }}</h2></a>
            <div class="flex justify-between mt-6 mb-2">
                <p class="text-gray-500 text-sm"><span>{{ $artikel->kategori->nama }}</span></p>
                <p class="text-gray-500 text-sm"><span>{{ $artikel->created_at->locale('id')->diffForHumans() }}</span></p>
            </div>

        </div>
      </div>@endforeach
        </div>
    </main>
</x-layouts.app>
