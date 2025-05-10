<div class="bg-gray-100 p-4 rounded shadow">
    <input type="text" id="searchInputSidebar" placeholder="Pesquisar..." class="w-full p-2 mb-4 border rounded">

    <div class="mb-4">
        <p class="font-semibold mb-2">Formato</p>
        @foreach ($formats ?? [] as $format)
            <label class="block text-sm">
                <input type="checkbox" name="format[]" value="{{ $format }}" class="mr-2">
                {{ $format }}
            </label>
        @endforeach
    </div>

    <div class="mb-4">
        <p class="font-semibold mb-2">Faixa Etária</p>
        @foreach ($ageGroups ?? [] as $age)
            <label class="block text-sm">
                <input type="checkbox" name="age_group[]" value="{{ $age }}" class="mr-2">
                {{ $age }}
            </label>
        @endforeach
    </div>

    <div class="mb-4">
        <label class="block text-sm font-semibold mb-2">
            <input type="checkbox" name="is_interactive" value="1" class="mr-2">
            Interativo
        </label>
        <label class="block text-sm font-semibold">
            <input type="checkbox" name="has_download" value="1" class="mr-2">
            Com Download
        </label>
    </div>

    <div class="mb-4">
        <p class="font-semibold mb-2">Idioma</p>
        @foreach ($languages ?? [] as $lang)
            <label class="block text-sm">
                <input type="checkbox" name="language[]" value="{{ $lang }}" class="mr-2">
                {{ $lang }}
            </label>
        @endforeach
    </div>

    <div class="mb-4">
        <p class="font-semibold mb-2">Fonte</p>
        @foreach ($fonts ?? [] as $font)
            <label class="block text-sm">
                <input type="checkbox" name="font[]" value="{{ $font }}" class="mr-2">
                {{ $font }}
            </label>
        @endforeach
    </div>

    <button id="searchButton" class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600">
        Filtrar
    </button>
</div>
