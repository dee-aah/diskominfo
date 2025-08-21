<?php

namespace App\Http\Controllers;

use App\Models\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PdfController extends Controller
{
    // Menampilkan daftar PDF
    public function index()
    {
        $pdfs = Pdf::latest()->get();
        return view('pdf.index', compact('pdfs'));
    }

    // Simpan PDF baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'pdf'  => 'required|mimes:pdf|max:10240', // max 10MB
        ]);

        // Simpan file ke storage/app/public/pdfs
        $path = $request->file('pdf')->store('pdfs', 'public');

        Pdf::create([
            'nama' => $request->nama,
            'path_file' => $path,
        ]);

        return redirect()->route('pdf.index')->with('success', 'PDF berhasil diupload.');
    }

    // Preview / Tampilkan PDF
    public function show($id)
    {
        $pdf = Pdf::findOrFail($id);
        $path = storage_path('app/public/' . $pdf->path_file);

        if (!file_exists($path)) {
            return redirect()->route('pdf.index')->withErrors('File tidak ditemukan.');
        }

        return response()->file($path, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . $pdf->nama . '.pdf"'
        ]);
    }

    // Download PDF
    public function download($id)
    {
        $pdf = Pdf::findOrFail($id);
        $path = storage_path('app/public/' . $pdf->path_file);

        if (!file_exists($path)) {
            return redirect()->route('pdf.index')->withErrors('File tidak ditemukan.');
        }

        return response()->download($path, $pdf->nama . '.pdf');
    }

    // Hapus PDF
    public function destroy($id)
    {
        $pdf = Pdf::findOrFail($id);

        // Hapus file dari storage
        if (Storage::disk('public')->exists($pdf->path_file)) {
            Storage::disk('public')->delete($pdf->path_file);
        }

        $pdf->delete();

        return redirect()->route('pdf.index')->with('success', 'PDF berhasil dihapus.');
    }
}
