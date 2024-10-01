<x-layout>
    <div class="pb-3">
        <h1 class="font-bold text-4xl "><a href="/category" class=" hover:underline">Category </a>><span class="hover:underline text-blue-500">{{ $title }}</span> ></h1>
    </div>
        <form action="{{ route('category.store') }}" method="POST" >
            @csrf
            <!-- Title -->
            <div class="mb-3">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Title</label>
                <input type="text" name="name" id="name" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"  value="{{ old('name') }}">
                @error('name')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Slug -->
            <div class="mb-3">
                <label for="slug" class="block text-gray-700 text-sm font-bold mb-2">Slug</label>
                <input type="text" name="slug" id="slug" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" readonly value="{{ old('slug') }}">
                @error('slug')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-lg">
                Create Category
            </button>
        </form>

        <!-- Back Button -->
        <div class="mt-2">
            <a href="{{ route('category.index') }}" class="text-blue-500 hover:text-blue-700 font-bold">
                Back to List
            </a>
        </div>

        <script>
            document.getElementById('name').addEventListener('input', function () {
                const nameInput = document.getElementById('name').value;
                const slugInput = document.getElementById('slug');

                const slugValue = nameInput
                                .toLowerCase()
                                .replace(/\s+/g, '-')
                                .replace(/[^\w-]+/g, '');

                slugInput.value = slugValue;
            });
        </script>
</x-layout>