@props(['value'])

<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg my-4 px-3 pb-2">
    {{ $value ?? $slot }}
</div>