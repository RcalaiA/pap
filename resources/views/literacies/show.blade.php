<x-guestLayout>
    <div class="max-w-4xl m-auto my-8">
        <p class="text-4xl">{{ $literacy->name }}</p>
        <p class="mt-4">{{ $literacy->description }}</p>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
            @foreach ($literacy->documents as $document)
                <x-document :document="$document"/>                
            @endforeach
        </div>
    </div>
</x-guestLayout>