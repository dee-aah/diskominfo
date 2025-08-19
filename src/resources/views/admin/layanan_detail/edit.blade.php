<x-layouts.sidebar>
    <main>
            <div class="max-w-3xl mx-auto">
                <div class="flex justify-center items-center mb-4">
                    <h3 class="text-3xl text-center font-bold">Edit Detail Layanan</h3>
                </div>
                <form action="{{ route('layanan_detail.update', $layanan_detail->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="block text-base font-medium">Layanan</label>
                        <select name="layanan_id" class="w-full bg-gray-100 border-gray-400 border rounded p-2"
                            required>
                            <option value="">-- Pilih Program --</option>
                            @foreach ($layanans as $layanan)
                                <option value="{{ $layanan->id }}" {{ old('layanan_id', $layanan_detail->layanan_id ?? '') == $layanan->id ? 'selected' : '' }}>
                                    {{ $layanan->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="block text-lg font-medium">Jenis Layanan</label>
                        <select name="jenis" class="w-full border bg-gray-100 border-gray-400 rounded p-2" required>
                            <option value="">-- Pilih Jenis Layanan --</option>
                            @foreach ($jenisOptions as $option)
                            <option value="{{ $option }}">{{ $option }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="block text-lg font-medium">Deskripsi Layanan</label>
                        <textarea name="isi_1" rows="5"
                            placeholder="Masukkan Deskripsi Layanan ke 1"
                            class="w-full border bg-gray-100 border-sky-500 rounded p-2" required>{{ old('isi_1', $layanan_detail->isi_1) }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="block text-lg font-medium">Deskripsi Layanan</label>
                        <textarea name="isi_2" rows="5"
                            placeholder="Masukkan Deskripsi Layanan ke 2"
                            class="w-full border bg-gray-100 border-sky-500 rounded p-2" required>{{ old('isi_2', $layanan_detail->isi_2) }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="block text-lg font-medium">Deskripsi Layanan</label>
                        <textarea name="isi_3" rows="5"
                            placeholder="Masukkan Deskripsi Layanan ke 3"
                            class="w-full border bg-gray-100 border-sky-500 rounded p-2" >{{ old('isi_3', $layanan_detail->isi_3) }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="block text-lg font-medium">Deskripsi Layanan</label>
                        <textarea name="isi_4" rows="5"
                            placeholder="Masukkan Deskripsi Layanan ke 4"
                            class="w-full border bg-gray-100 border-sky-500 rounded p-2" >{{ old('isi_4', $layanan_detail->isi_4) }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="block text-lg font-medium">Deskripsi Layanan</label>
                        <textarea name="isi_5" rows="5"
                            placeholder="Masukkan Deskripsi Layanan ke 5"
                            class="w-full border bg-gray-100 border-sky-500 rounded p-2" >{{ old('isi_5', $layanan_detail->isi_5) }}</textarea>
                    </div>
                    <div class="mb-3">
                        <input type="file" name="gambar"
                            class="w-full p-2 justify-end file:mr-4 file:rounded-3xl file:border-0 file:bg-violet-50
                            file:px-4 file:py-2 file:text-sm  file:font-semibold file:text-blue-600 hover:file:bg-violet-100 dark:file:bg-blue-600 dark:file:text-violet-100 dark:hover:file:bg-violet-400 ..." />
                        @if ($layanan_detail->gambar)
                            <p class="mt-2 text-sm text-gray-500">Gambar saat ini:</p>
                            <img src="{{ asset('storage/layanan_detail/' . $layanan_detail->gambar) }}" class="w-32 mt-1 rounded">
                        @endif
                    </div>
                    <div class="flex justify-end gap-2 mt-4">
                        <a href="{{ route('layanan_detail.dashboard') }}"
                            class="bg-gray-400 hover:bg-gray-500 text-white px-4 py-2 rounded">Batal</a>
                        <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Simpan</button>
                    </div>
                </form>
            </div>

    </main>
</x-layouts.sidebar>
