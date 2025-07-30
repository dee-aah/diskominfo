<x-layouts.sidebar>
    <div class="p-6 ">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold">Daftar Berita</h2>
            <a href="{{ route('berita.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">Tambah Berita</a>
        </div>

        @if(session('success'))
            <div class="mb-4 text-green-600">
                {{ session('success') }}
            </div>
        @endif

        <table class="table-auto w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border px-4 py-2">Judul</th>
                    <th class="border px-4 py-2">Penulis</th>
                    <th class="border px-4 py-2">Tag</th>
                    <th class="border px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($beritas as $berita)
                    <tr>
                        <td class="border px-4 py-2">{{ $berita->judul }}</td>
                        <td class="border px-4 py-2">{{ $berita->penulis }}</td>
                        <td class="border px-4 py-2">{{ $berita->tag }}</td>
                        <td class="border px-4 py-2 flex gap-2">
                            <a href="{{ route('berita.edit', $berita->id) }}" class="text-blue-500">Edit</a>
                            <form action="{{ route('berita.destroy', $berita->id) }}" method="POST" onsubmit="return confirm('Yakin hapus berita ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center py-4">Belum ada berita.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-layouts.sidebar>
