<x-layouts.app>
        <section class=" relative h-80 sm:h-screen md:h-screen overflow-hidden pt-20 "> <!-- tambahkan pt-16 untuk kompensasi navbar -->
        <div>
            <img class="absolute brightness-50   sm:object-top left-0 w-full h-full object-cover object-top z-0 transform-translate-y-5"
                src="{{asset('storage/konten/' . $konten->img) }}" alt="">
        </div>
        <!-- Overlay -->
        <div class="absolute  bg-black bg-opacity-50 z-10"></div>
        <!-- Konten Hero -->
        <div class="relative z-20 flex items-center justify-center sm:min-h-screen text-center px-4 sm:pt-5 md:pt-5 pt-8 pb-8">
            <div class="text-white sm:max-w-2xl sm:mt-5 md:mt-5 mt-8 mx-auto">
                <h1 id="typewriter" class="text-lg sm:text-5xl font-bold leading-normal mb-4 text-white whitespace-nowrap">Tupoksi
                </h1>
                <p class="text-xs sm:text-lg md:text-lg sm:mb-6 mb-6">Dinas Pengendalian Penduduk, Keluarga Berencana, Pemberdayaan Perempuan, dan
                    Perlindungan Anak.</p>
            </div>
        </div>
        <!-- Wave SVG -->
        <div class="absolute bottom-0 left-0 right-0 overflow-hidden leading-[0] z-20">
            <svg class="relative block w-full h-[100px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"
                preserveAspectRatio="none">
                <path fill="#ffffff" fill-opacity="1"
                    d="M0,128L48,154.7C96,181,192,235,288,234.7C384,235,480,181,576,149.3C672,117,768,107,864,122.7C960,139,1056,181,1152,192C1248,203,1344,181,1392,170.7L1440,160L1440,320L0,320Z">
                </path>
            </svg>
        </div>
    </section>
        <div class="bg-white justify-center max-w-6xl mt-10 mx-auto   ">
            <div class="grid grid-cols-1 sm:mx-0 mx-5 md:grid-cols-2 my-6 gap-6 ">
                <!-- Tugas -->
                <div class="bg-white rounded-3xl p-4 md:p-6 sm:p-5 text-center rounded-xl border-2 border-indigo-500 text-center ">
                    <div class="flex justify-center mb-4">                  
                            <!-- Ikon tugas -->
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADwAAAA8CAYAAAA6/NlyAAAACXBIWXMAAAsTAAALEwEAmpwYAAABbklEQVR4nO3awUrDQBAG4JnnUM++jujBiy+oFLxIfR+9dMZUrJCyo8JKJGAPWTAxyWw3/w97Gtj0I9udoZQIQZDFZL+lM1NeBeF3U46TLeHnsKELd2wQ3k4KPVhB+NOUrt3ApryaC5sFOkx9jH+RH1mgbba3Spcd6C/b0E2RYPo5TRmgbUZwFmibGeyONgewK9qcwG5ocwS7oM0Z3KKvuvr0JGOozQSuKzrtizbhp6MFm/B6CPp4wTr+V2FQvEEAK8DjxjJAAawAjxfLAJUXWPihruikGRqa4SFV7/vc5H7e4PpgOmp/zk3W+6ZrP4AdjvS6QbUf7jFV7/vc5H7uYF3apaUAR4C1JLCgD8dUvYi2VC8NbOjDXPilpQBHgLUksKAPx1S9iLZULw1s6MNc+KWlAEeAFeAIsGYCDjP9uXTICsJvo4NN+T5j8O3o4PBC50H4NTuscvWfKe4vU89dEN65Q4V3zZudDIsgCOWYb5Q7BMVPorQmAAAAAElFTkSuQmCC" 
                        alt="google-forms"
                        class="w-10 h-10 sm:w-12 sm:h-12 md:w-16 md:h-16 object-contain">                     
                    </div>
                    <h2 class="font-bold text-gray-800 text-lg sm:text-lg md:text-xl underline mb-2">Tugas Pokok</h3>
                    <div class="text-sm sm:text-lg md:text-xl text-gray-700 text-justify prose p-2 sm:p-4 md:p-6"> {!! $tupoksi->tugas !!}
                    </div>
                </div>

                <!-- Fungsi Utama -->
                <div class="bg-white  p-6 text-center rounded-3xl border-2 border-indigo-500 text-center ">
                    <div class="flex justify-center mb-4">
                            <!-- Ikon fungsi -->
                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAAACXBIWXMAAAsTAAALEwEAmpwYAAAB3UlEQVR4nO2aQU4CQRBF3xJPIN5JxY3GeBejcSugh4DNnELxJuoNumZHMqajJhMiREL1/Ibpn3TCAur9+cwMTU1BUVHROjVwVMOFwdhgblD9c8X3jmsYNTAggQyGBlOD5/jaHRDgJsCnQbPLijUCXHv7M1i0OAvX4gEedj3wP4K4d/a4bNVeeha+8T74ltErL5+rtd2u+eBw2m8I4MPrnpAkgPr7htekXDWcZRuAwSR1AAEecw5gnjoAg1nOAVQdBFA5eS0BWAmAwwrA4MTgrb3J8Vo/NRcbt82mD+CpA/4k5wCmfQ9gGE/ThJfAa4DjbAPYRqt1cSpalQDodwDzvm+Fx73+M1TDqIMz4DTbABoYJG6IvGfdEImKDcyEAVzipGQBRBncJQjgln1oiv4qNjBjD8/jtPf85te0xV9IoQYGNZzHO3f8+driwcgsfib2/zp4MDLZuL0tKioqKiraz/mARskP4vkAKT+I5wOk/CCeD5DyG/F8gJqPej5AzUc9H6Dmo26Kqvmo2+JqPmoDaj5qA2o+agNqPmoDaj5qA2o+agNqPmoDaj5qA2o+agNqPuqtqJqPej5AzUc9H6Dmo54PUPOzmA9Q87OYD1Dzs5gPUPOzmA9Q84uKOHx9AcQudyVAnFQAAAAAAElFTkSuQmCC" 
                            alt="external-application-ui-basic-anggara-glyph-anggara-putra"
                            class="w-10 h-10 sm:w-12 sm:h-12 md:w-16 md:h-16 object-contain">
                    </div>
                    <h2 class="font-bold text-gray-800 text-lg sm:text-lg md:text-xl underline mb-2">Fungsi Utama</h3>
                    <div class="text-sm sm:text-lg md:text-xl text-gray-700 text-justify prose p-2 sm:p-4 md:p-6">
                        {!!$tupoksi->fungsi!!}
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white max-w-6xl mx-auto my-8">
            <div class="w-93 md:w-full border-2 rounded-3xl  mx-auto border-black flex justify-center">
                <div class="flex flex-col items-center my-10">
                    <!-- Ikon Folder -->
                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEgAAABICAYAAABV7bNHAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAr0lEQVR4nO3QsW0DQRAEwTeVEU2GJnsyYiw8g6GMYhDwBywP1UAnUNclSZIk/adHVu/7/Xr+fn6uk7oXaJ2HdD/QOgtpD9A6B2kf0DoDaS/Q+n6k/UBr1IACqIACqIAyc0ABVEABVECZOaAAKqAAKqDMHFAAFVAAFVBmDiiACiiACigzBxRABRRABZSZAwqgAgqgAsrMAQVQAQVQAWXmgAKogAKoXwMkSZIkSbp29QcDtNlBG1FNqwAAAABJRU5ErkJggg==" 
                    alt="folder-invoices"
                    class="w-10 h-10 sm:w-12 sm:h-12 md:w-16 md:h-16 object-contain">
                    <h2 class="font-bold text-gray-800 text-lg sm:text-lg md:text-xl underline mb-2">Uraian Tugas</h2>
                
                <!-- Grid Card Layout -->
                
                    <div class="grid grid-cols-1 p-5 md:grid-cols-2 gap-6 max-w-5xl w-full   py-1">
                        @foreach ($uraians as $item) 
                        <div class="bg-white p-6 rounded-3xl  border-2 border-indigo-500 hover:scale-[1.02] transition duration-300">                                          
                                <div class="flex items-center gap-3 mb-3 bg-[#476A9A] px-4 py-2 rounded-lg shadow-inner justify-center">
                                    <h3 class="text-white text-lg mx-auto text-center font-bold">{{ $item->bidang }}</h3>
                                </div>
                                <div class=" py-5 text-base prose text-gray-800 space-y-1">
                                    {!!$item->uraian!!}
                                </div>
                        </div>                             
                        @endforeach
                        
                    </div>
                </div>
            </div>
        </div>
        </div>
    </body>
</x-layouts.app>
