<x-user>
  
  @if (!request('search') && !request('category'))
  {{-- start hero --}}
  <section class="relative h-screen bg-cover  bg-center" style="background-image: url('images/gambar.webp');">
    <div class="absolute inset-0 bg-[#0B2F9F] bg-opacity-40"></div> 
    
    <div class="relative z-10 flex items-center justify-start text-left px-10 h-full  text-white">
      <div class="max-w-xl">
        <h1 class="text-5xl font-bold mb-4 text-[#98DED9]">Lorem, ipsum dolor.</h1>
        <p class="text-lg mb-8 text-slate-200">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolorem assumenda ad facere voluptates iste cum expedita ullam doloribus?</p>
        <a href="#explore" class="bg-transparent border-[#C7FFD8] border-2 hover:bg-[#C7FFD8] text-[#C7FFD8] hover:text-[#161D6F] font-bold text-lg font-sans py-3 px-4 rounded">
          Start Your Shopping
        </a>
      </div>
    </div>
  </section>
  {{-- end hero --}}
  @endif


  {{-- start products --}}
  <div class="container mx-auto px-4 py-10" id="explore"></div>

  <div class="container mx-auto py-10">
    <!-- Wrapper untuk grid layout -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
      
      <!-- Sidebar Kategori -->
      <aside class="col-span-1 md:border-r-2 bg-white p-7 shadow-inner max-h-svh">
        <h2 class="text-xl font-bold mb-5">Filter by Category</h2>
        <form action="{{ route('home.index') }}" method="GET">
          <ul class="grid md:grid-cols-2 gap-2 overflow-y-auto h-64 scrollbar pr-1.5">
            @foreach($categories as $category)
              <li>
                <!-- Radio button yang tersembunyi -->
                <input type="radio" name="category" id="category_{{ $category->id }}" value="{{ $category->slug }}"  class="hidden peer" 
                {{ request('category') == $category->slug ? 'checked' : '' }}>
                
                <!-- Label yang bisa diklik, menggunakan peer untuk interaksi dengan radio button -->
                <label for="category_{{ $category->id }}" class="block p-2 border rounded cursor-pointer peer-checked:bg-blue-500 peer-checked:text-white hover:bg-gray-100 
                {{ request('category') == $category->slug ? 'bg-blue-500 text-white' : '' }}" >
                  {{ $category->name }}
                </label>
              </li>
            @endforeach
          </ul>
          <!-- Tombol Submit -->
          <div class="flex gap-3">
            <button type="submit" class="mt-5 bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Apply Filter</button>
            <a id="deleteFilter" href="{{ route('home.index') }}" class="mt-4 bg-white border-2 border-black border-opacity-10 hover:border-opacity-30 transition py-2 px-2 rounded 
            {{ request('category') ? 'block' : 'hidden' }}" ><img src="images/delete.png" alt="delete.png" class="w-8 h-8"></a>
          </div>
        </form>
      </aside>


      <!-- Daftar Produk -->
      <section class="col-span-1 md:col-span-3">
        <div class="mb-4">
          {{ $products->links() }}
        </div>
        <div class="mb-4 {{ request('search') ? 'block' : 'hidden' }}">
          <a href="{{ route('home.index') }}">&laquo; Back</a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
          <!-- Produk -->
          @foreach ($products as $product)
          <a href="{{ route('product.detail', $product->slug) }}" class="border rounded-lg p-4 bg-white shadow-md hover:shadow-lg hover:scale-105 transition block">
            <img src="{{ asset('products/'. $product->image) }}" alt="{{ $product->title }}" class="w-full h-48 object-cover rounded mb-4">
            <div class="flex justify-between">
              <div class="">
                <h3 class="text-lg font-semibold mb-2">{{ $product->title }}</h3>
                <p class="text-gray-500 mb-2">@currency($product->price)</p>
              </div>
              <form action="{{ route('cart.add', $product->id) }}" method="POST">
                @csrf
                <button type="submit" class=" text-white py-2 px-4 hover:scale-110">
                    <img src="https://img.icons8.com/?size=100&id=84990&format=png&color=000000" alt="add to cart" class="w-8 h-8">
                </button>
              </form>
            </div>
          </a>
          @endforeach
        </div>
      </section>
    </div>
  </div>

  <div class="container mx-auto px-4 py-7"></div>
  {{-- end products --}}

  {{-- categories --}}
  <section class="pt-24 pb-32 bg-white mt-16">
    <div class="container mx-auto">
      <h2 class="text-4xl pb-4 font-bold text-center mb-10">Categories</h2>
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-2">
        @foreach ($categoryTake as $category)
        <div class="bg-white shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300 py-7">
          <div class="text-center p-4">
            <img src="/images/pria.webp" alt="Category 1" class="w-full h-32 object-cover mb-3">
            <h3 class="text-lg font-normal font-sans">{{ $category->name }}</h3>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>
  {{-- end categories --}}


  {{-- footer --}}
  <footer class="bg-[#161D6F] text-gray-200 py-16">
    <div class="container mx-auto grid grid-cols-1 md:grid-cols-4 gap-5">
      <!-- Informasi Toko -->
      <div>
        <h2 class="text-lg font-semibold mb-4">MyApp</h2>
        <p class="mb-2">Alamat: Jalan Contoh No. 123, Kota Contoh</p>
        <p class="mb-2">Email: support@myapp.com</p>
        <p class="mb-2">Telepon: +62 123 4567 890</p>
      </div>
  
      <!-- Navigasi -->
      <div>
        <h2 class="text-lg font-semibold mb-4">Navigation</h2>
        <ul>
          <li class="mb-2"><a href="#" class="hover:text-white">Home</a></li>
          <li class="mb-2"><a href="#" class="hover:text-white">Products</a></li>
          <li class="mb-2"><a href="#" class="hover:text-white">Categories</a></li>
          <li class="mb-2"><a href="#" class="hover:text-white">Contact</a></li>
        </ul>
      </div>
  
      <!-- Social Media -->
      <div>
        <h2 class="text-lg font-semibold mb-4">Ikuti Kami</h2>
        <ul class="flex space-x-4">
          <li><a href="#" class="hover:text-white"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2.04c-5.5 0-9.96 4.46-9.96 9.96 0 4.41 3.66 8.09 8.19 8.81v-6.25H8.1V12h2.12V9.68c0-2.1 1.26-3.28 3.19-3.28.92 0 1.87.17 1.87.17v2.05H13.7c-1.13 0-1.48.7-1.48 1.42v1.68h2.5l-.4 2.56h-2.1v6.25c4.53-.72 8.19-4.39 8.19-8.81 0-5.5-4.46-9.96-9.96-9.96z"/></svg></a></li>
          <li><a href="#" class="hover:text-white"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="currentColor"><path d="M22.46 6.03c-.77.35-1.6.58-2.47.69a4.23 4.23 0 0 0 1.86-2.34c-.82.48-1.74.83-2.71 1.02a4.19 4.19 0 0 0-7.14 3.83A11.85 11.85 0 0 1 3.16 5.47 4.19 4.19 0 0 0 4.3 10.6a4.2 4.2 0 0 1-1.9-.52v.05a4.19 4.19 0 0 0 3.36 4.11c-.46.13-.95.2-1.45.2-.35 0-.7-.03-1.03-.1a4.19 4.19 0 0 0 3.9 2.9A8.42 8.42 0 0 1 2 19.54a11.82 11.82 0 0 0 6.41 1.88c7.7 0 11.91-6.38 11.91-11.91l-.01-.54a8.42 8.42 0 0 0 2.07-2.15z"/></svg></a></li>
          <li><a href="#" class="hover:text-white"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="currentColor"><path d="M19.07 3H4.93A1.93 1.93 0 0 0 3 4.93v14.14A1.93 1.93 0 0 0 4.93 21h14.14A1.93 1.93 0 0 0 21 19.07V4.93A1.93 1.93 0 0 0 19.07 3zm-7.07 14a5 5 0 1 1 0-10 5 5 0 0 1 0 10zm6.43-10.91a1.21 1.21 0 0 1-2.42 0 1.21 1.21 0 0 1 2.42 0z"/><circle cx="12" cy="12" r="3.2"/></svg></a></li>
        </ul>
      </div>
  
      <!-- Newsletter Subscription -->
      <div>
        <h2 class="text-lg font-semibold mb-4">Berlangganan</h2>
        <p class="mb-4">Dapatkan penawaran eksklusif dan berita terbaru langsung ke email Anda.</p>
        <form action="#" method="POST">
          <div class="flex items-center">
            <input type="email" placeholder="Email Anda" class="w-full p-2 rounded-l bg-gray-700 text-white placeholder-gray-400 focus:outline-none">
            <button type="submit" class="bg-red-500 p-2 rounded-r text-white hover:bg-red-600">Kirim</button>
          </div>
        </form>
      </div>
    </div>
  
  </footer>  
  <div class="text-center flex justify-center items-center text-gray-400 w-full h-20 bg-[#0c1257]">
    <p>&copy; 2024 MyApp, Dibuat dengan ❤ oleh Latif Widhi Hartoko.</p>
  </div>
  {{-- end footer --}}
</x-user>