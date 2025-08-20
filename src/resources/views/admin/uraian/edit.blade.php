<x-layouts.sidebar>
    <main>
            <div class="max-w-3xl mx-auto">
                <div class="flex justify-center items-center mb-4">
                    <h3 class="text-3xl text-center font-bold">Edit Uraian Tugas</h3>
                </div>
                <form action="{{ route('uraian.update', $uraian->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="block text-lg font-medium">Bidang</label>
                        <input type="string" name="bidang" value="{{ old('bidang', $uraian->bidang) }}"
                            placeholder="Masukkan Deskripsi Bidang"
                            class="w-full border bg-gray-100 border-gray-400 border-2 rounded p-2" required></input>
                    </div>
                    <div class="mb-3">
                        <label class="block text-lg font-medium">Uraian</label>
                        <textarea name="uraian" rows="3"
                            placeholder="Masukkan Uraian"
                            class="w-full border bg-gray-100 border-gray-400 border-2 rounded p-2" required>{{ old('uraian', $uraian->uraian) }}</textarea>
                    </div>
                    <div class="flex justify-end gap-2 mt-4">
                        <a href="{{ route('uraian.dashboard') }}"
                            class="bg-gray-400 hover:bg-gray-500 text-white px-4 py-2 rounded">Batal</a>
                        <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Simpan</button>
                    </div>
                </form>
            </div>

    </main>
</x-layouts.sidebar>
