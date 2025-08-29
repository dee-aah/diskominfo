<x-layouts.sidebar>
    <main>
        <div class="@container">
            <div class="max-w-3xl mx-auto ">
                <div class="flex justify-center items-center mb-4">
                    <h3 class="text-3xl text-center font-bold">Tambah Profil Pimpinan</h3>
                </div>
                <form action="{{ route('produk_hukum.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="block text-lg font-medium">Registrasi</label>
                        <input type="text" name="reg" placeholder=" Masukkan Registrasi"
                            class="w-full border bg-gray-100 border-gray-400 rounded p-2" required></input>
                    </div>
                    <div class="mb-3">
                        <label class="block text-lg font-medium">Jenis Peraturan</label>
                        <input type="text" name="jenis_peraturan" placeholder=" Masukkan Jenis Peraturan"
                            class="w-full border bg-gray-100 border-gray-400 rounded p-2" required></input>
                    </div>
                    <div class="mb-3">
                        <label class="block text-lg font-medium">Judul Peraturan</label>
                        <input type="text" name="judul_peraturan" placeholder=" Masukkan Judul Peraturan"
                            class="w-full border bg-gray-100 border-gray-400 rounded p-2" required></input>
                    </div>
                    <div class="mb-3">
                        <label class="block text-lg font-medium">Nomor</label>
                        <input type="number" name="nomor" placeholder=" Masukkan Nomor"
                            class="w-full border bg-gray-100 border-gray-400 rounded p-2" required></input>
                    </div>
                    <div class="mb-3">
                        <label class="block text-lg font-medium">Tahun Terbit</label>
                        <input type="number" min="2000" max="2100" name="tahun_terbit" placeholder=" Masukkan Tahun Terbit"
                            class="w-full border bg-gray-100 border-gray-400 rounded p-2" required></input>
                    </div>
                    <div class="mb-3">
                        <label class="block text-lg font-medium">Singkatan Jenis</label>
                        <input type="text" name="singkatan_jenis" placeholder=" Masukkan Singkatan Jenis"
                            class="w-full border bg-gray-100 border-gray-400 rounded p-2" required></input>
                    </div>
                    <div class="mb-3">
                        <label class="block text-lg font-medium">Tahun Penetapan</label>
                        <input type="date" name="tahun_penetapan" placeholder=" Masukkan Tahun Penetapan"
                            class="w-full border bg-gray-100 border-gray-400 rounded p-2" required></input>
                    </div>
                    <div class="mb-3">
                        <label class="block text-lg font-medium">Tahun Pengundangan</label>
                        <input type="date" name="tanggal_pengundangan" placeholder=" Masukkan Tahun Pengundangan"
                            class="w-full border bg-gray-100 border-gray-400 rounded p-2" required></input>
                    </div>
                    <div class="mb-3">
                        <label class="block text-lg font-medium">Singkatan Pengarang</label>
                        <input type="text" name="pengarang" placeholder=" Masukkan Pengarang"
                            class="w-full border bg-gray-100 border-gray-400 rounded p-2" required></input>
                    </div>
                    <div class="mb-3">
                        <label class="block text-lg font-medium"> Sumber</label>
                        <input type="text" name="sumber" placeholder=" Masukkan Sumber"
                            class="w-full border bg-gray-100 border-gray-400 rounded p-2" required></input>
                    </div>
                    <div class="mb-3">
                        <label class="block text-lg font-medium"> Tempat Terbit</label>
                        <input type="text" name="tempat_terbit" placeholder=" Masukkan Tempat Terbit"
                            class="w-full border bg-gray-100 border-gray-400 rounded p-2" required></input>
                    </div>
                    <div class="mb-3">
                        <label class="block text-lg font-medium"> Bidang Hukum</label>
                        <input type="text" name="bidang_hukum" placeholder=" Masukkan Bidang Hukum"
                            class="w-full border bg-gray-100 border-gray-400 rounded p-2" required></input>
                    </div>
                    <div class="mb-3">
                        <label class="block text-lg font-medium"> Subjek</label>
                        <input type="text" name="subjek" placeholder=" Masukkan Subjek"
                            class="w-full border bg-gray-100 border-gray-400 rounded p-2" required></input>
                    </div>
                    <div class="mb-3">
                        <label class="block text-lg font-medium"> Bahasa</label>
                        <input type="text" name="bahasa" placeholder=" Masukkan Bahasa"
                            class="w-full border bg-gray-100 border-gray-400 rounded p-2" required></input>
                    </div>
                    <div class="mb-3">
                        <label class="block text-lg font-medium"> Lokasi</label>
                        <input type="text" name="lokasi" placeholder=" Masukkan Lokasi"
                            class="w-full border bg-gray-100 border-gray-400 rounded p-2" required></input>
                    </div>
                    <div class="mb-3">
                        <label class="block text-lg font-medium">Status</label>
                        <select name="status" class="w-full border bg-gray-100 border-gray-400 rounded p-2" required>
                        <option value="">-- Pilih Status --</option>
                        <option value="BERLAKU" {{ old('status') == 'BERLAKU' ? 'selected' : '' }}>BERLAKU</option>
                        <option value="TIDAK BERLAKU" {{ old('status') == 'TIDAK BERLAKU' ? 'selected' : '' }}>TIDAK BERLAKU</option>
                        </select>
                    </div>
                    <div class="flex ">
                    <div class="mb-3 mt-2">
                        <label class="block text-lg font-medium">Lampiran</label>
                        <input required type="file" name="lampiran"  accept="application/pdf"
                            class="w-full p-2 justify-end file:mr-4 file:rounded-3xl file:border-0 file:bg-violet-50
                    file:px-4 file:py-2 file:text-sm  file:font-semibold file:text-blue-600 hover:file:bg-violet-100 dark:file:bg-blue-600 dark:file:text-violet-100 dark:hover:file:bg-violet-400 ..." />
                    </div>
                    <div class="mb-3 mt-2">
                        <label class="block text-lg font-medium">Naskah Akademik</label>
                        <input  type="file" name="naskah_akademik"  accept="application/pdf"
                            class="w-full p-2 justify-end file:mr-4 file:rounded-3xl file:border-0 file:bg-violet-50
                            file:px-4 file:py-2 file:text-sm  file:font-semibold file:text-blue-600 hover:file:bg-violet-100 dark:file:bg-blue-600 dark:file:text-violet-100 dark:hover:file:bg-violet-400 ..." />
                    </div>
                    </div>
                    <div class="flex justify-end gap-2 mt-4">
                        <a href="{{ route('produk_hukum.dashboard') }}" type="button"
                            class="bg-gray-400 hover:bg-gray-500 text-white px-4 py-2 rounded">Batal</a>
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</x-layouts.sidebar>
