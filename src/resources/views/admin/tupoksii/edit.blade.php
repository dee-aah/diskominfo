<x-layouts.sidebar>
    <main>
            <div class="max-w-3xl mx-auto">
                <div class="flex justify-center items-center mb-4">
                    <h3 class="text-3xl text-center font-bold">Edit Tupoksi</h3>
                </div>
                <form action="{{ route('tupoksii.update', $tupoksi->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="block text-lg font-medium">Deskripsi Singkat</label>
                        <textarea name="des_singkat" rows="5"
                            placeholder="Masukkan Deskripsi Program"
                            class="w-full border bg-gray-100 border-gray-400 border-2 rounded p-2" required>{{ old('des_singkat', $tupoksi->des_singkat) }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="block text-lg font-medium">Tugas Utama</label>
                        <textarea name="tugas_utama" rows="3"
                            placeholder="Masukkan Tugas Utama"
                            class="w-full border bg-gray-100 border-gray-400 border-2 rounded p-2" required>{{ old('tugas_utama', $tupoksi->tugas_utama) }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="block text-lg font-medium">Fungsi Utama</label>
                        <textarea name="fungsi_utama" rows="3"
                            placeholder="Masukkan Fungsi Utama"
                            class="w-full border bg-gray-100 border-gray-400 border-2 rounded p-2" required>{{ old('fungsi_utama', $tupoksi->fungsi_utama) }}</textarea>
                    </div>
                    <div class="mb-3">
                        <input  type="file" name="gambar"
                            class="w-full p-2 justify-end file:mr-4 file:rounded-3xl file:border-0 file:bg-violet-50
                            file:px-4 file:py-2 file:text-sm  file:font-semibold file:text-blue-600 hover:file:bg-violet-100 dark:file:bg-blue-600 dark:file:text-violet-100 dark:hover:file:bg-violet-400 ..." />
                        @if ($tupoksi->gambar)
                            <p class="mt-2 text-sm text-gray-500">Gambar saat ini:</p>
                            <img src="{{ asset('storage/tupoksi/' . $tupoksi->gambar) }}" class="w-32 mt-1 rounded">
                        @endif
                    </div>
                    <div class="flex justify-end gap-2 mt-4">
                        <a href="{{ route('tupoksii.dashboard') }}"
                            class="bg-gray-400 hover:bg-gray-500 text-white px-4 py-2 rounded">Batal</a>
                        <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Simpan</button>
                    </div>
                </form>
            </div>

    </main>
</x-layouts.sidebar>
