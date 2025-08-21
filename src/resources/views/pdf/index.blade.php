<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload & Kelola PDF</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100">

    <div class="container mx-auto p-4 sm:p-6 lg:p-8">
        <h1 class="text-2xl md:text-3xl font-bold text-gray-800 mb-6">Upload & Kelola PDF</h1>

        {{-- Menampilkan Pesan Sukses atau Error --}}
        @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-md" role="alert">
                <p class="font-bold">Sukses</p>
                <p>{{ session('success') }}</p>
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-md" role="alert">
                <p class="font-bold">Terjadi Kesalahan</p>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Form Upload --}}
        <div class="bg-white p-6 rounded-lg shadow-md mb-8">
            <h2 class="text-xl font-semibold mb-4 text-gray-700">Upload PDF Baru</h2>
            <form action="{{ route('pdf.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                <div>
                    <label for="nama" class="block text-sm font-medium text-gray-600 mb-1">Judul PDF</label>
                    <input type="text" name="nama" id="nama" placeholder="Masukkan judul untuk PDF" required
                           class="w-full border border-gray-300 p-2 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                </div>
                <div>
                    <label for="pdf" class="block text-sm font-medium text-gray-600 mb-1">Pilih File PDF</label>
                    <input type="file" name="pdf" id="pdf" accept="application/pdf" required
                           class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                </div>
                <div class="text-right">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold px-5 py-2 rounded-md transition-colors duration-300">
                        Upload
                    </button>
                </div>
            </form>
        </div>

        {{-- Daftar PDF --}}
        <div class="space-y-4">
            <h2 class="text-xl font-semibold text-gray-700">Daftar File PDF</h2>
            @forelse ($pdfs as $pdf)
                <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between bg-white p-4 rounded-lg shadow-md gap-4">
                    <span class="font-medium text-gray-800 break-all">{{ $pdf->nama }} <br>
                        
                    </span>
                    <div class="flex items-center space-x-2 flex-shrink-0">
                        {{-- Tombol Preview sekarang mengarah ke route 'pdf.show' --}}
                        <a href="{{ route('pdf.show', $pdf->id) }}" target="_blank"
                           class="bg-green-500 hover:bg-green-600 text-white px-3 py-2 rounded-md text-sm font-medium transition-colors duration-300">
                           Lihat
                        </a>
                        <a href="{{ route('pdf.download', $pdf->id) }}"
                           class="bg-indigo-500 hover:bg-indigo-600 text-white px-3 py-2 rounded-md text-sm font-medium transition-colors duration-300">
                           Download
                        </a>
                        <form action="{{ route('pdf.destroy', $pdf->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus PDF ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded-md text-sm font-medium transition-colors duration-300">
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="text-center bg-white p-6 rounded-lg shadow-md">
                    <p class="text-gray-500">Belum ada file PDF yang diupload.</p>
                </div>
            @endforelse
        </div>
    </div>

</body>
</html>
