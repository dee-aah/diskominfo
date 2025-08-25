<x-layouts.sidebar>
    <main>
            <div class="max-w-3xl mx-auto">
                <div class="flex justify-center items-center mb-4">
                    <h3 class="text-3xl text-center font-bold">Edit Profil Pimpinan</h3>
                </div>
                <form action="{{ route('profill.update', $profil->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="block text-lg font-medium">Deskripsi Singkat</label>
                        <input type="string" name="nama" value="{{ old('nama', $profil->nama) }}"
                            placeholder="Masukkan Nama Pimpinan"
                            class="w-full border bg-gray-100 border-gray-400 border-2 rounded p-2" required></input>
                    </div>
                    <div class="mb-3">
                        <label class="block text-lg font-medium">Deskripsi Singkat</label>
                        <textarea name="des_singkat" rows="5"
                            placeholder="Masukkan Deskripsi Singkat"
                            class="w-full border bg-gray-100 border-gray-400 border-2 rounded p-2" required>{{ old('des_singkat', $profil->des_singkat) }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="block text-lg font-medium">Deskripsi </label>
                        <textarea name="deskripsi" rows="5"
                            placeholder="Masukkan Deskripsi"
                            class="w-full border bg-gray-100 border-gray-400 border-2 rounded p-2" required>{{ old('deskripsi', $profil->deskripsi) }}</textarea>
                    </div>
                    <div class="flex ">
                        <div class="mb-3">
                            <label class="block text-lg font-medium">Foto Pimpinana</label>
                        <input  type="file" name="img_team"
                            class="w-full p-2 justify-end file:mr-4 file:rounded-3xl file:border-0 file:bg-violet-50
                            file:px-4 file:py-2 file:text-sm  file:font-semibold file:text-blue-600 hover:file:bg-violet-100 dark:file:bg-blue-600 dark:file:text-violet-100 dark:hover:file:bg-violet-400 ..." />
                        @if ($profil->img_team)
                            <p class="mt-2 text-sm text-gray-500">Gambar saat ini:</p>
                            <img src="{{ asset('storage/profil/' . $profil->img_team) }}" class="w-32 mt-1  rounded">
                        @endif
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
