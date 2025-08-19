<x-layouts.sidebar>
    <main>
            <div class="max-w-3xl mx-auto">
                <div class="flex justify-center items-center mb-4">
                    <h3 class="text-3xl text-center font-bold">Edit Data Visi & Misi</h3>
                </div>
                <form action="{{ route('visi.update', $visi->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="block text-lg font-medium">Deskripsi Visi</label>
                        <textarea name="visi"  rows="5"
                            placeholder="Masukkan Deskripsi Visi"
                            class="w-full border bg-gray-100 border-gray-400 rounded p-2" required>{{ old('visi', $visi->visi) }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="block text-lg font-medium">Deskripsi Misi</label>
                        <textarea name="misi"  rows="5"
                            placeholder="Masukkan Deskripsi Misi"
                            class="w-full border bg-gray-100 border-gray-400 rounded p-2" required>{{ old('misi', $visi->misi) }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="block text-lg font-medium">Deskripsi Singkat</label>
                        <textarea name="des_singkat" rows="5"
                            placeholder="Masukkan Deskripsi Singkat"
                            class="w-full border bg-gray-100 border-gray-400 rounded p-2" required>{{ old('des_singkat', $visi->des_singkat) }}</textarea>
                    </div>
                    <div class="mb-3">
                        <input  type="file" name="gambar"
                            class="w-full p-2 justify-end file:mr-4 file:rounded-3xl file:border-0 file:bg-violet-50
                            file:px-4 file:py-2 file:text-sm  file:font-semibold file:text-blue-600 hover:file:bg-violet-100 dark:file:bg-blue-600 dark:file:text-violet-100 dark:hover:file:bg-violet-400 ..." />
                        @if ($visi->gambar)
                            <p class="mt-2 text-sm text-gray-500">Gambar saat ini:</p>
                            <img src="{{ asset('storage/visi/' . $visi->gambar) }}" class="w-32 mt-1 rounded">
                        @endif
                    </div>
                    <div class="flex justify-end gap-2 ">
                        <a href="{{ route('visi.dashboard') }}"
                            class="bg-gray-500 hover:bg-gray-400 text-white px-4 py-2 rounded">Batal</a>
                        <button type="submit"
                            class="bg-blue-700 hover:bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
                    </div>
                </form>
            </div>
    </main>
</x-layouts.sidebar>
