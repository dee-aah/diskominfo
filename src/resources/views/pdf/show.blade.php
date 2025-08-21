<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Viewer PDF</title>
    <style>
        body, html { margin: 0; padding: 0; height: 100%; overflow: hidden; }
        iframe { border: none; }
    </style>
</head>
<body>
    {{-- Pastikan path ke viewer.html Anda sudah benar --}}
    <embed
        src="{{ asset('pdfjs-5.4.54-dist/web/viewer.html') }}?file={{ urlencode(route('pdf.stream', ['filename' => $pdf->path_file])) }}" type="application/pdf"
        width="100%"
        height="100%">
    </embed>
</body>
</html>
