<x-layouts.sidebar>
    <main>
            <div class="max-w-3xl mx-auto">
                <div class="flex justify-center items-center mb-4">
                    <h3 class="text-3xl text-center font-bold">Edit Profil Pimpinan</h3>
                </div>
                <form action="{{ route('produk_hukum.update', $produk->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="block text-lg font-medium">Jenis Hukum</label>
                        <input type="string" name="jenis_hukum" value="{{ old('jenis_hukum', $produk->jenis_hukum) }}" placeholder=" Masukkan Jenis Hukum"
                            class="w-full border bg-gray-100 border-gray-400 rounded p-2" required></input>
                    </div>
                    <div class="mb-3">
                        <label class="block text-lg font-medium">Judul Hukum</label>
                        <input type="string" name="judul_hukum" value="{{ old('judul_hukum', $produk->judul_hukum) }}" placeholder=" Masukkan Judul Hukum"
                            class="w-full border bg-gray-100 border-gray-400 rounded p-2" required></input>
                    </div>
                    <div class="mb-3">
                        <label class="block text-lg font-medium">Nomor</label>
                        <input type="string" name="nomor" value="{{ old('nomor', $produk->nomor) }}" placeholder=" Masukkan Nomor"
                            class="w-full border bg-gray-100 border-gray-400 rounded p-2" required></input>
                    </div>
                    <div class="mb-3">
                        <label class="block text-lg font-medium">Tahun Terbit</label>
                        <input type="year" name="tahun_terbit" value="{{ old('tahun_terbit', $produk->tahun_terbit) }}" placeholder=" Masukkan Tahun Terbit"
                            class="w-full border bg-gray-100 border-gray-400 rounded p-2" required></input>
                    </div>
                    <div class="mb-3">
                        <label class="block text-lg font-medium">Singkatan Jenis</label>
                        <input type="string" name="singkatan_jenis" value="{{ old('singkatan_jenis', $produk->singkatan_jenis) }}" placeholder=" Masukkan Singkatan Jenis"
                            class="w-full border bg-gray-100 border-gray-400 rounded p-2" required></input>
                    </div>
                    <div class="mb-3">
                        <label class="block text-lg font-medium">Tahun Penetapan</label>
                        <input type="date" name="tahun_penetapan" value="{{ old('tahun_penetapan', $produk->tahun_penetapan) }}" placeholder=" Masukkan Tahun Penetapan"
                            class="w-full border bg-gray-100 border-gray-400 rounded p-2" required></input>
                    </div>
                    <div class="mb-3">
                        <label class="block text-lg font-medium">Tahun Pengundangan</label>
                        <input type="date" name="tahun_pengundangan" value="{{ old('tahun_pengundangan', $produk->tahun_pengundangan) }}" placeholder=" Masukkan Tahun Pengundangan"
                            class="w-full border bg-gray-100 border-gray-400 rounded p-2" required></input>
                    </div>
                    <div class="mb-3">
                        <label class="block text-lg font-medium">Singkatan Pengarang</label>
                        <input type="string" name="pengarang" value="{{ old('pengarang', $produk->pengarang) }}" placeholder=" Masukkan Pengarang"
                            class="w-full border bg-gray-100 border-gray-400 rounded p-2" required></input>
                    </div>
                    <div class="mb-3">
                        <label class="block text-lg font-medium"> Sumber</label>
                        <input type="string" name="sumber" value="{{ old('sumber', $produk->sumber) }}" placeholder=" Masukkan Sumber"
                            class="w-full border bg-gray-100 border-gray-400 rounded p-2" required></input>
                    </div>
                    <div class="mb-3">
                        <label class="block text-lg font-medium"> Tempat Terbit</label>
                        <input type="string" name="tempat_terbit" value="{{ old('tempat_terbit', $produk->tempat_terbit) }}" placeholder=" Masukkan Tempat Terbit"
                            class="w-full border bg-gray-100 border-gray-400 rounded p-2" required></input>
                    </div>
                    <div class="mb-3">
                        <label class="block text-lg font-medium"> Bidang Hukum</label>
                        <input type="string" name="bidang_hukum" value="{{ old('bidang_hukum', $produk->bidang_hukum)}}" placeholder=" Masukkan Bidang Hukum"
                            class="w-full border bg-gray-100 border-gray-400 rounded p-2" required></input>
                    </div>
                    <div class="mb-3">
                        <label class="block text-lg font-medium"> Subjek</label>
                        <input type="string" name="subjek" value="{{ old('subjek', $produk->subjek) }}" placeholder="Masukkan Subjek"
                            class="w-full border bg-gray-100 border-gray-400 rounded p-2" required></input>
                    </div>
                    <div class="mb-3">
                        <label class="block text-lg font-medium"> Bahasa</label>
                        <input type="string" name="bahasa" value="{{ old('bahasa', $produk->bahasa) }}" placeholder=" Masukkan Bahasa"
                            class="w-full border bg-gray-100 border-gray-400 rounded p-2" required></input>
                    </div>
                    <div class="mb-3">
                        <label class="block text-lg font-medium"> Lokasi</label>
                        <input type="string" name="lokasi" value="{{ old('lokasi', $produk->lokasi) }}" placeholder=" Masukkan Lokasi"
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
                        <input required type="file" name="lampiran"
                            class="w-full p-2 justify-end file:mr-4 file:rounded-3xl file:border-0 file:bg-violet-50
                    file:px-4 file:py-2 file:text-sm  file:font-semibold file:text-blue-600 hover:file:bg-violet-100 dark:file:bg-blue-600 dark:file:text-violet-100 dark:hover:file:bg-violet-400 ..." />
                    </div>
                    <div class="mb-3 mt-2">
                        <label class="block text-lg font-medium">Naskah Akademik</label>
                        <input  type="file" name="naskah_akademik"
                            class="w-full p-2 justify-end file:mr-4 file:rounded-3xl file:border-0 file:bg-violet-50
                            file:px-4 file:py-2 file:text-sm  file:font-semibold file:text-blue-600 hover:file:bg-violet-100 dark:file:bg-blue-600 dark:file:text-violet-100 dark:hover:file:bg-violet-400 ..." />
                    </div>
                    </div>
                    <div class="mb-3">
                        <label class="block text-lg font-medium">Gambar Latar</label>
                        <input  type="file" name="gambar"
                            class="w-full p-2 justify-end file:mr-4 file:rounded-3xl file:border-0 file:bg-violet-50
                            file:px-4 file:py-2 file:text-sm  file:font-semibold file:text-blue-600 hover:file:bg-violet-100 dark:file:bg-blue-600 dark:file:text-violet-100 dark:hover:file:bg-violet-400 ..." />
                        @if ($profil->gambar)
                            <p class="mt-2 text-sm text-gray-500">Gambar saat ini:</p>
                            <img src="{{ asset('storage/profil/' . $profil->gambar) }}" class="w-32 mt-1 rounded">
                        @endif
                    </div>
                    </div>

                    <div class="flex justify-end gap-2 mt-4">
                        <a href="{{ route('profill.dashboard') }}"
                            class="bg-gray-400 hover:bg-gray-500 text-white px-4 py-2 rounded">Batal</a>
                        <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Simpan</button>
                    </div>
                </form>
            </div>
    </main>
</x-layouts.sidebar>
