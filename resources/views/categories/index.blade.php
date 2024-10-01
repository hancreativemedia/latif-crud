<x-layout>
    <!-- Bagian Atas dengan Tombol Create dan Form Search -->
    <div class="bg-white w-full rounded-xl shadow-md p-4 mb-4 flex flex-col sm:flex-row justify-between sm:items-center items-start space-y-4 sm:space-y-0">
        <a href="{{ route('category.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Create
        </a>
        <form action="/category" method="GET" class="w-full sm:w-auto">
            <div class="flex items-center">
                <input type="search" id="category" name="category" autocomplete="off" placeholder="Search by title..." class="w-full sm:w-72 p-3 border border-gray-300 rounded-l-xl focus:outline-none focus:ring-1 focus:ring-blue-500" value="{{ htmlspecialchars($_GET['category'] ?? '', ENT_QUOTES) }}">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold p-3 rounded-r-xl">
                    Search
                </button>
            </div>
        </form>
    </div>

    <!-- Bagian Tabel dengan Konten -->
    <div class="bg-white w-full rounded-xl shadow-md p-6 overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr>
                    <th class="px-6 py-3 border-b-2 border-gray-300 bg-gray-200 text-left text-xs sm:text-sm font-semibold text-gray-600">No</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 bg-gray-200 text-left text-xs sm:text-sm font-semibold text-gray-600">Title</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 bg-gray-200 text-left text-xs sm:text-sm font-semibold text-gray-600">Products</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 bg-gray-200 text-left text-xs sm:text-sm font-semibold text-gray-600">Created At</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 bg-gray-200 text-left text-xs sm:text-sm font-semibold text-gray-600">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $index => $category)
                <tr>
                    <td class="px-6 py-4 border-b border-gray-300 text-gray-700 text-xs sm:text-sm">{{ $categories->firstItem() + $index }}</td>
                    <td class="px-6 py-4 border-b border-gray-300 text-gray-700 text-xs sm:text-sm"><a href="{{ route('category.show', $category->slug) }}" class="hover:underline">{{ $category->name }}</a></td>
                    <td class="px-6 py-4 border-b border-gray-300 text-gray-700 text-xs sm:text-sm">{{ $category->products_count }}</td>
                    <td class="px-6 py-4 border-b border-gray-300 text-gray-700 text-xs sm:text-sm">{{ $category->created_at }}</td>
                    <td class="px-6 py-4 border-b border-gray-300 text-gray-700 text-center">
                        <div class="inline-flex space-x-2 text-xs sm:text-sm">
                            <a href="{{ route('category.edit', $category->slug) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Edit
                            </a>
                            <form action="{{ route('category.destroy', $category->slug) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" onclick="return confirm('Delete category?')">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-4 border-b border-gray-300 text-gray-700 text-center">
                        <p class="font-semibold text-xl"><span class="font-normal text-blue-600 italic">"{{ htmlspecialchars($_GET['category'] ?? '', ENT_QUOTES) }}"</span> Category not found!</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-5">
            {{ $categories->links() }}
        </div>
    </div>
</x-layout>
