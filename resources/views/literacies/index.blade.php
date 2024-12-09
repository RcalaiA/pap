<x-guestLayout>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 max-w-4xl m-auto my-8">
        @foreach ($literacies as $literacy)
            <a href="/literacias/{{ $literacy->slug }}">
                <div class="border-2 p-4 rounded-xl">
                    <img class="h-48 object-cover" src="/images/literacies/{{ $literacy->image }}">
                    <p class="text-center mt-4 font-bold">{{ $literacy->name }}</p>
                </div>
            </a>
        @endforeach
    </div>
</x-guestLayout>