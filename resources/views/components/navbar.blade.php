<nav class="w-56 pl-1 bg-gray-800 text-white flex flex-col " x-data="{ isOpen: false}">
    <div class="px-4 py-5 ">
        <h1 class="text-4xl font-semibold tracking-wider">My<span class="text-blue-500">App</span></h1>
    </div>

    <ul class="flex flex-col mt-4 ">
        <x-navbar-link>Dashboard</x-navbar-link>
        <x-navbar-link href="/product" :active="request()->is('product')">Products</x-navbar-link>
        <x-navbar-link>Category</x-navbar-link>
        <x-navbar-link>Customers</x-navbar-link>
        <x-navbar-link>About</x-navbar-link>
        
    </ul>
</nav>