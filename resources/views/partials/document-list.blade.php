<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
    @foreach ($documents as $document)
        <a href="{{ route('documents.show', $document->id) }}" class="block bg-white border rounded p-4 hover:shadow transition">
            <h3 class="text-lg font-semibold text-gray-800">{{ $document->title }}</h3>

            {{-- Exibe a imagem do documento entre o título e a descrição --}}
            @if ($document->image)
                <img class="mt-2 w-full h-auto object-cover" 
                     src="{{ asset('images/documents/' . $document->image) }}" 
                     alt="{{ $document->title }}" loading="lazy">
            @else
                <img class="mt-2 w-full h-auto object-cover" 
                     src="{{ asset('images/documents/default.jpg') }}" 
                     alt="Imagem padrão" loading="lazy">
            @endif

            <p class="text-sm text-gray-600 mt-1">{{ Str::limit($document->description, 80) }}</p>
        </a>
    @endforeach
</div>
