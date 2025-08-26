<x-layouts.sidebar>
    <main>
            <div class="max-w-3xl mx-auto">
                <div class="flex justify-center items-center mb-4">
                    <h3 class="text-3xl text-center font-bold">Edit Conten Produk Hukum</h3>
                </div>
                <form action="{{ route('produk_hukum_cont.update', $produk->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="block text-lg font-medium">Deskripsi </label>
                        <textarea name="deskripsi" rows="5"
                            placeholder="Masukkan Deskripsi"
                            class="w-full border bg-gray-100 border-gray-400 border-2 rounded p-2" required>{{ old('deskripsi', $produk->deskripsi) }}</textarea>
                    </div>
                    <div class="flex ">
                        <div class="mb-3">
                            <label class="block text-lg font-medium">Gambar Konten </label>
                        <input  type="file" name="img_cont"
                            class="w-full p-2 justify-end file:mr-4 file:rounded-3xl file:border-0 file:bg-violet-50
                            file:px-4 file:py-2 file:text-sm  file:font-semibold file:text-blue-600 hover:file:bg-violet-100 dark:file:bg-blue-600 dark:file:text-violet-100 dark:hover:file:bg-violet-400 ..." />
                        @if ($produk->img_cont)
                            <p class="mt-2 text-sm text-gray-500">Gambar saat ini:</p>
                            <img src="{{ asset('storage/produkimg/' . $produk->img_cont) }}" class="w-32 mt-1  rounded">
                        @endif
                    </div>
                    <div class="mb-3">
                        <label class="block text-lg font-medium">Gambar PDF</label>
                        <input  type="file" name="img_pdf"
                            class="w-full p-2 justify-end file:mr-4 file:rounded-3xl file:border-0 file:bg-violet-50
                            file:px-4 file:py-2 file:text-sm  file:font-semibold file:text-blue-600 hover:file:bg-violet-100 dark:file:bg-blue-600 dark:file:text-violet-100 dark:hover:file:bg-violet-400 ..." />
                        @if ($produk->img_pdf)
                            <p class="mt-2 text-sm text-gray-500">Gambar saat ini:</p>
                            <img src="{{ asset('storage/produkimg/' . $produk->img_pdf) }}" class="w-32 mt-1 rounded">
                        @endif
                    </div>
                    </div>

                    <div class="flex justify-end gap-2 mt-4">
                        <a href="{{ route('produk_hukum_cont.dashboard') }}"
                            class="bg-gray-400 hover:bg-gray-500 text-white px-4 py-2 rounded">Batal</a>
                        <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Simpan</button>
                    </div>
                </form>
            </div>
    </main>
</x-layouts.sidebar>
