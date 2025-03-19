<div>    
    {{ $stories }}
    @foreach($stories as $story)
        <div class="bg-red-400">{{ $story->title }}</div>

    @endforeach
</div>