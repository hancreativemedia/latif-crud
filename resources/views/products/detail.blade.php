<x-user>
    <div class="max-w-6xl mx-auto px-4 py-8 md:mt-20">
        <!-- Product Detail Container -->
        <div class="flex flex-col md:flex-row justify-start bg-white rounded-lg shadow-lg overflow-hidden mb-10">
            
            <!-- Product Image -->
            <div class="md:w-1/2">
                <img class="w-full h-full object-cover bg-center  bg-white " src="/products/{{ $product->image }}" alt="{{ $product->title }}">
            </div>

            <!-- Product Details -->
            <div class="md:w-1/2 p-6">
                <div class="flex justify-between">
                    <div>
                        <!-- Product Title -->
                        <h2 class="text-3xl font-bold text-gray-800 mb-2">{{ $product->title }}</h2>

                        <!-- Product Price -->
                        <p class="text-xl text-green-500 font-semibold mb-4">@currency($product->price)</p>
                    </div>
                    <!-- Add to Cart Button -->
                    <a href="{{ route('cart.add', $product->id) }}" onclick="event.preventDefault(); document.getElementById('cart-form-{{ $product->id }}').submit();" class="text-white py-2 px-4 hover:scale-110">
                        <img src="https://img.icons8.com/?size=100&id=84990&format=png&color=000000" alt="add to cart" class="w-8 h-8">
                    </a>
                </div>
                


                <!-- Product Description -->
                <p class="text-gray-700 mb-4">
                    {!! $product->description !!}
                </p>

                <!-- Product Category -->
                @foreach ($product->categories as $category)
                    
                @endforeach
                <p class="text-gray-600 ">Category: <span class="font-semibold">{{ $category->name }}</span></p>

                

                <form id="cart-form-{{ $product->id }}" action="{{ route('cart.add', $product->id) }}" method="POST" class="hidden">
                    @csrf
                </form>
            </div>
        </div>

        <!-- Section for Other Products -->
        <div>
            <h3 class="text-2xl font-semibold text-gray-800 mb-6">Other Products You May Like</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Product Card 1 -->
                <div class="bg-white rounded-lg shadow-lg p-4">
                    <img class="w-full h-48 object-cover mb-4" src="https://via.placeholder.com/300" alt="Product Image 1">
                    <h4 class="text-lg font-bold mb-2">Product 1</h4>
                    <p class="text-green-500 font-semibold mb-2">$49.99</p>
                    <a href="#" class="text-blue-500 underline">View Details</a>
                </div>

                <!-- Product Card 2 -->
                <div class="bg-white rounded-lg shadow-lg p-4">
                    <img class="w-full h-48 object-cover mb-4" src="https://via.placeholder.com/300" alt="Product Image 2">
                    <h4 class="text-lg font-bold mb-2">Product 2</h4>
                    <p class="text-green-500 font-semibold mb-2">$79.99</p>
                    <a href="#" class="text-blue-500 underline">View Details</a>
                </div>

                <!-- Product Card 3 -->
                <div class="bg-white rounded-lg shadow-lg p-4">
                    <img class="w-full h-48 object-cover mb-4" src="https://via.placeholder.com/300" alt="Product Image 3">
                    <h4 class="text-lg font-bold mb-2">Product 3</h4>
                    <p class="text-green-500 font-semibold mb-2">$59.99</p>
                    <a href="#" class="text-blue-500 underline">View Details</a>
                </div>
            </div>
        </div>
    </div>

</x-user>