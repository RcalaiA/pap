<x-guestLayout>
    <div class="max-w-7xl mx-auto px-4 py-8 grid grid-cols-1 md:grid-cols-4 gap-6">
        {{-- Sidebar de filtros --}}
        <div>
            @include('partials.filtro-sidebar')
        </div>

        {{-- Área de documentos --}}
        <div class="md:col-span-3">
            <div id="document-list" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                @include('partials.documents', ['documents' => $literacy->documents])
            </div>
        </div>
    </div>

    {{-- Script para AJAX --}}
    <script>
        document.getElementById('searchButton').addEventListener('click', function () {
            const checkedCategorias = [...document.querySelectorAll('input[name="categorias[]"]:checked')].map(e => e.value);
            const checkedTipos = [...document.querySelectorAll('input[name="tipos[]"]:checked')].map(e => e.value);
            const checkedCEs = [...document.querySelectorAll('input[name="CE[]"]:checked')].map(e => e.value);
            const search = document.getElementById('searchInputSidebar').value;

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
                    search: search
                })
            })
            .then(response => response.json())
            .then(data => {
                document.getElementById('document-list').innerHTML = data.html;
            });
        });
    </script>
</x-guestLayout>