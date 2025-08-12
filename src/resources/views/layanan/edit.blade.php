<x-layouts.sidebar>
    <main>
            <div class="max-w-3xl mx-auto">
                <div class="flex justify-center items-center mb-4">
                    <h3 class="text-3xl text-center font-bold">Edit Program</h3>
                </div>
                <form action="{{ route('layanan.update', $layanan->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="block text-lg font-medium">Nama Layanan</label>
                        <input type="text" name="nama" value="{{ old('nama', $layanan->nama) }}"
                            placeholder="Masukkan Nama Program"
                            class="w-full border bg-gray-100 border-sky-500 rounded p-2" required>
                    </div>

                    <div class="mb-3">
                        <label class="block text-lg font-medium">Deskripsi</label>
                        <textarea name="deskripsi" rows="12"
                            placeholder="Masukkan Deskripsi Program"
                            class="w-full border bg-gray-100 border-sky-500 rounded p-2" required>{{ old('deskripsi', $layanan->deskripsi) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="block text-lg font-medium">Urutan</label>
                        <input type="number" name="urutan" value="{{ old('urutan', $layanan->urutan) }}"
                            placeholder="Masukkan Urutan layanan"
                            class="w-full bg-gray-100 border border-sky-500 rounded p-2" required>
                    </div>
                    <div class="mb-3">
                        <label class="block text-base font-medium">Program</label>
                        <select name="program_id" class="w-full bg-gray-100 border-sky-500 border rounded p-2"
                            required>
                            <option value="">-- Pilih Program --</option>
                            @foreach ($programs as $program)
                                <option value="{{ $program->id }}" {{ old('program_id', $layanan->program_id ?? '') == $program->id ? 'selected' : '' }}>
                                    {{ $program->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        Gambar
                        <input required type="file" name="gambar"
                            class="w-full p-2 justify-end file:mr-4 file:rounded-3xl file:border-0 file:bg-violet-50
                            file:px-4 file:py-2 file:text-sm  file:font-semibold file:text-blue-600 hover:file:bg-violet-100 dark:file:bg-blue-600 dark:file:text-violet-100 dark:hover:file:bg-violet-400 ..." />
                        @if ($layanan->gambar)
                            <p class="mt-2 text-sm text-gray-500">Gambar saat ini:</p>
                            <img src="{{ asset('storage/layanan/' . $layanan->gambar) }}" class="w-32 mt-1 rounded">
                        @endif
                    </div>
                    <div class="flex justify-end gap-2 mt-4">
                        <a href="{{ route('layanan.dashboard') }}"
                            class="bg-gray-400 hover:bg-gray-500 text-white px-4 py-2 rounded">Batal</a>
                        <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Simpan</button>
                    </div>
                </form>
            </div>

    </main>
</x-layouts.sidebar>
