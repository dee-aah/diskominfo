<x-layouts.sidebar>
<div class="max-w-5xl mx-auto  min-h-screen ml-2">
        <div class="rounded-2xl border  border-gray-200 bg-white ">
            <div class="flex  p-4 justify-center items-center ">
                <div class="flex  items-center ">
                    <h3 class="text-2xl text-center font-medium">Edit Produk Hukum</h3>
                </div>
            </div>
            <div id="sidebar" class="p-5 border-t border-gray-300 sm:p-6 ">
                <div class="overflow-hidden rounded border  border-gray-300 px-6 bg-white pb-8 mb-40  ">
                <form action="{{ route('produk_hukum.update', $produk->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="my-3">
                        <label class="block py-2 text-[15px] text-black font-medium">No Registrasi</label>
                        <input type="text" name="reg" value="{{ old('reg', $produk->reg) }}" placeholder=" Masukkan Registrasi"
                            class="w-full border border-gray-300 placeholder:text-sm text-sm rounded-lg p-2" required></input>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="mb-3">
                        <label class="block py-2 text-[15px] text-black font-medium">Judul Hukum</label>
                        <input type="string" name="judul_peraturan" value="{{ old('judul_peraturan', $produk->judul_peraturan) }}" placeholder=" Masukkan Judul Peraturan"
                            class="w-full border border-gray-300 placeholder:text-sm text-sm rounded-lg p-2" required></input>
                    </div>
                    <div class="mb-3">
                        <label class="block py-2 text-[15px] text-black font-medium">Jenis Peraturan</label>
                        <input type="string" name="jenis_peraturan" value="{{ old('jenis_peraturan', $produk->jenis_peraturan) }}" placeholder=" Masukkan Jenis Peraturan"
                            class="w-full border border-gray-300 placeholder:text-sm text-sm rounded-lg p-2" required></input>
                    </div>

                    </div>
                    <div class="mb-3">
                        <label class="block py-2 text-[15px] text-black font-medium">Nomor</label>
                        <input type="string" name="nomor" value="{{ old('nomor', $produk->nomor) }}" placeholder=" Masukkan Nomor"
                            class="w-full border border-gray-300 placeholder:text-sm text-sm rounded-lg p-2" required></input>
                    </div>
                    <div class="mb-3">
                        <label class="block py-2 text-[15px] text-black font-medium">Tahun Terbit</label>
                        <input type="year" name="tahun_terbit" value="{{ old('tahun_terbit', $produk->tahun_terbit) }}" placeholder=" Masukkan Tahun Terbit"
                            class="w-full border border-gray-300 placeholder:text-sm text-sm rounded-lg p-2" required></input>
                    </div>
                    <div class="mb-3">
                        <label class="block py-2 text-[15px] text-black font-medium">Singkatan Jenis</label>
                        <input type="string" name="singkatan_jenis" value="{{ old('singkatan_jenis', $produk->singkatan_jenis) }}" placeholder=" Masukkan Singkatan Jenis"
                            class="w-full border border-gray-300 placeholder:text-sm text-sm rounded-lg p-2" required></input>
                    </div>
                    <div class="mb-3">
                        <label class="block py-2 text-[15px] text-black font-medium">Tahun Penetapan</label>
                        <input type="date" name="tahun_penetapan" value="{{ old('tahun_penetapan', $produk->tahun_penetapan) }}" placeholder=" Masukkan Tahun Penetapan"
                            class="w-full border border-gray-300 placeholder:text-sm text-sm rounded-lg p-2" required></input>
                    </div>
                    <div class="mb-3">
                        <label class="block py-2 text-[15px] text-black font-medium">Tahun Pengundangan</label>
                        <input type="date" name="tanggal_pengundangan" value="{{ old('tahun_pengundangan', $produk->tahun_pengundangan) }}" placeholder=" Masukkan Tahun Pengundangan"
                            class="w-full border border-gray-300 placeholder:text-sm text-sm rounded-lg p-2" required></input>
                    </div>
                    <div class="mb-3">
                        <label class="block py-2 text-[15px] text-black font-medium">Singkatan Pengarang</label>
                        <input type="string" name="pengarang" value="{{ old('pengarang', $produk->pengarang) }}" placeholder=" Masukkan Pengarang"
                            class="w-full border border-gray-300 placeholder:text-sm text-sm rounded-lg p-2" required></input>
                    </div>
                    <div class="mb-3">
                        <label class="block py-2 text-[15px] text-black font-medium"> Sumber</label>
                        <input type="string" name="sumber" value="{{ old('sumber', $produk->sumber) }}" placeholder=" Masukkan Sumber"
                            class="w-full border border-gray-300 placeholder:text-sm text-sm rounded-lg p-2" required></input>
                    </div>
                    <div class="mb-3">
                        <label class="block py-2 text-[15px] text-black font-medium"> Tempat Terbit</label>
                        <input type="string" name="tempat_terbit" value="{{ old('tempat_terbit', $produk->tempat_terbit) }}" placeholder=" Masukkan Tempat Terbit"
                            class="w-full border border-gray-300 placeholder:text-sm text-sm rounded-lg p-2" required></input>
                    </div>
                    <div class="mb-3">
                        <label class="block py-2 text-[15px] text-black font-medium"> Bidang Hukum</label>
                        <input type="string" name="bidang_hukum" value="{{ old('bidang_hukum', $produk->bidang_hukum)}}" placeholder=" Masukkan Bidang Hukum"
                            class="w-full border border-gray-300 placeholder:text-sm text-sm rounded-lg p-2" required></input>
                    </div>
                    <div class="mb-3">
                        <label class="block py-2 text-[15px] text-black font-medium"> Subjek</label>
                        <input type="string" name="subjek" value="{{ old('subjek', $produk->subjek) }}" placeholder="Masukkan Subjek"
                            class="w-full border border-gray-300 placeholder:text-sm text-sm rounded-lg p-2" required></input>
                    </div>
                    <div class="mb-3">
                        <label class="block py-2 text-[15px] text-black font-medium"> Bahasa</label>
                        <input type="string" name="bahasa" value="{{ old('bahasa', $produk->bahasa) }}" placeholder=" Masukkan Bahasa"
                            class="w-full border border-gray-300 placeholder:text-sm text-sm rounded-lg p-2" required></input>
                    </div>
                    <div class="mb-3">
                        <label class="block py-2 text-[15px] text-black font-medium"> Lokasi</label>
                        <input type="string" name="lokasi" value="{{ old('lokasi', $produk->lokasi) }}" placeholder=" Masukkan Lokasi"
                            class="w-full border border-gray-300 placeholder:text-sm text-sm rounded-lg p-2" required></input>
                    </div>
                    <div class="mb-3">
                        <label class="block py-2 text-[15px] text-black font-medium">Status</label>
                        <select name="status" class="w-full border border-gray-300 placeholder:text-sm text-sm rounded-lg p-2" required>
                        <option value="">-- Pilih Status --</option>
                        <option value="BERLAKU" {{ old('status') == 'BERLAKU' ? 'selected' : '' }}>BERLAKU</option>
                        <option value="TIDAK BERLAKU" {{ old('status') == 'TIDAK BERLAKU' ? 'selected' : '' }}>TIDAK BERLAKU</option>
                        </select>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="mb-3 mt-2">
                        <label class="block py-2 text-[15px] text-black font-medium">Lampiran</label>
                        <input  type="file" name="lampiran" accept="application/pdf"
                                class="focus:border-ring-brand-300 placeholder:text-sm shadow-theme-xs focus:file:ring-brand-300 h-11 w-full overflow-hidden rounded-lg border border-gray-300 bg-transparent text-sm text-gray-500 transition-colors file:mr-5 file:border-collapse file:cursor-pointer file:rounded-l-lg file:border-0 file:border-r file:border-solid file:border-gray-200 file:bg-gray-50 file:py-3 file:pr-3 file:pl-3.5 file:text-sm file:text-gray-700 placeholder:text-gray-400 hover:file:bg-gray-100 focus:outline-hidden " />
                            </div>
                    <div class="mb-3 mt-2">
                        <label class="block py-2 text-[15px] text-black font-medium">Naskah Akademik</label>
                        <input  type="file" name="naskah_akademik" accept="application/pdf"
                            class="focus:border-ring-brand-300 placeholder:text-sm shadow-theme-xs focus:file:ring-brand-300 h-11 w-full overflow-hidden rounded-lg border border-gray-300 bg-transparent text-sm text-gray-500 transition-colors file:mr-5 file:border-collapse file:cursor-pointer file:rounded-l-lg file:border-0 file:border-r file:border-solid file:border-gray-200 file:bg-gray-50 file:py-3 file:pr-3 file:pl-3.5 file:text-sm file:text-gray-700 placeholder:text-gray-400 hover:file:bg-gray-100 focus:outline-hidden " />
                            </div>
                    </div>
                    <div class="flex justify-end gap-2 mt-4">
                        <a href="{{ route('oroduk_hukum.dashboard') }}"
                            class="bg-gray-400 hover:bg-gray-500 text-white px-4 py-2 rounded">Batal</a>
                        <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Simpan</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</x-layouts.sidebar>
