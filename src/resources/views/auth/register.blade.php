<x-layouts.auth title="Register">
    <!-- Left Panel (Register Form) -->
<body>
    <div class="p-8 flex flex-col justify-center">
        @if (session('success'))
    <div id="flash-message"  class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

       <form action="{{ route('register.store') }}" method="POST">
    @csrf

    <h2 class="text-2xl text-center font-bold text-gray-800 mb-4">Registrasi</h2>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded mb-4">
            <ul class="list-disc list-inside text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

            <div class="mb-3">
                <p class="text-1xl font-bold text-gray-800 mt-2">Nama</p>
                <input type="text" name="name" placeholder=" Masukkan Nama"
                    class="w-full px-4 py-2 mb-3 border rounded">

            </div>
            <div class="mb-3">
                <p class="text-1xl font-bold text-gray-800 mt-2">Alamat Email</p>
                <input type="email" name="email" placeholder="Masukkan Alamat Email"
                    class="w-full px-4 py-2 mb-3 border rounded">

            </div>
            <p class="text-1xl font-bold text-gray-800 mt-3">Password</p>
            <div x-data="{ show: false }" class="relative mb-3">
                <input :type="show ? 'text' : 'password'" name="password" id="password"
                    class="w-full border rounded px-4 py-2 pr-10 focus:outline-none focus:ring"
                    placeholder="Masukkan password">
                <button type="button" class="absolute right-3 top-2.5 text-gray-600" @click="show = !show"
                    tabindex="-1">
                    <svg x-show="!show" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                    <svg x-show="show" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13.875 18.825A10.05 10.05 0 0112 19c-4.477 0-8.268-2.943-9.542-7a9.958 9.958 0 013.188-4.412M6.18 6.18A9.956 9.956 0 0112 5c4.477 0 8.268 2.943 9.542 7a9.956 9.956 0 01-1.592 2.938M15 12a3 3 0 01-3 3m0 0a3 3 0 01-3-3m6 0a3 3 0 00-3-3m0 0a3 3 0 00-3 3" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3l18 18" />
                    </svg>
                </button>
            </div>
            <p class="text-1xl font-bold text-gray-800 mt-3">Konfirmasi Password</p>
            <div x-data="{ show: false }" class="relative mb-4">

                <input :type="show ? 'text' : 'password'" name="password_confirmation" id="password"
                    class="w-full border rounded px-4 py-2 pr-10 focus:outline-none focus:ring"
                    placeholder="Konfirmasi Password">
                <button type="button" class="absolute right-3 top-2.5 text-gray-600" @click="show = !show"
                    tabindex="-1">
                    <svg x-show="!show" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                    <svg x-show="show" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13.875 18.825A10.05 10.05 0 0112 19c-4.477 0-8.268-2.943-9.542-7a9.958 9.958 0 013.188-4.412M6.18 6.18A9.956 9.956 0 0112 5c4.477 0 8.268 2.943 9.542 7a9.956 9.956 0 01-1.592 2.938M15 12a3 3 0 01-3 3m0 0a3 3 0 01-3-3m6 0a3 3 0 00-3-3m0 0a3 3 0 00-3 3" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3l18 18" />
                    </svg>
                </button>

            </div>
            <button type="submit"
                class="w-full my-6 bg-[#476A9A]  text-white font-bold py-2 rounded">Registrasi</button>
        </form>
    </div>

    <!-- Right Panel (Login Prompt) -->
    <div class="bg-[#476A9A] text-white flex flex-col justify-center items-center p-8">
        <div class="flex items-center">
            <img src="{{ asset('img/Logo_Kota_Tasikmalaya.png') }}" alt="Logo" class="h-45 ">
        </div>
        <h2 class="text-2xl font-bold mt-4">Selamat Datang Di DPPKBP3A</h2>
        <h2 class="text-2xl font-bold mb-4">Kota Tasikmalaya</h2>
        <p class="mb-6 text-center">Silakan Masuk Dengan Akun Anda</p>
        <a href="{{ url('/login') }}" class="border border-white py-2 px-6 rounded hover:bg-white hover:text-green-500 transition">Login</a>
    </div>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const flash = document.getElementById('flash-message');
        if (flash) {
            setTimeout(() => {
                flash.style.transition = 'opacity 0.5s ease';
                flash.style.opacity = '0';
                setTimeout(() => {
                    flash.remove();
                }, 500); // tunggu animasi selesai sebelum dihapus
            }, 3000); // tunggu 3 detik
        }
    });
</script>
</body>
</x-layouts.auth>
