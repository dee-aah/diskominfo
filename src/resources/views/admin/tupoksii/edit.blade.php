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
                <form action="{{ route('tupoksii.update', $tupoksii) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="block py-2 text-[15px] text-black font-medium">Tugas</label>
                        <textarea name="tugas" rows="3"
                            placeholder="Masukkan Tugas"
                            class="w-full border editor border-gray-300 placeholder:text-sm text-sm rounded-lg p-2" required>{{ old('tugas', $tupoksii->tugas) }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="block py-2 text-[15px] text-black font-medium">Fungsi Utama</label>
                        <textarea name="fungsi" rows="3"
                            placeholder="Masukkan Fungsi Utama"
                            class="w-full border editor border-gray-300 placeholder:text-sm text-sm rounded-lg p-2" required>{{ old('fungsi', $tupoksii->fungsi) }}</textarea>
                    </div>
                    <div class="flex justify-end gap-2 mt-4">
                        <a href="{{ route('tupoksii.dashboard') }}"
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
