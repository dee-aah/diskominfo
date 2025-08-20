<x-layouts.sidebar>
    <main>
        <div class="@container">
            <div class="max-w-4xl mx-auto ">
                <div class="flex justify-center items-center mb-4">
                    <h3 class="text-3xl text-center font-bold">Tambah Artikel</h3>
                </div>
                <form action="{{ route('artikell.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="block text-lg font-medium">Judul Artikel</label>
                        <input type="text" name="judul" placeholder=" Masukkan Judul Artikel"
                            class="w-full border bg-gray-100 border-gray-400 rounded p-2" required>
                    </div>
                    <div class="mb-3">
                        <label class="block text-lg font-medium">Deskripsi</label>
                        <textarea name="deskripsi" rows="10" placeholder=" Masukkan Deskripsi Artikel"
                            class="w-full border bg-gray-100 border-gray-400 rounded p-2" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="block text-lg font-medium">Penulis</label>
                        <input type="text" name="penulis" placeholder=" Masukkan Nama Penulis"
                            class="w-full bg-gray-100 border border-gray-400 rounded p-2" required>
                    </div>
                    <div class="mb-3">
                        <label class="block text-base font-medium">Kategori</label>
                        <select name="kategori_id" class="w-full bg-gray-100 border-gray-400 border rounded p-2"
                            required>
                            <option value="">-- Pilih Kategori --</option>
                            @foreach ($kategoris as $kategori)
                                <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="block  text-lg font-medium">Tag</label>
                        <input type="text" name="tag" placeholder=" Masukkan Tag Artikel"
                            class="w-full bg-gray-100 border-gray-400 border rounded p-2" required>
                        <small class="text-gray-500">Pisahkan Tag Dengan Koma (',').</small>
                    </div>
                    <div class="mb-3 mt-2">
                        <input required type="file" name="gambar"
                            class="w-full p-2 justify-end file:mr-4 file:rounded-3xl file:border-0 file:bg-violet-50
                            file:px-4 file:py-2 file:text-sm  file:font-semibold file:text-blue-600 hover:file:bg-violet-100 dark:file:bg-blue-600 dark:file:text-violet-100 dark:hover:file:bg-violet-400 ..." />
                    </div>
                    <div class="flex justify-end gap-2 mt-4">
                        <a href="{{ route('artikell.dashboard') }}" type="button"
                            class="bg-gray-500 hover:bg-gray-500 text-white px-4 py-2 rounded">Batal</a>
                        <button type="submit" class="bg-blue-700 hover:bg-blue-600 text-white px-4 py-2 rounded">Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</x-layouts.sidebar>
