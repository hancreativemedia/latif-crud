{{-- @dd($product) --}}
<x-layout>
    <section class="bg-white dark:bg-gray-900">
        <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
            <div class="lg:mr-2 place-self-center lg:col-span-7">
                <h1 class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl dark:text-white">{{ $product->title }}</h1>
                <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">{!! $product->description !!}</p>
                <p href="#" class="inline-flex items-center justify-center px-5 py-3 mr-3 text-base font-medium text-center text-gray-500 rounded-lg  focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900">
                    Price: {{ number_format($product->price, 0, ',','.') }}
                </p>
                <a href="/product" class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-white border bg-blue-700 rounded-lg hover:bg-blue-500 focus:ring-4 focus:ring-blue-100 dark:text-white dark:border-blue-700 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Back to Post
                </a> 
            </div>
            <div class="hidden lg:mt-0 lg:col-span-5 lg:flex ml-2">
                <img src="{{ asset('products/' . $product->image) }}" alt="{{ $product->title }}">
            </div>                
        </div>
    </section>
</x-layout>
