@php
    $heroes = \App\Models\Hero::all();  
@endphp

<div class="relative w-full max-w-4xl mx-auto">
    @foreach($heroes as $index => $hero)    
        <div class="relative" id="hero{{ $index }}" style="display: @if ($index==0) block @else none @endif">
            <img src="/images/hero/{{ $hero->image }}" 
                alt="hero"                 
                class="w-full h-96 object-cover rounded-lg shadow-lg"
            >
            @if ($hero->title)
                <h1 class="absolute top-4 left-4 bg-black text-white px-4 py-2 rounded opacity-75 text-lg">{{ $hero->title }}</h1>
            @endif
            @if ($hero->subtitle)
                <p class="absolute bottom-4 left-4 bg-black text-white px-4 py-2 rounded opacity-75 text-sm">{{ $hero->subtitle }}</p>
            @endif
            
            <!-- Botões dentro da imagem -->
            <button class="absolute left-2 top-1/2 transform -translate-y-1/2 bg-black text-white rounded-full h-12 w-12 flex items-center justify-center opacity-75 hover:opacity-100"
                onclick="backward()"
            >&#9664;</button>
            <button class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-black text-white rounded-full h-12 w-12 flex items-center justify-center opacity-75 hover:opacity-100"
                onclick="forward()"
            >&#9654;</button>
        </div>
    @endforeach
</div>

<script>
    let image = 0;
    let total_images = {{ $heroes->count() }};

    function forward() {        
        document.getElementById(`hero${image}`).style.display = 'none';        
        image = (image + 1) % total_images;
        document.getElementById(`hero${image}`).style.display = 'block';        
    }

    function backward() {        
        document.getElementById(`hero${image}`).style.display = 'none';        
        image = (image - 1 + total_images) % total_images;
        document.getElementById(`hero${image}`).style.display = 'block';        
    }
</script>
