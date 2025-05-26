<!-- resources/views/partials/filtro-sidebar.blade.php -->

<div class="sticky top-4 self-start h-fit border p-6 rounded-2xl shadow-md bg-white w-full max-w-xl">
  <form action="{{ route('literacies.show', $literacy->slug) }}" method="GET" class="space-y-6">

    <!-- Barra de Pesquisa -->
    <div>
      <label class="block mb-2 font-bold" for="searchInputSidebar">Pesquisar Título</label>
      <input type="text" id="searchInputSidebar" name="search" class="w-full px-4 py-2 border rounded-md" placeholder="Pesquise por título..." value="{{ request('search') }}" />
    </div>

    <!-- Formato -->
    <div>
      <label class="block mb-2 font-bold">Formato</label>
      <div class="space-y-1">
        <label><input type="checkbox" name="formato[]" value="PDF" {{ in_array('PDF', (array) request('formato', [])) ? 'checked' : '' }}> PDF</label><br>
        <label><input type="checkbox" name="formato[]" value="Vídeo" {{ in_array('Vídeo', (array) request('formato', [])) ? 'checked' : '' }}> Vídeo</label><br>
        <label><input type="checkbox" name="formato[]" value="Website" {{ in_array('Website', (array) request('formato', [])) ? 'checked' : '' }}> Website</label><br>
        <label><input type="checkbox" name="formato[]" value="Exercício Interativo" {{ in_array('Exercício Interativo', (array) request('formato', [])) ? 'checked' : '' }}> Exercício Interativo</label><br>
        <label><input type="checkbox" name="formato[]" value="Imagem / Infográfico" {{ in_array('Imagem / Infográfico', (array) request('formato', [])) ? 'checked' : '' }}> Imagem / Infográfico</label><br>
        <label><input type="checkbox" name="formato[]" value="Apresentação" {{ in_array('Apresentação', (array) request('formato', [])) ? 'checked' : '' }}> Apresentação</label><br>
        <label><input type="checkbox" name="formato[]" value="Áudio / Podcast" {{ in_array('Áudio / Podcast', (array) request('formato', [])) ? 'checked' : '' }}> Áudio / Podcast</label>
      </div>
    </div>

    <!-- Faixa Etária -->
    <!--<div>
      <label class="block mb-2 font-bold">Faixa Etária</label>
      <div class="space-y-1">
        <label><input type="checkbox" name="faixa[]" value="Crianças (6-10 anos)" {{ in_array('Crianças (6-10 anos)', (array) request('faixa', [])) ? 'checked' : '' }}> Crianças (6-10 anos)</label><br>
        <label><input type="checkbox" name="faixa[]" value="Adolescentes (11-17 anos)" {{ in_array('Adolescentes (11-17 anos)', (array) request('faixa', [])) ? 'checked' : '' }}> Adolescentes (11-17 anos)</label><br>
        <label><input type="checkbox" name="faixa[]" value="Adultos (18 ou mais)" {{ in_array('Adultos (18 ou mais)', (array) request('faixa', [])) ? 'checked' : '' }}> Adultos (18 ou mais)</label>
      </div>
    </div>-->

    <!-- Idioma -->
    <div>
      <label class="block mb-2 font-bold">Idioma</label>
      <div class="space-y-1">
        <label><input type="checkbox" name="idioma[]" value="Português" {{ in_array('Português', (array) request('idioma', [])) ? 'checked' : '' }}> Português</label><br>
        <label><input type="checkbox" name="idioma[]" value="Inglês" {{ in_array('Inglês', (array) request('idioma', [])) ? 'checked' : '' }}> Inglês</label><br>
      </div>
    </div>

    <!-- Ano (Intervalo de Datas) -->
    <!--<div>
      <label class="block mb-2 font-bold">Ano</label>
      <div class="flex flex-col space-y-2">
        <div>
          <label for="data_inicio" class="block text-sm font-medium text-gray-700">De:</label>
          <input type="date" id="data_inicio" name="data_inicio" class="w-full px-4 py-2 border rounded-md"
                 value="{{ request('data_inicio') }}">
        </div>
        <div>
          <label for="data_fim" class="block text-sm font-medium text-gray-700">Até:</label>
          <input type="date" id="data_fim" name="data_fim" class="w-full px-4 py-2 border rounded-md"
                 value="{{ request('data_fim') }}">
        </div>
      </div>
    </div>-->

    <!-- Botão -->
    <div class="text-right pt-4">
      <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
        Filtrar
      </button>
    </div>
  </form>
</div>
