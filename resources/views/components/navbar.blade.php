<nav id="navHamburger" class="w-56 pl-1 bg-white text-white fixed h-screen md:flex flex-col md:left-0 bg-opacity-60 backdrop-blur-sm shadow-2xl transition-all -left-56 overflow-hidden" x-data="{ isOpen: false}">
    <a href="/" class=" px-4 py-5">
        <h1 class="text-4xl font-black font-sans text-[#161D6F]">My<span class="text-[#0B2F9F] text-3xl font-black  font-sans">App</span></h1>
    </a>

    <ul class="flex flex-col mt-4 ">
        <x-navbar-link href="/dashboard" :active="request()->is('dashboard')">Dashboard</x-navbar-link>
        <x-navbar-link href="/product" :active="request()->is('product')">Products</x-navbar-link>
        <x-navbar-link href="/category" :active="request()->is('category')">Category</x-navbar-link>
        <x-navbar-link>Orders</x-navbar-link>
        <x-navbar-link>Customers</x-navbar-link>
        
    </ul>
</nav>