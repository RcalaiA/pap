@php
    $heroes = \App\Models\Hero::all();  
@endphp

<div>
    <button class="bg-blue-400 text-white rounded h-16 w-16"
        onclick="backward()"    
    ><</button>
    <button class="bg-blue-400 text-white rounded h-16 w-16"
        onclick="forward()"
    >></button>
    @foreach($heroes as $index => $hero)    
        <div class="relative" id="hero{{ $index }}" style="display: @if ($index==0) block @else none @endif">
            <img src="/images/hero/{{ $hero->image }}" 
                alt="hero"                 
                class="w-full h-96 object-cover"
                
            >
            @if ($hero->title)
                <h1 class="absolute top-2 bg-white l-4 opacity-40">{{ $hero->title}}</h1>
            @endif
            @if ($hero->title)
                <p class="absolute bottom-2 bg-white l-4 opacity-40">{{ $hero->subtitle}}</p>
            @endif
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
        image = image - 1;
        if (image < 0) {
            image = total_images - 1;
        }
        document.getElementById(`hero${image}`).style.display = 'block';        
    }
</script>