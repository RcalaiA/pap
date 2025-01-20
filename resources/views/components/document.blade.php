@props(['document'])
<div>
    <a href="{{ $document->url }}" class="hover:bg-slate-200">
        <div class="border p-4 rounded">
            <p class="font-bold">{{ $document->title }}</p>
            <img src="/images/documents/{{ $document->image }}">
        </div>
    </a>
</div>