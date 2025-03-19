@props(['title'])
<div>
    <h1>{{ $title }}</h1>
    <div class="m-auto text-justify space-y-3 mt-8">
        {{ $slot }}
    </div>
</div>