<x-layouts.app>
    <body class="bg-blue-50">
        <!-- Hero Section -->
        <section class="relative h-screen overflow-hidden pt-16 ">
            <video autoplay muted loop playsinline
                class="brightness-50 absolute top-0 left-0 w-full h-full object-cover z-0 pointer-events-none">
                <source src="{{ asset('video/tasik1.mp4') }}" type="video/mp4" />
                Your browser does not support the video tag.
            </video>
            <div class="absolute bg-black bg-opacity-50 z-10"></div>

            <!-- Konten Hero -->
            <div class="relative z-20 flex items-center justify-center min-h-screen text-center px-4 pt-8 pb-8">
                <div class="text-white max-w-2xl">
                    <h1 id="typewriter"
                        class="text-4xl md:text-5xl font-bold leading-normal mb-4 text-white whitespace-nowrap overflow-hidden typewriter">
                    </h1>
                    <p class="text-lg mb-6">Dinas Pengendalian Penduduk, Keluarga Berencana, Pemberdayaan Perempuan, dan
                        Perlindungan Anak.</p>
                    <a href="#container1"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-full transition">Lihat Layanan
                        Kami</a>
                </div>
            </div>
            <!-- Wave SVG -->
            <div class="absolute bottom-0 left-0 right-0  overflow-hidden leading-[0] z-20">
                <svg class="relative block w-full h-[100px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"
                    preserveAspectRatio="none">
                    <path fill="oklch(0.982 0.018 155.826)" fill-opacity="1"
                        d="M0,128L48,154.7C96,181,192,235,288,234.7C384,235,480,181,576,149.3C672,117,768,107,864,122.7C960,139,1056,181,1152,192C1248,203,1344,181,1392,170.7L1440,160L1440,320L0,320Z">
                    </path>
                </svg>
            </div>
        </section>

        <!-- Fitur, CTA, dst. -->
        <!-- Wave SVG -->
        <div class="absolute bottom-0 left-0 right-0 overflow-hidden leading-[0]">
            <svg class="relative block w-full h-[100px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"
                preserveAspectRatio="none">
                <path fill="oklch(0.982 0.018 155.826)" fill-opacity="1" d="M0,128L48,154.7C96,181,192,235,288,234.7C384,235,480,181,576,149.3C672,117,768,107,864,122.7C960,139,1056,181,1152,192C1248,203,1344,181,1392,170.7L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
                </path>
            </svg>
        </div>
        </section>

        <div class="min-h-screen flex items-center justify-center px-6 py-12">
            <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-8 items-center">

                <!-- Gambar Kiri -->
                <div class="flex justify-center">
                    <img src="{{ asset('img/gambar.jpg') }}"alt="Energizing You"
                        class="border-2 border-sky-500 rounded-sm">
                </div>

                <!-- Konten Teks Kanan -->
                <div>
                    <p class="text-sm font-semibold text-blue-600 uppercase tracking-wide mb-2">
                        DPPKBP3A
                    </p>
                    <h1 class="text-2xl md:text-4xl font-bold mb-4">
                        Dinas Pengendalian Penduduk, Keluarga Berencana, Pemberdayaan Perempuan, dan Perlindungan Anak.
                    </h1>
                    <p class="text-base md:text-lg text-gray-700 mb-6 leading-relaxed">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus distinctio sint ex cum
                        minus explicabo aliquid dolorem doloribus porro fugit in, ipsam cupiditate esse! Inventore nulla
                        nemo, pariatur magnam modi sequi sint in nam rem, iste ut? Iure accusantium suscipit ab
                        architecto, exercitationem asperiores quisquam iste, odit esse assumenda rerum itaque vitae vel
                        aliquam optio harum veritatis repudiandae earum aspernatur perferendis porro corrupti obcaecati?
                        Inventore accusantium minima, nemo quas pariatur .
                    </p>
                    <a href="#"
                        class="inline-flex items-center px-6 py-2 border border-black text-black rounded-full hover:bg-blue-100 hover:text-black transition">
                        Selengkapnya
                        <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>

            </div>
        </div>

        <section class="bg-gray-100 py-10">
            <div id="container1"></div>
            <div class="text-center mb-6">
                <h2 class="text-2xl font-bold">Layanan Utama</h2>
                <div class="h-1 w-16 bg-blue-500 mx-auto mt-2 rounded"></div>
                <p class="text-gray-600 mt-2 text-sm">Dapatkan pelayanan kami melalui menu di bawah yang tersedia di
                    DPPKBP3A</p>
            </div>

            <div id="carousel" data-bg="{{ asset('img/gambar2.jpg') }}"
                class="relative bg-transition h-screen flex items-center justify-start px-10"style=" background-size: cover; background-position: center;">
                <!-- Slide Area -->
                <div class="relative w-full max-w-screen-xl flex items-center overflow-hidden">
                    <div id="slideWrapper" class="flex space-x-6 transition-transform duration-500 ease-in-out">

                        <!-- Card 1 -->
                        <div id="card-0" class="min-w-[300px] max-w-md p-6 rounded-lg shadow-lg">
                            <a href="">
                                <h2 class="text-2xl font-bold mb-2">Standar Pelayanan</h2>
                                <div class="h-[2px] w-10 bg-white mb-4"></div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi maxime repellendus
                                    perspiciatis iusto non ex, voluptatem ea excepturi distinctio dignissimos dolorem,
                                    placeat nostrum a atque facere rerum corporis hic cupiditate!</p>
                                <div class="mt-4 text-right text-xl">↗</div>
                            </a>
                        </div>

                        <!-- Card 2 -->
                        <div id="card-1" class="min-w-[300px] max-w-md p-6 rounded-lg shadow-lg">
                            <a href="">
                                <h2 class="text-2xl font-bold mb-2">IKM</h2>
                                <div class="h-[2px] w-10 bg-white mb-4"></div>
                                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Accusamus aliquam officiis
                                    amet, fuga dolor sint nisi, aut quod at ad debitis dolores repellendus, in nesciunt
                                    sequi provident cumque explicabo quas?</p>
                                <div class="mt-4 text-right text-xl">↗</div>
                            </a>
                        </div>

                        <!-- Card 3 -->
                        <div id="card-2" class="min-w-[300px] max-w-md p-6 rounded-lg shadow-lg">
                            <a href="">
                                <h2 class="text-2xl font-bold mb-2">PPID</h2>
                                <div class="h-[2px] w-10 bg-white mb-4"></div>
                                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Odit aut vero voluptatum
                                    cumque consectetur? Dicta vero deleniti accusamus eaque laboriosam vitae aut quos
                                    modi, nam ratione? Consectetur iste consequatur error.</p>
                                <div class="mt-4 text-right text-xl">↗</div>
                            </a>
                        </div>
                        <div id="card-2" class="min-w-[300px] max-w-md p-6 rounded-lg shadow-lg">
                            <a href="">
                                <h2 class="text-2xl font-bold mb-2">SP4N Lapor</h2>
                                <div class="h-[2px] w-10 bg-white mb-4"></div>
                                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Corporis iste consequatur
                                    ab voluptates, deleniti ipsa, dolores, quidem corrupti porro non consectetur. Esse,
                                    quas consequatur veniam laudantium temporibus nulla aperiam hic!</p>
                                <div class="mt-4 text-right text-xl">↗</div>
                            </a>
                        </div>
                        <div id="card-2" class="min-w-[300px] max-w-md p-6 rounded-lg shadow-lg">
                            <a href="">
                                <h2 class="text-2xl font-bold mb-2">Informasi Layanan</h2>
                                <div class="h-[2px] w-10 bg-white mb-4"></div>
                                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vel mollitia repellat,
                                    earum ad at amet perferendis dolores sed totam molestiae illum assumenda ipsa
                                    consectetur voluptatum rem. Nesciunt sed culpa doloremque.</p>
                                <div class="mt-4 text-right text-xl">↗</div>
                            </a>
                        </div>

                    </div>
                </div>

                <!-- Nav Buttons -->
                <div class="absolute bottom-10 right-10 flex space-x-3">
                    <button onclick="prevSlide()" class="bg-white p-2 rounded-full shadow hover:bg-gray-200">←</button>
                    <button onclick="nextSlide()" class="bg-white p-2 rounded-full shadow hover:bg-gray-200">→</button>
                </div>
            </div>
        </section>

        <section class="max-w-7xl mx-auto px-6 py-10">
            <h2 class="text-2xl font-semibold mb-6">Ringkasan Data Kependudukan</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-4">
                <!-- Card Template -->
                <!-- Repeat untuk setiap data dengan gaya seragam -->
                <div class="bg-white rounded-lg shadow p-5 text-center">
                    <p class="text-gray-500 text-sm mb-2">Total Penduduk</p>
                    <p class="text-2xl font-bold">2.847 <span class="text-lg">Juta</span></p>
                    <p class="text-green-600 text-sm">Jiwa terdaftar</p>
                </div>
                <div class="bg-white rounded-lg shadow p-5 text-center">
                    <p class="text-gray-500 text-sm mb-2">Angka Kelahiran</p>
                    <p class="text-2xl font-bold">2.28<span class="text-lg">%</span></p>
                    <p class="text-gray-500 text-sm">Per 1000 penduduk</p>
                </div>
                <div class="bg-white rounded-lg shadow p-5 text-center">
                    <p class="text-gray-500 text-sm mb-2">Rasio Jenis Kelamin</p>
                    <p class="text-2xl font-bold">101,20</p>
                    <p class="text-gray-500 text-sm">Laki-laki per 100 perempuan</p>
                </div>
                <div class="bg-white rounded-lg shadow p-5 text-center">
                    <p class="text-gray-500 text-sm mb-2">Partisipasi Perempuan</p>
                    <p class="text-2xl font-bold">34.5<span class="text-lg">%</span></p>
                    <p class="text-green-600 text-sm">Dalam angkatan kerja</p>
                </div>
                <div class="bg-white rounded-lg shadow p-5 text-center">
                    <p class="text-gray-500 text-sm mb-2">Kasus Kekerasan Anak</p>
                    <p class="text-2xl font-bold">234</p>
                    <p class="text-red-600 text-sm">Kasus per tahun</p>
                </div>
                <div class="bg-white rounded-lg shadow p-5 text-center">
                    <p class="text-gray-500 text-sm mb-2">Peserta KB</p>
                    <p class="text-2xl font-bold">187.252 <span class="text-lg">Ribu</span></p>
                    <p class="text-green-600 text-sm">Akseptor aktif</p>
                </div>
            </div>
            <div class="p-5 ">
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Obcaecati, nobis ipsam molestias quaerat
                veritatis dolores at veniam tempore fugiat rerum nesciunt ex accusamus nam dolor vitae molestiae totam
                nostrum reprehenderit.
            </div>

            <!-- Kanan -->
            <div class="flex-shrink-0 l p-2">
                <a href="data.html"
                    class="inline-flex items-center px-4 py-2 border border-gray-400 text-sm font-medium rounded-full hover:bg-[#476A9A] hover:text-white transition">
                    Selengkapnya
                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>
            <div
                class="max-w-6xl mx-auto flex flex-col md:flex-row items-start md:items-center justify-between space-y-4 md:space-y-0 md:space-x-6">



                <!-- Tengah -->


            </div>
        </section>

        <div class="text-center mb-6">
            <h2 class="text-2xl font-bold">Tentang kami</h2>
            <div class="h-1 w-16 bg-blue-500 mx-auto mt-2 rounded"></div>
            <p class="text-gray-600 mt-2 text-sm">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia sit
                possimus adipisci vel, expedita a, veniam rem amet et quisquam sapiente, nisi reprehenderit! Quidem quod
                aliquid aspernatur perspiciatis perferendis repellat.</p>
        </div>
        <section class="relative bg-cover bg-center min-h-screen flex items-center" style="background-image: url('{{ asset('img/gambar1.jpg') }}') "  >
            <!-- Overlay gelap -->
            <div class="absolute inset-0 bg-black/50"></div>
            <!-- Konten -->
            <div class="relative z-10 w-full px-6 md:px-16 lg:px-24">
                <div class="max-w-xl text-left text-white space-y-4">
                    <p class="text-sm font-semibold uppercase tracking-wider text-gray-200">Sekilas DPPKBP3A</p>
                    <h2 class="text-4xl font-bold">Tentang Kami</h2>
                    <p class="text-lg text-gray-200">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt eum laudantium velit vitae
                        aliquam vel eius eaque, numquam voluptas aut odio delectus explicabo facere? Officiis nemo sequi
                        cum quo? Cum, asperiores ratione. Delectus repudiandae tempore quis ipsa doloribus optio
                        voluptatum, nihil recusandae dolorum cumque accusamus a, reprehenderit dicta eius mollitia sint
                        eos totam fugit libero error. Adipisci sit culpa, quae iure eligendi assumenda a possimus at,
                        cupiditate, dolores optio facilis recusandae corrupti deserunt eaque in temporibus!
                    </p>
                    <div class="flex flex-wrap gap-4 pt-4">
                        <a href="#"
                            class="inline-flex items-center px-6 py-2 border border-white text-white rounded-full hover:bg-white hover:text-black transition">
                            Selengkapnya
                            <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                        <a href="profil.html"
                            class="inline-flex items-center px-6 py-2 border border-white text-white rounded-full hover:bg-white hover:text-black transition">
                            Direksi dan Komisaris
                            <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <div class="max-w-7xl mx-auto p-6">
            <h1 class="text-3xl font-bold text-center text-gray-800 mb-2">Berita & Informasi Terkini</h1>
            <p class="text-center text-gray-600 mb-10">
                Dapatkan informasi terbaru mengenai program, kegiatan, dan perkembangan terkini dari DPPKBP3A
            </p>

            <div class="grid md:grid-cols-3 gap-6">
                <!-- Berita Utama -->
                <div class="md:col-span-2 bg-white rounded-lg shadow overflow-hidden">
                    <div class="relative">
                        <img src="bg1.jpg" alt="Gambar Berita" class="w-full h-64 object-cover">
                        <div class="absolute bottom-4 left-4">
                            <span class="bg-blue-100 text-blue-800 text-xs px-3 py-1 rounded">Berita</span>
                        </div>
                    </div>
                    <div class="p-4">
                        <h2 class="text-lg font-semibold text-gray-800 mb-2">
                            Program Pemberdayaan Perempuan UMKM Raih Penghargaan Nasional
                        </h2>
                        <p class="text-sm text-gray-600 mb-4">
                            DPPKBP3A berhasil meraih penghargaan dari Kementerian Pemberdayaan Perempuan dan
                            Perlindungan Anak atas program unggulan pemberdayaan perempuan di sektor UMKM.
                        </p>
                        <div class="flex justify-between items-center text-sm text-gray-500 mb-4">
                            <div class="flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M8 7V3m8 4V3M3 11h18M5 19h14M12 15v2" />
                                </svg>
                                <span>15 Januari 2024</span>
                            </div>
                            <div class="flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M5.121 17.804A10.002 10.002 0 0112 2a10 10 0 016.879 15.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <span>Admin DPPKBP3A</span>
                            </div>
                        </div>
                        <a href="#"
                            class="inline-flex items-center justify-center w-full px-6 py-2 bg-[#476A9A] text-white text-sm rounded hover:bg-blue-800 transition">
                            Baca Selengkapnya
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Konten Samping -->
                <div class="space-y-4">
                    <!-- Kartu 1 -->
                    <div class="bg-white rounded-lg shadow p-4">
                        <div class="flex justify-between text-xs text-gray-500 mb-1">
                            <span class="bg-gray-200 text-gray-700 px-2 py-0.5 rounded">Program</span>
                            <span>12 Januari 2024</span>
                        </div>
                        <h3 class="font-semibold text-sm text-gray-800 mb-1">
                            Sosialisasi Perlindungan Anak di Era Digital
                        </h3>
                        <p class="text-sm text-gray-600 mb-2">
                            Workshop edukasi untuk orang tua dan pendidik mengenai cara melindungi anak dari bahaya
                            digital dan cyber bullying.
                        </p>
                        <a href="#"
                            class="text-blue-700 text-sm inline-flex items-center gap-1 hover:underline">
                            Baca Selengkapnya <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>

                    <!-- Kartu 2 -->
                    <div class="bg-white rounded-lg shadow p-4">
                        <div class="flex justify-between text-xs text-gray-500 mb-1">
                            <span class="bg-gray-200 text-gray-700 px-2 py-0.5 rounded">Laporan</span>
                            <span>10 Januari 2024</span>
                        </div>
                        <h3 class="font-semibold text-sm text-gray-800 mb-1">
                            Hasil Survey IKM Triwulan IV 2023
                        </h3>
                        <p class="text-sm text-gray-600 mb-2">
                            Indeks Kepuasan Masyarakat terhadap pelayanan DPPKBP3A mencapai 89.5%, meningkat 5% dari
                            triwulan sebelumnya.
                        </p>
                        <a href="#"
                            class="text-blue-700 text-sm inline-flex items-center gap-1 hover:underline">
                            Baca Selengkapnya <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>

                    <!-- CTA Update -->
                    <div class="bg-white rounded-lg shadow p-4 text-center">
                        <p class="text-sm text-gray-700 mb-3">Ikuti terus informasi dan program terbaru dari DPPKBP3A
                        </p>
                        <a href="#"
                            class="inline-flex items-center justify-center px-6 py-2 bg-[#476A9A] text-white rounded hover:bg-blue-800 transition">
                            Lihat Semua Berita
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script>
        const text = "Selamat Datang di DPPKBP3A";
        const element = document.getElementById("typewriter");

        let index = 0;
        let isDeleting = false;

        function typeEffect() {
            if (!isDeleting) {
                element.textContent = text.substring(0, index + 1);
                index++;
                if (index === text.length) {
                    isDeleting = false;
                    setTimeout(typeEffect, 1500); // jeda saat selesai mengetik
                    return;
                }
            } else {
                element.textContent = text.substring(0, index - 1);
                index--;
                if (index === 0) {
                    isDeleting = false;
                }
            }
            setTimeout(typeEffect, isDeleting ? 50 : 100); // kecepatan ketik/hapus
        }

        typeEffect();

        const backgrounds = ["gambar.jpg", "gambar1.jpg", "gambar2.jpg", "gambar3.jpg", "gambar3.jpg"];
        const cards = document.querySelectorAll('#slideWrapper > div');
        const carousel = document.getElementById('carousel');
        const slideWrapper = document.getElementById('slideWrapper');
        let currentIndex = 0;

        function updateView() {
            // Update background
            carousel.style.backgroundImage = `url('/img/${backgrounds[currentIndex]}')`;


            // Update card colors
            cards.forEach((card, index) => {
                if (index === currentIndex) {
                    card.classList.remove("bg-white", "text-black", "bg-gray-100", "text-gray-700");
                    card.classList.add("bg-blue-700", "text-white");
                } else {
                    card.classList.remove("bg-blue-700", "text-white");
                    card.classList.add("bg-white", "text-black");
                }
            });

            // Move slideWrapper
            slideWrapper.style.transform = `translateX(-${currentIndex * 320}px)`;
        }

        function nextSlide() {
            if (currentIndex < cards.length - 1) {
                currentIndex++;
                updateView();
            }
        }

        function prevSlide() {
            if (currentIndex > 0) {
                currentIndex--;
                updateView();
            }
        }

        // Init on load
        updateView();
    </script>
</x-layouts.app>
