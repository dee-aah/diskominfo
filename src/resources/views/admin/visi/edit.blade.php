<x-layouts.sidebar>
    <div class="max-w-5xl mx-auto  min-h-screen ml-2">
        <div class="rounded-2xl border  border-gray-200 bg-white ">
            <div class="flex  p-4 justify-center items-center ">
                <div class="flex  items-center ">
                    <h3 class="text-2xl text-center font-medium">Edit Visi Dan Misi</h3>
                </div>
            </div>
            <div id="main-content" class="p-5 border-t border-gray-300 sm:p-6 ">
                <div class="overflow-hidden rounded border  border-gray-300 px-6 bg-white pb-8 ">
                <form action="{{ route('visi.update', $visi->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="my-3">
                        <label class="block py-2 text-[15px] text-black font-medium">Deskripsi Visi</label>
                        <textarea name="visi"  rows="5"
                            placeholder="Masukkan Deskripsi Visi"
                            class="w-full border editor border-gray-300 placeholder:text-sm text-sm rounded-lg p-2" required>{{ old('visi', $visi->visi) }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="block py-2 text-[15px] text-black font-medium">Deskripsi Misi</label>
                        <textarea name="misi"  rows="5"
                            placeholder="Masukkan Deskripsi Misi"
                            class="w-full border editor border-gray-300 placeholder:text-sm text-sm rounded-lg p-2" required>{{ old('misi', $visi->misi) }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="block py-2 text-[15px] text-black font-medium">Deskripsi Singkat</label>
                        <textarea name="des_singkat" rows="5"
                            placeholder="Masukkan Deskripsi Singkat"
                            class="w-full border editor border-gray-300 placeholder:text-sm text-sm rounded-lg p-2" required>{{ old('des_singkat', $visi->des_singkat) }}</textarea>
                    </div>
                    <div class="mb-3">
                        <input  type="file" name="gambar"
                            class="focus:border-ring-brand-300 placeholder:text-sm shadow-theme-xs focus:file:ring-brand-300 h-11 w-full overflow-hidden rounded-lg border border-gray-300 bg-transparent text-sm text-gray-500 transition-colors file:mr-5 file:border-collapse file:cursor-pointer file:rounded-l-lg file:border-0 file:border-r file:border-solid file:border-gray-200 file:bg-gray-50 file:py-3 file:pr-3 file:pl-3.5 file:text-sm file:text-gray-700 placeholder:text-gray-400 hover:file:bg-gray-100 focus:outline-hidden " />
                    @if ($visi->gambar)
                            <p class="mt-2 text-sm text-gray-500">Gambar saat ini:</p>
                            <img src="{{ asset('storage/visi/' . $visi->gambar) }}" class="w-32 mt-1 rounded">
                        @endif
                    </div>
                    <div class="flex justify-end gap-2 ">
                        <a href="{{ route('visi.dashboard') }}"
                            class="bg-gray-500 hover:bg-gray-400 text-white px-4 py-2 rounded">Batal</a>
                        <button type="submit"
                            class="bg-blue-700 hover:bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>

</x-layouts.sidebar>
