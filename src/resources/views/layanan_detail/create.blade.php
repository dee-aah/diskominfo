<x-layouts.sidebar>
    <main>
        <div class="@container">
            <div class="max-w-3xl mx-auto ">
                <div class="flex justify-center items-center mb-4">
                    <h3 class="text-3xl text-center font-bold">Tambah Detail Layanan</h3>
                </div>
                <form action="{{ route('layanan_detail.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="block text-lg font-medium">Program</label>
                        <select name="layanan_id" class="w-full bg-gray-100 border-sky-500 border rounded p-2"
                            required>
                            <option value="">-- Pilih Program --</option>
                            @foreach ($layanans as $layanan)
                                <option value="{{ $layanan->id }}">{{ $layanan->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="block text-lg font-medium">Jenis Layanan</label>
                        <select name="jenis" class="w-full border bg-gray-100 border-sky-500 rounded p-2" required>
                            <option value="">-- Pilih Jenis Layanan --</option>
                            @foreach ($jenisOptions as $option)
                            <option value="{{ $option }}">{{ $option }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="block text-lg font-medium">Deskripsi Layanan</label>
                        <textarea name="isi_1" rows="" placeholder=" Masukkan Deskripsi Layanan Ke 1"
                            class="w-full border bg-gray-100 border-sky-500 rounded p-2" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="block text-lg font-medium">Deskripsi Layanan</label>
                        <textarea name="isi_2" rows="" placeholder=" Masukkan Deskripsi Layanan Ke 2"
                            class="w-full border bg-gray-100 border-sky-500 rounded p-2" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="block text-lg font-medium">Deskripsi Layanan</label>
                        <textarea name="isi_3" rows="" placeholder=" Masukkan Deskripsi Layanan Ke 3 (Opsional)"
                            class="w-full border bg-gray-100 border-sky-500 rounded p-2" ></textarea>
                            
                    </div>
                    <div class="mb-3">
                        <label class="block text-lg font-medium">Deskripsi Layanan</label>
                        <textarea name="isi_4" rows="" placeholder=" Masukkan Deskripsi Layanan Ke 4 (Opsional)"
                            class="w-full border bg-gray-100 border-sky-500 rounded p-2" ></textarea>

                    </div>
                   <div class="mb-3">
                        <label class="block text-lg font-medium">Deskripsi Layanan</label>
                        <textarea name="isi_5" rows="" placeholder=" Masukkan Deskripsi Layanan Ke 5 (Opsional)"
                            class="w-full border bg-gray-100 border-sky-500 rounded p-2" ></textarea>

                    </div>
                    <div class="mb-3 mt-2">
                        <input required type="file" name="gambar"
                            class="w-full p-2 justify-end file:mr-4 file:rounded-3xl file:border-0 file:bg-violet-50
                            file:px-4 file:py-2 file:text-sm  file:font-semibold file:text-blue-600 hover:file:bg-violet-100 dark:file:bg-blue-600 dark:file:text-violet-100 dark:hover:file:bg-violet-400 ..." />
                    </div>
                    <div class="flex justify-end gap-2 mt-4">
                        <a href="{{ route('layanan_detail.dashboard') }}" type="button"
                            class="bg-gray-400 hover:bg-gray-500 text-white px-4 py-2 rounded">Batal</a>
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</x-layouts.sidebar>
