<x-layouts.sidebar>
    <main>
        <div class="@container">
            <div class="max-w-3xl mx-auto ">
                <div class="flex justify-center items-center mb-4">
                    <h3 class="text-3xl text-center font-bold">Tambah Uraian Tugas</h3>
                </div>
                <form action="{{ route('uraian.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="block text-lg font-medium">Bidang</label>
                        <input type="string" name="bidang"  placeholder=" Masukkan Bidang "
                            class="w-full border bg-gray-100 border-gray-400 rounded p-2" required></input>
                    </div>
                    <div class="mb-3">
                        <label class="block text-lg font-medium">Uraian Tugas </label>
                        <textarea name="uraian" rows="5" placeholder=" Masukkan Uraian"
                            class="w-full border bg-gray-100 -border-gray-400 rounded p-2" required></textarea>
                            <small class="text-gray-500">Jika Banyak Pisahkan Dengan Koma (',').</small>
                    </div>
                    <div class="flex justify-end gap-2 mt-4">
                        <a href="{{ route('uraian.dashboard') }}" type="button"
                            class="bg-gray-400 hover:bg-gray-500 text-white px-4 py-2 rounded">Batal</a>
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</x-layouts.sidebar>
