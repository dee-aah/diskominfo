<x-layouts.sidebar>
    <main>
        <div class="@container">
            <div class="max-w-3xl mx-auto ">
            <div class="flex justify-center items-center mb-4">
                <h3 class="text-3xl text-center font-bold">Tambah Artikel</h3>
            </div>
            <form action="{{ route('artikel.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="block text-lg font-medium">Judul</label>
                    <input type="text" name="judul" placeholder=" Masukkan Judul Artikel" class="w-full border bg-gray-100 border-sky-500 rounded p-2" required>
                </div>
                <div class="mb-3">
                    <label class="block text-lg font-medium">Isi</label>
                    <textarea name="isi" rows="3" placeholder=" Masukkan Isi Artikel" class="w-full border bg-gray-100 border-sky-500 rounded p-2" required></textarea>
                </div>
                <div class="mb-3">
                    <label class="block text-lg font-medium">Penulis</label>
                    <input type="text" name="penulis" placeholder=" Masukkan Nama Penulis" class="w-full bg-gray-100 border border-sky-500 rounded p-2" required>
                </div>
                <div class="mb-3">
                    <label class="block  text-lg font-medium">Tag</label>
                    <input type="text" name="tag" placeholder=" Masukkan Tag Artikel" class="w-full bg-gray-100 border-sky-500 border rounded p-2">
                </div>
                <div class="mb-3">
                    <label class="block text-lg font-medium">Gambar</label>
                    <input type="file" name="gambar" placeholder=" Pilih Gambar" class="w-full bg-gray-100 border-sky-500 border rounded p-2">
                </div>
                <div class="flex justify-end gap-2 mt-4">
                    <a href="{{route('artikel.dashboard')}}" type="button"
                        class="bg-gray-400 hover:bg-gray-500 text-white px-4 py-2 rounded">Batal</a>
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
    </main>
</x-layouts.sidebar>
