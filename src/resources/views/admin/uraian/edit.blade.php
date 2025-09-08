<x-layouts.sidebar>
    <div class="max-w-5xl mx-auto  min-h-screen ml-2">
        <div class="rounded-2xl border  border-gray-200 bg-white ">
            <div class="flex  p-4 justify-center items-center ">
                <div class="flex  items-center ">
                    <h3 class="text-2xl text-center font-medium">Edit Tupoksi</h3>
                </div>
            </div>
            <div id="main-content" class="p-5 border-t border-gray-300 sm:p-6 ">
                <div class="overflow-hidden rounded border  border-gray-300 px-6 bg-white pb-8  ">
                <form action="{{ route('uraian.update', $uraian->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="block py-2 text-[15px] text-black font-medium">Bidang</label>
                        <input type="text" name="bidang" value="{{ old('bidang', $uraian->bidang) }}"
                            placeholder="Masukkan Deskripsi Bidang"
                            class="w-full border  border-gray-300 placeholder:text-sm text-sm rounded-lg p-2" required></input>
                    </div>
                    <div class="mb-3">
                        <label class="block py-2 text-[15px] text-black font-medium">Uraian</label>
                        <textarea name="uraian" rows="3"
                            placeholder="Masukkan Uraian"
                            class="w-full border editor border-gray-300 placeholder:text-sm text-sm rounded-lg p-2" required>{{ old('uraian', $uraian->uraian) }}</textarea>
                    </div>
                    <div class="flex justify-end gap-2 mt-4">
                        <a href="{{ route('uraian.dashboard') }}"
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
