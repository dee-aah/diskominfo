<x-layouts.auth title="Register">
    <div class="p-4 flex flex-col justify-center">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <h2 class="text-2xl font-bold text-center mb-4">Register</h2>

            {{-- Name --}}
            <div class="mb-2">
                <label class="text-[14px] font-medium ">Nama</label>
                <input type="text" name="name" value="{{ old('name') }}" placeholder="Masukkan Nama"
                    class="w-full px-4 py-2 mb-2 placeholder:text-sm text-sm rounded-lg border-gray-300 border-1  focus:outline-none  focus:border-blue-300">
                @error('name') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            {{-- Email --}}
            <div class="mb-2">
                <label class="text-[14px] font-medium ">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" placeholder="Masukkan Alamat Email"
                    class="w-full px-4 py-2 mb-2 placeholder:text-sm text-sm rounded-lg border-gray-300 border-1  focus:outline-none  focus:border-blue-300">
                @error('email') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            {{-- Password --}}
            <label class="text-[14px] font-medium ">Password</label>
            <div x-data="{ show: false }" class="relative mb-2">
                <input :type="show ? 'text' : 'password'" name="password" id="password"
                    class="w-full px-4 py-2 mb-3 placeholder:text-sm text-sm rounded-lg border-gray-300 border-1  focus:outline-none  focus:border-blue-300"
                    placeholder="Masukkan Password">
                <button type="button" class="absolute right-3 top-2.5 text-gray-600" @click="show = !show" tabindex="-1">
                    {{-- Icon Hide --}}
                    <svg x-show="!show" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                    {{-- Icon Show --}}
                    <svg x-show="show" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13.875 18.825A10.05 10.05 0 0112 19c-4.477 0-8.268-2.943-9.542-7a9.958 9.958 0 013.188-4.412M6.18 6.18A9.956 9.956 0 0112 5c4.477 0 8.268 2.943 9.542 7a9.956 9.956 0 01-1.592 2.938M15 12a3 3 0 01-3 3m0 0a3 3 0 01-3-3m6 0a3 3 0 00-3-3m0 0a3 3 0 00-3 3" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3l18 18" />
                    </svg>
                </button>
                @error('password')
                    <p class="text-red-500 text-sm mb-3">{{ $message }}</p>
                @enderror
            </div>
            <label class="text-[14px] font-medium ">Konfirmasi Password</label>
            <div x-data="{ show: false }" class="relative mb-2">
                <input :type="show ? 'text' : 'password'"  name="password_confirmation" id="password"
                    class="w-full px-4 py-2 mb-3 placeholder:text-sm text-sm rounded-lg border-gray-300 border-1  focus:outline-none  focus:border-blue-300"
                    placeholder="Masukkan Password">
                <button type="button" class="absolute right-3 top-2.5 text-gray-600" @click="show = !show" tabindex="-1">
                    {{-- Icon Hide --}}
                    <svg x-show="!show" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                    {{-- Icon Show --}}
                    <svg x-show="show" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13.875 18.825A10.05 10.05 0 0112 19c-4.477 0-8.268-2.943-9.542-7a9.958 9.958 0 013.188-4.412M6.18 6.18A9.956 9.956 0 0112 5c4.477 0 8.268 2.943 9.542 7a9.956 9.956 0 01-1.592 2.938M15 12a3 3 0 01-3 3m0 0a3 3 0 01-3-3m6 0a3 3 0 00-3-3m0 0a3 3 0 00-3 3" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3l18 18" />
                    </svg>
                </button>
                @error('password')
                    <p class="text-red-500 text-sm mb-3">{{ $message }}</p>
                @enderror
            </div>


            {{-- Role --}}
            <div class="mb-2">
                <label class="text-[14px] font-medium ">Role</label>
                <select name="role" class="w-full px-4 py-2 mb-2 placeholder:text-sm text-sm rounded-lg border-gray-300 border-1  focus:outline-none  focus:border-blue-300">
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
                @error('role') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <button type="submit" class="w-full bg-[#476A9A] hover:bg-blue-600 text-sm text-medium mt-4 text-white py-2 rounded">
                Register
            </button>
        </form>
    </div>
    <div class="bg-[#476A9A] text-white flex flex-col justify-center items-center p-8">
        <div class="flex items-center">
            <img src="{{ asset('img/Logo_Kota_Tasikmalaya.png') }}" alt="Logo" class="h-45">
        </div>
        <h2 class="text-2xl font-bold mt-4">Selamat Datang Di DPPKBP3A</h2>
        <h2 class="text-2xl font-bold mb-4">Kota Tasikmalaya</h2>
        <p class=" text-center">Daftarkan Data Diri Anda</p>
        <a href="{{ route('login') }}"
            class="  py-2 px-6 text-sm font-medium hover:text-blue-300 transition">
            SIGN IN
        </a>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const flash = document.getElementById('flash-message');
            if (flash) {
                setTimeout(() => {
                    flash.style.transition = 'opacity 0.5s ease';
                    flash.style.opacity = '0';
                    setTimeout(() => flash.remove(), 500);
                }, 3000);
            }
        });
    </script>
</x-layouts.auth>
