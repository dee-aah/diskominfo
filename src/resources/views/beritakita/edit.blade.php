<x-layouts.sidebar>
    <main>
        <div class="@container">
            <div class="max-w-3xl mx-auto">
                <div class="flex justify-center items-center mb-4">
                    <h3 class="text-3xl text-center font-bold">Edit Artikel</h3>
                </div>
                <form action="{{ route('beritakita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="block text-lg font-medium">Judul Berita</label>
                        <input type="text" name="judul" value="{{ old('judul', $berita->judul) }}"
                            placeholder="Masukkan Judul Berita"
                            class="w-full border bg-gray-100 border-sky-500 rounded p-2" required>
                    </div>

                    <div class="mb-3">
                        <label class="block text-lg font-medium">Deskripsi</label>
                        <textarea name="deskripsi" rows="12"
                            placeholder="Masukkan Deskripsi Berita"
                            class="w-full border bg-gray-100 border-sky-500 rounded p-2" required>{{ old('deskripsi', $berita->deskripsi) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="block text-lg font-medium">Penulis</label>
                        <input type="text" name="penulis" value="{{ old('penulis', $berita->penulis) }}"
                            placeholder="Masukkan Nama Penulis"
                            class="w-full bg-gray-100 border border-sky-500 rounded p-2" required>
                    </div>
                    <div class="mb-3">
                        <label class="block text-lg font-medium">Waktu Kegiatan</label>
                        <input type="date" name="waktu" value="{{ old('waktu', $berita->waktu) }}"
                            placeholder="Masukkan Waktu Kegiatan"
                            class="w-full bg-gray-100 border-sky-500 border rounded p-2">
                    </div>
                    <div class="mb-3">
                        <label class="block text-lg font-medium">Slug</label>
                        <input type="text" name="slug" value="{{ old('slug', $berita->slug) }}"
                            placeholder="Masukkan Slug Tanpa Spasi"
                            class="w-full bg-gray-100 border-sky-500 border rounded p-2">
                    </div>
                    <div class="mb-3">
                        <label class="block text-lg font-medium">Tag</label>
                        <input type="text" name="tag" value="{{ old('tag', $berita->tag) }}"
                            placeholder="Masukkan Tag Berita"
                            class="w-full bg-gray-100 border-sky-500 border rounded p-2">
                    </div>
                    <div class="mb-3">
                        <label class="block text-base font-medium">Kategori</label>
                        <select name="kategori_id" class="w-full bg-gray-100 border-sky-500 border rounded p-2"
                            required>
                            <option value="">-- Pilih Kategori --</option>
                            @foreach ($kategoris as $kategori)
                                <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                            @endforeach
                        </select>
                    <div class="mb-3">
                        <label class="block text-lg font-medium">Gambar</label>
                        <input type="file" name="gambar"
                            class="w-full bg-gray-100 border-sky-500 border rounded p-2">
                        @if ($berita->gambar)
                            <p class="mt-2 text-sm text-gray-500">Gambar saat ini:</p>
                            <img src="{{ asset('storage/berita/' . $berita->gambar) }}" class="w-32 mt-1 rounded">
                        @endif
                    </div>

                    <div class="flex justify-end gap-2 mt-4">
                        <a href="{{ route('beritakita.dashboard') }}"
                            class="bg-gray-400 hover:bg-gray-500 text-white px-4 py-2 rounded">Batal</a>
                        <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</x-layouts.sidebar>
