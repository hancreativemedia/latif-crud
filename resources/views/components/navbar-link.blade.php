@props(['active' => false])
<li class="">
    <a
    {{ $attributes }}
     class="{{ $active ? "shadow-active text-[#0B2F9F]" : "text-black hover:shadow-hover hover:scale-110" }} transition-all block text-lg  font-medium px-8 py-4">{{ $slot }}</a>
</li>