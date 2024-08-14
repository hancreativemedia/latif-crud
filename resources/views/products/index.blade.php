<x-layout>
    
    <div class="pb-3">
        <h1 class="font-bold text-4xl "><a href="/product" class="text-blue-500 hover:underline">{{ $title }}</a> ></h1>
    </div>

    <div class="bg-white w-full  rounded-xl shadow-md p-4 mb-4 flex justify-between items-center">
        <a href="{{ route('product.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Create
        </a>
        <form action="/product" method="GET">
            <div class="m-0">
                <input type="search" id="search" name="search" autocomplete="off" placeholder="Search by title..." class="w-72 p-3 border border-gray-300 rounded-l-xl focus:outline-none focus:ring-1 focus:ring-blue-500 right-0" value="{{ htmlspecialchars($_GET['search'] ?? '', ENT_QUOTES) }}">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold p-3 rounded-r-xl left-0">
                    Search
                </button>
            </div>
        </form>
    </div>

    <div class="bg-white w-full rounded-xl shadow-md p-6">
        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr>
                    <th class="px-6 py-3 border-b-2 border-gray-300 bg-gray-200 text-left text-sm font-semibold text-gray-600">No</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 bg-gray-200 text-left text-sm font-semibold text-gray-600">Image</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 bg-gray-200 text-left text-sm font-semibold text-gray-600">Title</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 bg-gray-200 text-left text-sm font-semibold text-gray-600">Created At</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 bg-gray-200 text-left text-sm font-semibold text-gray-600">Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Product data -->
                @forelse ($products as $product)
                <tr>
                    <td class="px-6 py-4 border-b border-gray-300 text-gray-700">{{ $product->id }}</td>
                    <td class="px-6 py-4 border-b border-gray-300 text-gray-700">
                        <img src="{{ asset('products/' . $product->image) }}" alt="Placeholder Image" class="w-32 ">
                    </td>
                    <td class="px-6 py-4 border-b border-gray-300 text-gray-700"><a href="{{ route('product.show', $product->slug) }}" class="hover:underline">{{ $product->title }}</a></td>
                    <td class="px-6 py-4 border-b border-gray-300 text-gray-700">{{ $product->created_at }}</td>
                    <td class="px-6 py-4 border-b border-gray-300 text-gray-700">
                        <a href="{{ route('product.edit', $product->slug) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2.5 px-4 rounded">
                            Edit
                        </a>
                        <form action="{{ route('product.destroy', $product->slug) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" onclick="return confirm('Delete product?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr class="">
                    <p class="font-semibold my-4 text-xl"><span class="font-normal text-blue-600 italic">"{{ htmlspecialchars($_GET['search'] ?? '', ENT_QUOTES) }}"</span> Product not found!</p>  
                    <a href="/product" class=" text-blue-600 hover:underline my-4">&laquo; Back to product</a>  
                </tr>                    
                @endforelse

            </tbody>
        </table>
    </div>
</x-layout>