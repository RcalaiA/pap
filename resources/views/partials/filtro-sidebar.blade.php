<!-- Contêiner sticky para TODO o filtro -->
<div class="sticky top-4 self-start h-fit border p-6 rounded-2xl shadow-md bg-white w-full max-w-xl">

  <form class="space-y-6" id="filter-form">

    <!-- Barra de Pesquisa -->
    <div>
      <label class="block mb-2 font-bold" for="searchInputSidebar">Pesquisar Título</label>
      <input type="text" id="searchInputSidebar" name="search" class="w-full px-4 py-2 border rounded-md" placeholder="Pesquise por título..." />
    </div>

    <!-- Formato -->
    <div>
      <label class="block mb-2 font-bold">Formato</label>
      <div class="space-y-1">
        <label><input type="checkbox" name="formato" value="PDF"> PDF</label><br>
        <label><input type="checkbox" name="formato" value="Vídeo"> Vídeo</label><br>
        <label><input type="checkbox" name="formato" value="Website"> Website</label><br>
        <label><input type="checkbox" name="formato" value="Exercício Interativo"> Exercício Interativo</label><br>
        <label><input type="checkbox" name="formato" value="Imagem / Infográfico"> Imagem / Infográfico</label><br>
        <label><input type="checkbox" name="formato" value="Apresentação"> Apresentação</label><br>
        <label><input type="checkbox" name="formato" value="Áudio / Podcast"> Áudio / Podcast</label>
      </div>
    </div>

    <!-- Faixa Etária -->
    <div>
      <label class="block mb-2 font-bold">Faixa Etária</label>
      <div class="space-y-1">
        <label><input type="checkbox" name="faixa" value="Crianças (6-10 anos)"> Crianças (6-10 anos)</label><br>
        <label><input type="checkbox" name="faixa" value="Adolescentes (11-17 anos)"> Adolescentes (11-17 anos)</label><br>
        <label><input type="checkbox" name="faixa" value="Adultos (18 ou mais)"> Adultos (18 ou mais)</label>
      </div>
    </div>

    <!-- Idioma -->
    <div>
      <label class="block mb-2 font-bold">Idioma</label>
      <div class="space-y-1">
        <label><input type="checkbox" name="idioma" value="Português"> Português</label><br>
        <label><input type="checkbox" name="idioma" value="Inglês"> Inglês</label><br>
        <label><input type="checkbox" name="idioma" value="Espanhol"> Espanhol</label><br>
      </div>
    </div>

    <!-- Ano -->
    <div>
      <label for="ano-range" class="block mb-2 font-bold">Ano</label>
      <div class="flex items-center gap-4">
        <span id="ano-min">2000</span>
        <input id="ano-range" name="ano" type="range" min="2000" max="2025" step="1" value="2012" class="w-full">
        <span id="ano-max">2025</span>
      </div>
    </div>

    <!-- Botão -->
    <div class="text-right pt-4">
      <button type="button" id="filterButton" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
        Filtrar
      </button>
    </div>

  </form>
</div>
