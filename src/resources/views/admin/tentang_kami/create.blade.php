<x-layouts.sidebar>
    <main>
        <div class="@container">
            <div class="max-w-3xl mx-auto ">
                <div class="flex justify-center items-center mb-4">
                    <h3 class="text-3xl text-center font-bold">Tambah Tentang Kami</h3>
                </div>
                <form action="{{ route('tentang_kami.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="block text-lg font-medium">Deskripsi Singkat</label>
                        <textarea id="editor" name="des_singkat" rows="3" placeholder=" Masukkan Deskripsi Singkat"
                            class="w-full border bg-gray-100 border-gray-400 rounded p-2" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="block text-lg font-medium">Deskripsi</label>
                        <textarea id="editor" name="deskripsi" rows="5" placeholder=" Masukkan Deskripsi"
                            class="w-full border bg-gray-100 border-gray-400 rounded p-2" required></textarea>
                    </div>
                    <div class="flex ">
                    <div class="mb-3 mt-2">
                        <label class="block text-lg font-medium">Gambar Latar</label>
                        <input required type="file" name="gambar"
                            class="w-full p-2 justify-end file:mr-4 file:rounded-3xl file:border-0 file:bg-violet-50
                            file:px-4 file:py-2 file:text-sm  file:font-semibold file:text-blue-600 hover:file:bg-violet-100 dark:file:bg-blue-600 dark:file:text-violet-100 dark:hover:file:bg-violet-400 ..." />
                    </div>
                    <div class="mb-3 mt-2">
                        <label class="block text-lg font-medium">Gambar Konten</label>
                        <input required type="file" name="gambar_cont"
                            class="w-full p-2 justify-end file:mr-4 file:rounded-3xl file:border-0 file:bg-violet-50
                            file:px-4 file:py-2 file:text-sm  file:font-semibold file:text-blue-600 hover:file:bg-violet-100 dark:file:bg-blue-600 dark:file:text-violet-100 dark:hover:file:bg-violet-400 ..." />
                    </div>
                    </div>
                    <div class="flex justify-end gap-2 mt-4">
                        <a href="{{ route('tentang_kami.dashboard') }}" type="button"
                            class="bg-gray-400 hover:bg-gray-500 text-white px-4 py-2 rounded">Batal</a>
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
</x-layouts.sidebar>
