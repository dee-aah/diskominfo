<x-layouts.app>

    <body>
        <section class="relative h-screen overflow-hidden pt-20"> <!-- tambahkan pt-16 untuk kompensasi navbar -->
            <div>
                <img class="absolute brightness-25  left-0 w-full h-full object-cover object-top z-0 transform-translate-y-5"
                    src="{{ asset('img/gambar4.jpg') }}" alt="">
            </div>

            <!-- Overlay -->
            <div class="absolute bg-black bg-opacity-50 z-10"></div>

            <!-- Konten Hero -->
            <div class="relative z-20 flex items-center justify-center min-h-screen text-center px-4 pt-8 pb-8">
                <div class="text-white max-w-2xl">
                    <h1 id="typewriter"
                        class="text-4xl md:text-5xl font-bold leading-normal mb-4 text-white whitespace-nowrap">Tupoksi
                    </h1>

                    <p class="text-lg mb-6">Dinas Pengendalian Penduduk, Keluarga Berencana, Pemberdayaan Perempuan, dan
                        Perlindungan Anak.</p>

                </div>
            </div>

            <!-- Wave SVG -->
            <div class="absolute bottom-0 left-0 right-0 overflow-hidden leading-[0] z-20">
                <svg class="relative block w-full h-[100px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"
                    preserveAspectRatio="none">
                    <path fill="oklch(0.982 0.018 155.826)" fill-opacity="1"
                        d="M0,128L48,154.7C96,181,192,235,288,234.7C384,235,480,181,576,149.3C672,117,768,107,864,122.7C960,139,1056,181,1152,192C1248,203,1344,181,1392,170.7L1440,160L1440,320L0,320Z">
                    </path>
                </svg>
            </div>
        </section>
        <div class="bg-green-50 justify-center max-w-7xl mx-auto  ">
            <h1 class="text-center text-2xl font-bold text-black mb-2">
                Tugas Pokok dan Fungsi Organisasi
            </h1>
            <p class="text-center text-sm text-gray-600 mb-8">
                Tugas Pokok dan Fungsi merupakan pedoman peran strategis dalam mendukung tercapainya visi organisasi.
                Setiap elemen dalam Tupoksi mencerminkan kontribusi nyata terhadap efisiensi, pelayanan, dan
                pengembangan berkelanjutan.
            </p>
            <div class="grid grid-cols-1 md:grid-cols-2 my-6 gap-6 ">
                <!-- Tugas -->
                <div class="bg-white rounded-lg py-6 shadow-md shadow-blue-500/50 text-center rounded-md">
                    <div class="flex justify-center mb-4">
                        <div class="bg-indigo-300 p-3 rounded-full">
                            <!-- Ikon tugas -->
                            <img width="35" height="35"
                                src="https://img.icons8.com/plasticine/50/resume-website.png" alt="resume-website" />
                        </div>
                    </div>
                    <h3 class="font-bold text-gray-800 text-xl underline mb-2">Tugas Pokok</h3>
                    <p class="text-sm text-gray-700 p-6">
                        Kepala Dinas mempunyai tugas pokok membantu Bupati melaksanakan urusan pemerintahan yang menjadi
                        kewenangan daerah dan tugas pembantuan di bidang Pengendalian Penduduk, Keluarga Berencana,
                        Pemberdayaan Perempuan dan Perlindungan Anak
                    </p>
                </div>

                <!-- Fungsi Utama -->
                <div class="bg-white rounded-sm py-6 shadow-md shadow-blue-500/50  text-center ">
                    <div class="flex justify-center mb-4">
                        <div class="bg-gray-400 p-3 rounded-full">
                            <!-- Ikon fungsi -->
                            <img width="35" height="35" src="https://img.icons8.com/plasticine/50/gear.png"
                                alt="gear" />
                        </div>
                    </div>
                    <h3 class="font-bold text-gray-800 text-xl underline mb-2">Fungsi Utama</h3>
                    <ol class="text-sm text-gray-700 text-left list-decimal p-6 list-inside space-y-1">
                        <li>Perumusan dan Pelaksanaan Kebijakan Daerah di bidang : Kesekretariatan, Pengendalian
                            Penduduk dan KB, Advokasi dan Bina Lini Lapangan, Pemberdayaan Perempuan dan Perlindungan
                            Anak.</li>
                        <li>Koordinasi dan Fasilitasi</li>
                        <li>Monitoring dan Evaluasi</li>
                        <li>Pembinaan terhadap UPTD dan Tenaga Penyuluh KB</li>
                        <li>Pelayanan Administrasi dan Pengelolaan Alat Kontrasepsi</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="bg-green-50 pb-8">
            <div class="bg-white rounded-md p-6 w-full shadow-md shadow-blue-500/50 max-w-screen-xl mx-auto ">
                <div class="flex flex-col items-center mb-6">
                    <!-- Ikon Folder -->
                    <img width="50" height="50" src="https://img.icons8.com/cute-clipart/50/paste.png"
                        alt="paste" />
                    <h2 class="text-xl font-bold text-gray-800 border-b border-gray-300 pb-1">Uraian Tugas</h2>
                </div>

                <!-- Grid Card Layout -->
                <div class="w-full flex justify-center">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-5xl w-full px-4 py-10">
                        <div class="bg-gradient-to-br from-blue-200 to-red-100 p-6 rounded-lg shadow border-2 border-indigo-500 hover:scale-[1.02] transition duration-300">
                            <div
                                class="flex items-center gap-3 mb-3 bg-[#476A9A] px-4 py-2 rounded-lg shadow-inner justify-center">
                                <img width="26" height="26" src="https://img.icons8.com/stickers/100/manager.png" alt="manager"/>
                                <h3 class="text-white text-lg font-bold">Kepala Dinas</h3>
                            </div>
                            <ol class="list-decimal pl-5 text-base text-gray-800 space-y-1">
                                <li>Merumuskan Kebijakan Strategis</li>
                                <li>Mengkoordinasikan Seluruh Bidang dan Sekretariat</li>
                                <li>Memberikan saran Kepada Kepala Daerah</li>
                                <li>Menyusun Laporan Pelaksanaan Tugas</li>
                            </ol>
                        </div>
                        <div
                            class="bg-gradient-to-br from-blue-200 to-red-100 p-5 rounded-lg shadow border-2 border-indigo-500 hover:scale-[1.02] transition duration-300">
                            <div
                                class="flex items-center justify-center gap-2 mb-3 bg-[#476A9A] px-4 py-2 rounded-lg shadow-inner">
                                <img width="26" height="26" src="https://img.icons8.com/fluency/48/clerk.png" alt="clerk"/>
                                <h3 class="text-white text-lg font-bold">Sekretariat</h3>
                            </div>
                            <ol class="list-decimal list-inside text-base text-gray-800 space-y-1">
                                <li>Mengelola Administrasi Umum, Kepegawaian, Keuangan dan Perencanaan</li>
                                <li>Menyusun Program Kerja dan Laporan Kegiatan</li>
                            </ol>
                        </div>

                        <div
                            class="bg-gradient-to-br from-blue-200 to-red-100 p-5 rounded-lg shadow border-2 border-indigo-500 hover:scale-[1.02] transition duration-300 ">
                            <div
                                class="flex items-center justify-center gap-2 mb-3 bg-[#476A9A] px-4 py-2 rounded-lg shadow-inner">
                                 <img width="26" height="26" src="https://img.icons8.com/external-smashingstocks-circular-smashing-stocks/65/external-population-world-population-day-smashingstocks-circular-smashing-stocks-15.png" alt="external-population-world-population-day-smashingstocks-circular-smashing-stocks-15"/>
                                <h3 class="text-white text-lg font-bold">Bidang Pengendalian Penduduk</h3>
                            </div>
                            <ol class="list-decimal list-inside text-base text-gray-800 space-y-1">
                                <li>Advokasi dan Penggerakan Masyarakat</li>
                                <li>Penyuluhan dan Pendayagunaan Petugas KB</li>
                                <li>Pengumpulan dan Analisis Data Kependudukan</li>
                            </ol>
                        </div>

                        <div
                            class="bg-gradient-to-br from-blue-200 to-red-100 p-5 rounded-lg shadow border-2 border-indigo-500 hover:scale-[1.02] transition duration-300 ">
                            <div
                                class="flex items-center justify-center gap-2 mb-3 bg-[#476A9A] px-4 py-2 rounded-lg shadow-inner">
                                 <img width="26" height="26" src="https://img.icons8.com/office/50/family.png" alt="family"/>
                                <h3 class="text-white text-lg font-bold">Bidang Keluarga Berencana</h3>
                            </div>
                            <ol class="list-decimal list-inside text-base text-gray-800 space-y-1">
                                <li>Distribusi Alat dan Obat Kontrasepsi</li>
                                <li>Jaminan Pelayanan KB</li>
                                <li>Pembinaan KB</li>
                            </ol>
                        </div>
                        <div
                            class="bg-gradient-to-br col-span-2  from-blue-200 to-red-100 p-5 rounded-lg shadow border-2 border-indigo-500 hover:scale-[1.02] transition duration-300 ">
                            <div
                                class="flex items-center justify-center gap-2 mb-3 bg-[#476A9A] px-4 py-2 rounded-lg shadow-inner">
                                <img width="26" height="26" src="https://img.icons8.com/color/48/playing-children.png" alt="playing-children"/>
                                <h3 class="text-white text-lg font-bold">Bidang Pemberdayaan Perempuan dan Perlindungan Anak
                                </h3>
                            </div>
                            <ol class="list-decimal list-inside text-base text-gray-800 space-y-1">
                                <li>Pengarusutamaan Gender dan Hak Anak</li>
                                <li>Perlindungan Perempuan dan Anak dari Kekerasan</li>
                                <li>Pembinaan Organisasi Perempuan</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </body>
</x-layouts.app>
