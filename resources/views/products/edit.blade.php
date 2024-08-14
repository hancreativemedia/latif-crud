<x-layout>
    <div class="pb-3">
        <h1 class="font-bold text-4xl "><a href="/product" class=" hover:underline">Products </a>><span class="hover:underline text-blue-500">{{ $title }}</span> > {{ $product->title }}</h1>
    </div>

    <div class="w-full">
        <!-- Form -->
        <form action="{{ route('product.update', $product->slug) }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-6 gap-6">
            @csrf
            @method('PUT')

            <div class="col-span-3">
                <!-- Title -->
                <div class="mb-3">
                    <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title</label>
                    <input type="text" name="title" id="title" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"  value="{{ old('title', $product->title) }}">
                    @error('title')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Slug -->
                <div class="mb-3">
                    <label for="slug" class="block text-gray-700 text-sm font-bold mb-2">Slug</label>
                    <input type="text" name="slug" id="slug" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('slug', $product->slug) }}">
                    @error('slug')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description -->
                <div class="">
                    <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description</label>
                    <textarea name="description" id="description" rows="13" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" autocomplete="off">{{ old('description', $product->description) }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="col-span-3">
                <!-- Price -->
                <div class="mb-3">
                    <label for="price" class="block text-gray-700 text-sm font-bold mb-2">Price</label>
                    <input type="number" name="price" id="price" step="0.01" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('price', $product->price) }}">
                    @error('price')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Image Upload -->
                <div class="mb-3">
                    <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Upload Image</label>
                    <input type="file" name="image" id="image" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('image', $product->image) }}">
                    @error('image')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror

                    {{-- Image Preview --}}
                    <div class="mt-3 mb-3">
                        <img id="imagePreview" src="{{ asset('/storage/products/' . $product->image) }}" alt="image_preview" class="rounded-xl h-64">
                    </div>
                </div>

                

                <button type="submit" class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-lg">
                    Update Product
                </button>
            </div>
        </form>

        <!-- Back Button -->
        <div class="">
            <a href="{{ route('product.index') }}" class="text-blue-500 hover:text-blue-700 font-bold">
                Back to List
            </a>
        </div>

    </div>
</x-layout>