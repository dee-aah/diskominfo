<aside class="w-64 min-h-screen pt-20 bg-white shadow">
    <nav class="flex flex-col gap-4 px-4">
        <a href="{{ route('dashboard') }}" class="flex items-center gap-2 text-blue-600"><i class="bi bi-house-fill"></i> Beranda</a>
        <a href="/anggota" class="flex items-center gap-2"><i class="bi bi-people-fill"></i> Berita</a>
        <a href="/kegiatan" class="flex items-center gap-2"><i class="bi bi-calendar-event-fill"></i> Artikel</a>
        <a href="/keuangan" class="flex items-center gap-2"><i class="bi bi-cash-stack"></i> Keuangan</a>
        <a href="/laporan" class="flex items-center gap-2"><i class="bi bi-file-earmark-text-fill"></i> Laporan Bulanan</a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="flex items-center gap-2 text-red-500"><i class="bi bi-box-arrow-right"></i> Logout</button>
        </form>
    </nav>
</aside>
