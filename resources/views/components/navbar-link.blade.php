@props(['active' => false])
<li class="">
    <a
    {{ $attributes }}
     class="{{ $active ? "bg-gray-900 text-gray-400" : "text-gray-100 hover:bg-gray-700" }} block text-lg  font-medium px-8 py-4">{{ $slot }}</a>
</li>