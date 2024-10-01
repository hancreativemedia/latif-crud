      {{-- start navbar  --}}
      <nav id="navUser" class="fixed top-0 left-0 right-0 z-20 flex justify-between items-center  px-10 py-4 bg-white border-white bg-opacity-60 backdrop-blur-sm shadow-xl transition-all ">
        <div class="absolute inset-0 bg-[#0B2F9F] bg-opacity-20 -z-10"></div> 
        <a href="/" class="">
            <h1 class="text-4xl font-black font-sans text-[#161D6F]">My<span class="text-[#0B2F9F] text-3xl font-black  font-sans">App</span></h1>
        </a>
        <div class="flex items-center">
            <form action="/" class="flex items-center flex-col sm:flex-row w-full sm:w-auto">
              <input type="search" id="search" name="search" autocomplete="off" placeholder="Search by title..." class="w-full sm:w-72 p-1.5 border border-gray-300 focus:outline-none focus:ring-1 focus:ring-blue-500 mb-4 sm:mb-0" value="{{ request('search') }}">
              <button type="submit" class="bg-white font-bold p-1.5 ml-auto border border-gray-300">
                  <img src="https://img.icons8.com/?size=100&id=59878&format=png&color=000000" alt="Search" class="w-6 h-6 ">
              </button>
            </form>
            <span class="bg-black p-0.5 h-11 ml-5 mr-0 shadow-black"></span>
            @auth
              <a href="{{ route('cart.index') }}" class="relative transition-all hover:scale-90  border-black ">
                <img src="https://img.icons8.com/?size=100&id=On3brTbr5kbp&format=png&color=000000" alt="" class="w-10 h-10 mr-3 ml-5 ">
                <span class="absolute top-0 right-0 inline-block bg-red-500 text-white rounded-full text-xs px-2">
                    {{ \App\Models\Cart::where('user_id', auth()->id())->sum('quantity') }}
                </span>
                
              </a>
              <a
                  href="{{ url('/dashboard') }}"
                  class=" px-3 py-2 text-white ring-1 ring-transparent underline "
              >
                  <img src="https://img.icons8.com/?size=100&id=85050&format=png&color=000000" alt="" class="w-10 h-10 transition-all hover:scale-90">
              </a>
            @else
              <a
                  href="{{ route('login') }}"
                  class=" px-3 py-2 border-opacity-30 border-white text-[#0B2F9F] ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white underline"
              >
                  Log in
              </a>
            @endauth
        </div>
      </nav>
    {{-- end navbar --}}