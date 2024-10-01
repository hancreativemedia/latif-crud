{{-- <form action="{{ route('cart.checkout') }}" method="POST">
    @csrf
    <table>
        <thead>
            <tr>
                <th>Select</th>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cartItems as $cart)
            <tr>
                <td>
                    <!-- Checkbox untuk memilih produk -->
                    <input type="checkbox" name="product_ids[]" value="{{ $cart->id }}">
                </td>
                <td>{{ $cart->product->title }}</td>
                <td>{{ $cart->product->price }}</td>
                <td>{{ $cart->quantity }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @if ($cartItems->isNotEmpty())
        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">
            Checkout
        </button>
    @endif
</form> --}}

<x-user>
    <div class="container mx-auto my-10 p-5 md:mt-24">
        <!-- Cart Table -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <!-- Left: Cart Items -->
                    <div class="col-span-2">
                        <div class="bg-white shadow-md rounded-lg p-5">
                            <h2 class="text-2xl font-bold mb-5">Shopping Cart</h2>
                            <table class="table-auto w-full">
                                <thead>
                                    <tr>
                                        <th class="text-left py-2">Image</th>
                                        <th class="text-left py-2">Title</th>
                                        <th class="text-left py-2">Price</th>
                                        <th class="text-left py-2">Quantity</th>
                                        <th class="text-left py-2">Total</th>
                                        <th class="text-left py-2"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cartItems as $cart)
                                    <tr class="border-t">
                                        <td class="py-2">
                                            <img src="/products/{{ $cart->product->image }}" alt="{{ $cart->title }}" class="w-40">
                                        </td>
                                        <td class="py-2">{{ $cart->product->title }}</td>
                                        <td class="py-2">@currency($cart->product->price)</td>
                                        <td class="py-2">
                                            <input type="text" readonly="readonly" value="{{ $cart->quantity }}" min="1" class="w-16 border rounded px-2 py-1">
                                        </td>
                                        <td class="py-2">@currency($cart->product->price * $cart->quantity)</td>
                                        <td class="py-2 pr-2">
                                            <a href="{{ route('cart.destroy', ['cart' => $cart]) }}" 
                                                onclick="event.preventDefault();
                                                document.getElementById('delete-form-{{ $cart->id }}').submit();">
                                                <img src="https://img.icons8.com/?size=100&id=83149&format=png&color=000000" alt="delete" class="h-5 w-5">
                                            </a>

                                            <form id="delete-form-{{ $cart->id }}" action="{{ route('cart.destroy', ['cart' => $cart]) }}" method="POST" class="hidden">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                <!-- Right: Price Details & Checkout -->
                    <div>
                        <div class="bg-white shadow-md rounded-lg p-5">
                            <h2 class="text-2xl font-bold mb-5">Cart Details</h2>
                            <div class="flex justify-between mb-2">
                                <span>Subtotal</span>
                                <span>@currency($totalPrice)</span>
                            </div>
                            <div class="flex justify-between mb-2">
                                <span>Discount</span>
                                <span>Rp </span>
                            </div>
                            <div class="flex justify-between mb-2">
                                <span>Tax ()</span>
                                <span>Rp </span>
                            </div>
                            <div class="flex justify-between font-bold text-lg mb-5">
                                <span>Total</span>
                                <span>Rp {{ number_format($totalPrice, 0, ',', '.') }}</span>
                            </div>
                            <a href="{{ route('cart.checkout') }}"
                             class="bg-blue-500 text-white px-5 py-2 rounded-lg w-full block text-center"
                             onclick="event.preventDefault(); document.getElementById('checkout-form').submit();">
                                Checkout
                            </a>

                            <form id="checkout-form" action="{{ route('cart.checkout') }}" method="POST" class="hidden">
                                @csrf
                            </form>
                        </div>
                    </div>      
            </div>
    </div>
</x-user>


