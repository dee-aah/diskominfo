<x-layouts.app>
    <main>
        <section class="relative h-screen overflow-hidden pt-16"> <!-- tambahkan pt-16 untuk kompensasi navbar -->
  <div><img class="absolute top-0 left-0 w-full h-full object-cover object-top z-0 transform -translate-y-5" src="gambar/bg2.jpg" alt="">
</div>

    <!-- Overlay -->
    <div class="absolute inset-0 bg-black bg-opacity-50 z-10"></div>

    <!-- Konten Hero -->
 <div class="relative z-20 flex items-center justify-center min-h-screen text-center px-4 pt-8 pb-8">
      <div class="text-white max-w-2xl">
       <h1 id="typewriter" class="text-4xl md:text-5xl font-bold leading-normal mb-4 text-white whitespace-nowrap">Profil Pimpinan</h1>

        <p class="text-lg mb-6">Dinas Pengendalian Penduduk, Keluarga Berencana, Pemberdayaan Perempuan, dan Perlindungan Anak.</p>

      </div>
    </div>

    <!-- Wave SVG -->
    <div class="absolute bottom-0 left-0 right-0 overflow-hidden leading-[0] z-20">
      <svg class="relative block w-full h-[100px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" preserveAspectRatio="none">
        <path fill="#ffffff" fill-opacity="1" d="M0,128L48,154.7C96,181,192,235,288,234.7C384,235,480,181,576,149.3C672,117,768,107,864,122.7C960,139,1056,181,1152,192C1248,203,1344,181,1392,170.7L1440,160L1440,320L0,320Z"></path>
      </svg>
    </div>
  </section>

 <div class="bg-white justify-center">
    <h2 class="text-center text-lg font-semibold text-gray-800 mb-2">
      Profil Pimpinan
    </h2>
    <p class="text-center text-sm text-gray-600 mb-8">
     Struktur organisasi ini menjadi landasan tata kerja dan koordinasi antar unit di lingkungan DPPKBP3A Kota Tasikmalaya dalam rangka mewujudkan pelayanan yang terarah, akuntabel, dan profesional.
    </p>
<div style="background-image: url('{{ asset('img/pp1.png') }}')" class="flex flex-col md:flex-row items-center justify-between  bg-cover bg-center bg-no-repeat rounded-[4rem] p-6 md:p-10 shadow-lg max-w-7xl mx-auto my-8">
  <div class="w-1/2 text-left space-y-6">
    <h2 class="text-3xl font-bold text-black">Imin Muhaemin, S.Sos, MSi</h2>
    <p class="text-2xl text-black leading-snug">
      Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor
      incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
      quis nostrum
    </p>
  </div>
  <div class="md:w-1/2 flex justify-end">
    <img src="gambar/pp.png" alt="Foto Imin" class="w-66 h-auto rounded-[6rem]" />
  </div>
</div>

<div style="background-image: url('{{ asset('img/pp2.png') }}')" class="flex flex-col md:flex-row items-center justify-between  bg-cover bg-center bg-no-repeat rounded-[4rem] p-6 md:p-10 shadow-lg max-w-7xl mx-auto my-8">
  <div class="md:w-1/2 flex justify-start mb-6 md:mb-0">
    <img src="gambar/pp2.png" alt="Foto Imin" class="w-66 h-auto rounded-[6rem]" />
  </div>
  <div class="w-full md:w-1/2 text-left space-y-4">
    <h2 class="text-2xl md:text-3xl font-bold text-black">Imin Muhaemin, S.Sos, MSi</h2>
    <p class="text-base md:text-lg text-black leading-relaxed">
      Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor
      incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
      quis nostrum.
    </p>
  </div>
</div>

<div style="background-image: url('{{ asset('img/pp1.png') }}')" class="flex flex-col md:flex-row items-center justify-between bg-cover bg-center bg-no-repeat rounded-[4rem] p-6 md:p-10 shadow-lg max-w-7xl mx-auto my-8">
  <div class="w-1/2 text-left space-y-6">
    <h2 class="text-3xl font-bold text-black">Imin Muhaemin, S.Sos, MSi</h2>
    <p class="text-2xl text-black leading-snug">
      Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor
      incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
      quis nostrum
    </p>
  </div>
  <div class="md:w-1/2 flex justify-end">
    <img src="{{asset('img/pelayanan.jpg')}}" alt="Foto Imin" class="w-66 h-auto rounded-[6rem]" />
  </div>
</div>

<div  style="background-image: url('{{ asset('img/pp2.png') }}')" class="flex flex-col md:flex-row items-center justify-between  bg-cover bg-center bg-no-repeat rounded-[4rem] p-6 md:p-10 shadow-lg max-w-7xl mx-auto my-8">
  <div class="md:w-1/2 flex justify-start mb-6 md:mb-0">
    <img src="gambar/pp2.png" alt="Foto Imin" class="w-66 h-auto rounded-[6rem]" />
  </div>
  <div class="w-full md:w-1/2 text-left space-y-4">
    <h2 class="text-2xl md:text-3xl font-bold text-black">Imin Muhaemin, S.Sos, MSi</h2>
    <p class="text-base md:text-lg text-black leading-relaxed">
      Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor
      incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
      quis nostrum.
    </p>
  </div>
</div>

@foreach ($profils as $index => $profile)
        <div class="flex flex-col md:flex-row items-center md:items-start
                    {{ $index % 2 == 0 ? 'md:flex-row-reverse' : '' }}
                    bg-gray-100 rounded-2xl shadow-md p-6 gap-6">

            <!-- Foto -->
            <div class="flex-shrink-0">
                <div class="w-40 h-40 md:w-56 md:h-56 rounded-full overflow-hidden bg-gray-200">
                    <img src="{{ asset($profile['foto']) }}"
                         alt="{{ $profile['nama'] }}"
                         class="w-full h-full object-cover">
                </div>
            </div>

            <!-- Teks -->
            <div class="text-center md:text-left flex-1">
                <h2 class="text-lg font-bold text-gray-800 mb-2">{{ $profile['nama'] }}</h2>
                <p class="text-gray-600">{{ $profile['deskripsi'] }}</p>
            </div>
        </div>
    @endforeach
</div>
<div class="w-[400px] h-[220px] rounded-3xl
              bg-gradient-to-br from-white via-gray-100 to-blue-200 shadow-xl">
  </div>">
    <!-- Foto -->
    <div class="relative w-48 h-48 flex-shrink-0">
      <div class="absolute inset-0 rounded-full bg-gradient-to-br from-gray-200 to-gray-300"></div>
      <img src="img/" alt="Hasriadi" class="relative w-full h-full object-cover rounded-full">
    </div>
    <!-- Teks -->
    <div class="mt-4 md:mt-0 md:mr-6 text-center md:text-left">
      <h2 class="text-lg font-bold text-gray-800">Hasriadi</h2>
      <p class="text-gray-600 mt-2">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed eiusmod tempor incididunt ut labore et dolore magna aliqua.
        Ut enim ad minim veniam, quis nostrum.
      </p>
    </div>
  </w->
    </main>
</x-layouts.app>
