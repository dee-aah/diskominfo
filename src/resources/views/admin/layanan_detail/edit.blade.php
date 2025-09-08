<x-layouts.sidebar>
    <div class="max-w-5xl mx-auto  min-h-screen ml-2">
        <div class="rounded-2xl border  border-gray-200 bg-white ">
            <div class="flex  p-4 justify-center items-center ">
                <div class="flex  items-center ">
                    <h3 class="text-2xl text-center font-medium">Edit Detail Layanan</h3>
                </div>
            </div>
            <div id="main-content" class="p-5 border-t border-gray-300 sm:p-6 ">
                <div class="overflow-hidden rounded border  border-gray-300 px-6 bg-white pb-8   ">
                    <form action="{{ route('layanan_detail.update', $layanan_detail->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="mb-3">
                                <label class="block py-2 text-[15px] text-black font-medium">Layanan</label>
                                <select name="layanan_id"
                                    class="w-full border  border-gray-300 placeholder:text-sm text-sm rounded-lg p-2"
                                    required>
                                    <option value="">-- Pilih Layanan --</option>
                                    @foreach ($layanans as $layanan)
                                        <option value="{{ $layanan->id }}"
                                            {{ old('layanan_id', $layanan_detail->layanan_id ?? '') == $layanan->id ? 'selected' : '' }}>
                                            {{ $layanan->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="block py-2 text-[15px] text-black font-medium">Jenis Layanan</label>
                                <select name="jenis"
                                    class="w-full border  border-gray-300 placeholder:text-sm text-sm rounded-lg p-2"
                                    required>
                                    <option value="">-- Pilih Jenis Layanan --</option>
                                    @foreach ($jenisOptions as $option)
                                        <option value="{{ $option }}">{{ $option }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="block py-2 text-[15px] text-black font-medium">Deskripsi Layanan</label>
                            <textarea name="deskripsi" rows="3" placeholder="Masukkan Deskripsi Layanan "
                                class="w-full border editor  border-gray-300 placeholder:text-sm text-sm rounded-lg p-2" required>{{ old('deskripsi', $layanan_detail->deskripsi) }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label class="block py-2 text-[15px] text-black font-medium">Gambar</label>
                            <input type="file" name="gambar"
                                class="focus:border-ring-brand-300 placeholder:text-sm shadow-theme-xs focus:file:ring-brand-300 h-11 w-full overflow-hidden rounded-lg border border-gray-300 bg-transparent text-sm text-gray-500 transition-colors file:mr-5 file:border-collapse file:cursor-pointer file:rounded-l-lg file:border-0 file:border-r file:border-solid file:border-gray-200 file:bg-gray-50 file:py-3 file:pr-3 file:pl-3.5 file:text-sm file:text-gray-700 placeholder:text-gray-400 hover:file:bg-gray-100 focus:outline-hidden" />
                            @if ($layanan_detail->gambar)
                                <p class="mt-2 text-sm text-gray-500">Gambar saat ini:</p>
                                <img src="{{ asset('storage/layanan_detail/' . $layanan_detail->gambar) }}"
                                    class="w-32 mt-1 rounded">
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
            </div>
        </div>
    </div>
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <script>
        document.querySelectorAll('.editor').forEach((el) => {
            ClassicEditor
                .create(el)
                .catch(error => {
                    console.error(error);
                });
        });
    </script>
</x-layouts.sidebar>
