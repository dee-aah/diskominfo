<header class="z-10 py-4 bg-white shadow-md dark:bg-gray-800">
  <div class="container flex items-center justify-between px-6 mx-auto text-purple-600 dark:text-purple-300">
    <button class="p-1 mr-5 rounded-md md:hidden focus:outline-none" @click="toggleSideMenu">
      <i class="fa fa-bars w-6 h-6"></i>
    </button>
    <input class="w-full max-w-xs px-4 py-2 text-sm bg-gray-100 border-0 rounded-md focus:bg-white" type="text" placeholder="Search for projects">
    <div class="flex items-center space-x-4">
      <button @click="toggleTheme" class="rounded-md focus:outline-none">
        <i class="fa fa-moon"></i>
      </button>
      <img class="w-8 h-8 rounded-full" src="https://i.pravatar.cc/40" alt="profile">
    </div>
  </div>
</header>
