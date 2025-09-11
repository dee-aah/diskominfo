<x-layouts.sidebar>
    <div class="max-w-5xl mx-auto  min-h-screen ml-2">
        <div class="rounded-2xl border  border-gray-200 bg-white ">
            <div class="flex  p-4 justify-center items-center ">
                <div class="flex  items-center ">
                    <h3 class="text-2xl text-center font-medium">Tambah Berita</h3>
                </div>
            </div>
            <div id="main-content" class="p-5 border-t border-gray-300 sm:p-6 ">
                <div class="overflow-hidden rounded border  border-gray-300 px-6 bg-white pb-8  ">
                <form action="{{ route('beritaa.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="my-3">
                        <label class="block py-2 text-[15px] text-black font-medium">Judul Berita</label>
                        <input type="text" name="judul" placeholder=" Masukkan Judul Berita"
                            class="w-full border border-gray-300 placeholder:text-sm text-sm rounded-lg p-2" required>
                    </div>
                    <div class="mb-3">
                        <label class="block py-2 text-[15px] text-black font-medium">Deskripsi</label>
                        <textarea name="deskripsi" rows="10" placeholder=" Masukkan Deskripsi Berita"
                            class="w-full border editor border-gray-300 placeholder:text-sm text-sm rounded-lg p-2" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="block py-2 text-[15px] text-black font-medium">Penulis</label>
                        <input type="text" name="penulis" placeholder=" Masukkan Nama Penulis"
                            class="w-full border border-gray-300 placeholder:text-sm text-sm rounded-lg p-2" required>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="mb-3">
                        <label class="block py-2 text-[15px] text-black font-medium">Waktu Kegiatan</label>
                        <input type="date" name="waktu" placeholder=" Masukkan Waktu Kegiatan"
                            class="w-full border border-gray-300 placeholder:text-sm text-sm rounded-lg p-2" required>
                    </div>
                    <div class="mb-3">
                        <label class="block py-2 text-[15px] text-black font-medium">Kategori</label>
                        <select name="kategori_id" class="w-full border border-gray-300 placeholder:text-sm text-sm rounded-lg p-2"
                            required>
                            <option value="">-- Pilih Kategori --</option>
                            @foreach ($kategoris as $kategori)
                                <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    </div>
                    <div class="mb-3">
                        <label class="block py-2 text-[15px] text-black font-medium">Tag</label>
                        <input type="text" name="tag" placeholder=" Masukkan Tag Berita"
                            class="w-full border border-gray-300 placeholder:text-sm text-sm rounded-lg p-2" required>
                            <small class="text-gray-500">Pisahkan Tag Dengan Koma (',').</small>
                    </div>
                    <div class="mb-3 mt-2">
                        <label class="block py-2 text-[15px] text-black font-medium">Gambar</label>
                        <input required type="file" name="gambar"
                            class="focus:border-ring-brand-300 placeholder:text-sm shadow-theme-xs focus:file:ring-brand-300 h-11 w-full overflow-hidden rounded-lg border border-gray-300 bg-transparent text-sm text-gray-500 transition-colors file:mr-5 file:border-collapse file:cursor-pointer file:rounded-l-lg file:border-0 file:border-r file:border-solid file:border-gray-200 file:bg-gray-50 file:py-3 file:pr-3 file:pl-3.5 file:text-sm file:text-gray-700 placeholder:text-gray-400 hover:file:bg-gray-100 focus:outline-hidden" />
                    </div>
                    <div class="flex justify-end gap-2 mt-6">
                        <a href="{{ route('beritaa.dashboard') }}" type="button"
                            class="bg-gray-500 hover:bg-gray-400 text-white px-4 py-2 rounded">Batal</a>
                        <button type="submit" class="bg-blue-700 hover:bg-blue-600 text-white px-4 py-2 rounded">Simpan
                        </button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>

</x-layouts.sidebar>
