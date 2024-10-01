<x-layout>
    <div class="pb-3">
        <h1 class="font-bold text-4xl"><a href="/product" class="text-[#0B2F9F] hover:underline">{{ $title }}</a></h1>
    </div>

    <div class="bg-white w-full rounded-xl shadow-md p-4 mb-4 flex flex-col md:flex-row justify-between md:items-center items-start">
        <a href="{{ route('product.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 sm:mb-2 md:mr-2">
            Create
        </a>
        
        <form action="/product" method="GET" class="flex flex-col sm:flex-row items-center w-full sm:w-auto">
            <select name="category" id="category" class="border border-gray-300 rounded-t-xl sm:rounded-l-xl sm:rounded-r-none sm:rounded-t-none p-3 focus:outline-none focus:ring-1 focus:ring-blue-500 mb-4 sm:mb-0 w-full sm:w-auto">
                <option value="">All Categories</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->slug }}" {{ request('category') == $category->slug ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            <div class="flex flex-col sm:flex-row w-full sm:w-auto">
                <input type="search" id="search" name="search" autocomplete="off" placeholder="Search by title..." class="w-full sm:w-72 p-3 border border-gray-300 focus:outline-none focus:ring-1 focus:ring-blue-500 mb-4 sm:mb-0" value="{{ htmlspecialchars($_GET['search'] ?? '', ENT_QUOTES) }}">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold p-3 rounded-lg sm:rounded-r-xl sm:rounded-b-none ml-auto">
                    Search
                </button>
            </div>
        </form>
    </div>

    <div class="bg-white w-full rounded-xl shadow-md p-6 overflow-x-auto">
        {{ $products->links() }}

        <table class="min-w-full bg-white border border-gray-300 mt-2">
            <thead>
                <tr>
                    <th class="px-6 py-3 border-b-2 border-gray-300 bg-gray-200 text-left text-sm font-semibold text-gray-600">No</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 bg-gray-200 text-left text-sm font-semibold text-gray-600 transition-all xl:block hidden">Image</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 bg-gray-200 text-left text-sm font-semibold text-gray-600">Title</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 bg-gray-200 text-left text-sm font-semibold text-gray-600">Created At</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 bg-gray-200 text-left text-sm font-semibold text-gray-600">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $index => $product)
                <tr>
                    <td class="px-6 py-4 border-b border-gray-300 text-gray-700">{{ $products->firstItem() + $index }}</td>
                    <td class="px-6 py-4 border-b border-gray-300 text-gray-700 transition-all xl:block hidden">
                        <img src="{{ asset('products/' . $product->image) }}" alt="Product Image" class="w-full h-48 object-cover transition-all xl:block hidden">
                    </td>
                    <td class="px-6 py-4 border-b border-gray-300 text-gray-700"><a href="{{ route('product.show', $product->slug) }}" class="hover:underline">{{ $product->title }}</a></td>
                    <td class="px-6 py-4 border-b border-gray-300 text-gray-700">{{ $product->created_at->diffForHumans() }}</td>
                    <td class="px-6 py-4 border-b border-gray-300 text-gray-700 text-center">
                        <div class="inline-flex space-x-2">
                            <a href="{{ route('product.edit', $product->slug) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Edit
                            </a>
                            <form action="{{ route('product.destroy', $product->slug) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" onclick="return confirm('Delete product?')">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-4 border-b border-gray-300 text-gray-700 text-center">
                        <p class="font-semibold text-xl"><span class="font-normal text-blue-600 italic">"{{ request('search') }}"</span> Product not found!</p>  
                        <a href="/product" class="text-blue-600 hover:underline">&laquo; Back to product</a>  
                    </td>
                </tr>                    
                @endforelse
            </tbody>
        </table>
    </div>
</x-layout>
