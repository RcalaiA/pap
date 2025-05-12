<div id="documents-list">
    @forelse($documents as $doc)
        <div class="mb-4 p-4 border rounded bg-white shadow">
            <h3 class="font-semibold text-lg">{{ $doc->title }}</h3>
            <p class="text-gray-600 mb-2">{{ $doc->description }}</p>
            <p class="text-sm text-gray-500">
                <strong>Formato:</strong> {{ $doc->format }} |
                <strong>Idioma:</strong> {{ $doc->language }} |
                <strong>Idade:</strong> {{ $doc->age_group }} |
                <strong>Ano:</strong> {{ \Carbon\Carbon::parse($doc->published_at)->format('Y') }}
            </p>
            <a href="{{ $doc->url }}" target="_blank" class="text-blue-600 underline mt-2 inline-block">Ver documento</a>
        </div>
    @empty
        <p class="text-gray-500">Nenhum documento encontrado com os filtros selecionados.</p>
    @endforelse
</div>
