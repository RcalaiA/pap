<x-guestLayout>
    <div class="max-w-7xl mx-auto px-4 py-8 grid grid-cols-1 md:grid-cols-4 gap-6">
        {{-- Sidebar de filtros --}}
        <div>
            @include('partials.filtro-sidebar')
        </div>

        {{-- Área de documentos --}}
        <div class="md:col-span-3">
            <div id="document-list" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                {{-- Atualizado: documentos são renderizados com links para a página de detalhes --}}
                @foreach ($literacy->documents as $document)
                    <a href="{{ route('documents.show', $document->id) }}" class="block bg-white border rounded p-4 hover:shadow transition">
                        <h3 class="text-lg font-semibold text-gray-800">{{ $document->title }}</h3>
                        <p class="text-sm text-gray-600 mt-1">{{ Str::limit($document->description, 80) }}</p>
                    </a>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Script para AJAX --}}
    <script>
        document.getElementById('filterButton').addEventListener('click', function () {
            const checkedCategorias = [...document.querySelectorAll('input[name="categorias[]"]:checked')].map(e => e.value);
            const checkedTipos = [...document.querySelectorAll('input[name="tipos[]"]:checked')].map(e => e.value);
            const checkedCEs = [...document.querySelectorAll('input[name="CE[]"]:checked')].map(e => e.value);
            const search = document.getElementById('searchInputSidebar').value;
            const formato = [...document.querySelectorAll('input[name="formato"]:checked')].map(e => e.value);
            const faixa = [...document.querySelectorAll('input[name="faixa"]:checked')].map(e => e.value);
            const idioma = [...document.querySelectorAll('input[name="idioma"]:checked')].map(e => e.value);
            const ano = document.getElementById('ano-range').value;

            fetch('{{ route('literacies.filter', $literacy->id) }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    categorias: checkedCategorias,
                    tipos: checkedTipos,
                    CE: checkedCEs,
                    search: search,
                    formato: formato,
                    faixa: faixa,
                    idioma: idioma,
                    ano: ano
                })
            })
            .then(response => response.json())
            .then(data => {
                document.getElementById('document-list').innerHTML = data.html;
            });
        });
    </script>
</x-guestLayout>
