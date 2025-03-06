<x-guestLayout>
    <div class="max-w-6xl mx-auto my-12 px-4 space-y-6">
        <h1 class="text-2xl font-semibold text-gray-800">Meus Favoritos</h1>

        @forelse ($literacies as $literacy)
            <div class="relative">
                <a href="{{ url('literacias/' . $literacy->slug) }}" class="group block w-full">
                    <article class="flex flex-col sm:flex-row items-center sm:items-stretch border-2 border-gray-200 rounded-xl overflow-hidden shadow-md hover:shadow-lg transition-all bg-white">
                        <div class="w-full sm:w-1/4 h-36 sm:h-48 overflow-hidden">
                            <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300 ease-out"
                                 src="{{ asset('images/literacies/' . $literacy->image) }}"
                                 alt="{{ $literacy->name }}"
                                 loading="lazy">
                        </div>

                        <div class="w-full sm:w-3/4 p-6 flex flex-col justify-center">
                            <h2 class="text-xl font-semibold text-gray-800 group-hover:text-blue-500 transition-colors">
                                {{ $literacy->name }}
                            </h2>
                            <p class="text-gray-600 mt-2 text-sm">
                                {{ Str::limit($literacy->description, 100) }}
                            </p>
                        </div>
                    </article>
                </a>

                @auth
                    <button class="absolute top-2 right-2 favorite-btn" data-id="{{ $literacy->id }}">
                        <img src="{{ asset('images/fav/sim.png') }}" alt="Favorito" class="w-8 h-8">
                    </button>
                @endauth
            </div>
        @empty
            <p class="text-gray-500">Você ainda não favoritou nenhuma literacia.</p>
        @endforelse
    </div>
</x-guestLayout>
