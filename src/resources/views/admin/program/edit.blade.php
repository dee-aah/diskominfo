<x-layouts.sidebar>
    <main>
            <div class="max-w-3xl mx-auto">
                <div class="flex justify-center items-center mb-4">
                    <h3 class="text-3xl text-center font-bold">Edit Program</h3>
                </div>
                <form action="{{ route('program.update', $program->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="block text-lg font-medium">Nama Program</label>
                        <input type="text" name="nama" value="{{ old('nama', $program->nama) }}"
                            placeholder="Masukkan Nama Program"
                            class="w-full border bg-gray-100 border-sky-500 rounded p-2" required>
                    </div>

                    <div class="mb-3">
                        <label class="block text-lg font-medium">Deskripsi</label>
                        <textarea name="deskripsi" rows="12"
                            placeholder="Masukkan Deskripsi Program"
                            class="w-full border bg-gray-100 border-gray-400 rounded p-2" required>{{ old('deskripsi', $program->deskripsi) }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="block text-lg font-medium">Gambar</label>
                        <input type="file" name="gambar"
                            class="w-full bg-gray-100 border-gray-400 border rounded p-2">
                        @if ($program->gambar)
                            <p class="mt-2 text-sm text-gray-500">Gambar saat ini:</p>
                            <img src="{{ asset('storage/program/' . $program->gambar) }}" class="w-32 mt-1 rounded">
                        @endif
                    </div>

                    <div class="flex justify-end gap-2 mt-4">
                        <a href="{{ route('program.dashboard') }}"
                            class="bg-gray-400 hover:bg-gray-500 text-white px-4 py-2 rounded">Batal</a>
                        <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Simpan</button>
                    </div>
                </form>
            </div>

    </main>
</x-layouts.sidebar>
