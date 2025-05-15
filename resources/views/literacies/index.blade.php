<x-guestLayout>
    <div class="max-w-6xl mx-auto my-12 px-4 space-y-6">

        @php
            $favorited = $literacies->filter(fn($lit) => $lit->isFavoritedByAuthUser());
            $normal = $literacies->filter(fn($lit) => ! $lit->isFavoritedByAuthUser());
        @endphp

        {{-- Literacias Favoritas --}}
        @foreach ($favorited as $literacy)
            <div class="relative">
                <a href="{{ url('literacias/' . $literacy->slug) }}" class="group block w-full">
                    <article class="flex flex-col sm:flex-row items-center sm:items-stretch border-2 border-gray-200 rounded-xl overflow-hidden shadow-md hover:shadow-lg transition-all bg-white">
                        <div class="w-full sm:w-1/4 h-36 sm:h-48 overflow-hidden flex justify-center items-center">
                            @if ($literacy->image)
                                <img
                                    class="object-contain max-w-32 max-h-48 group-hover:scale-105 transition-transform duration-300 ease-out"
                                    src="{{ asset('images/literacies/' . $literacy->image) }}"
                                    alt="{{ $literacy->name }}"
                                    loading="lazy"
                                >
                            @else
                                <img
                                    class="object-contain max-w-32 max-h-48 group-hover:scale-105 transition-transform duration-300 ease-out"
                                    src="{{ asset('images/literacies/default.jpg') }}"
                                    alt="Imagem padrão"
                                    loading="lazy"
                                >
                            @endif
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
        @endforeach

        {{-- Linha separadora --}}
        @if ($favorited->isNotEmpty() && $normal->isNotEmpty())
            <div class="flex items-center justify-center my-8">
                <span class="text-gray-500 font-semibold text-lg flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                    </svg>
                    <span>Literacias Favoritas</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                    </svg>
                </span>
            </div>
        @endif

        {{-- Literacias normais --}}
        @foreach ($normal as $literacy)
            <div class="relative">
                <a href="{{ url('literacias/' . $literacy->slug) }}" class="group block w-full">
                    <article class="flex flex-col sm:flex-row items-center sm:items-stretch border-2 border-gray-200 rounded-xl overflow-hidden shadow-md hover:shadow-lg transition-all bg-white">
                        <div class="w-full sm:w-1/4 h-36 sm:h-48 overflow-hidden flex justify-center items-center">
                            @if ($literacy->image)
                                <img
                                    class="object-contain max-w-32 max-h-48 group-hover:scale-105 transition-transform duration-300 ease-out"
                                    src="{{ asset('images/literacies/' . $literacy->image) }}"
                                    alt="{{ $literacy->name }}"
                                    loading="lazy"
                                >
                            @else
                                <img
                                    class="object-contain max-w-32 max-h-48 group-hover:scale-105 transition-transform duration-300 ease-out"
                                    src="{{ asset('images/literacies/default.jpg') }}"
                                    alt="Imagem padrão"
                                    loading="lazy"
                                >
                            @endif
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
                        <img src="{{ asset('images/fav/nao.png') }}" alt="Não favorito" class="w-8 h-8">
                    </button>
                @endauth
            </div>
        @endforeach

    </div>

    <script>
        document.querySelectorAll('.favorite-btn').forEach(button => {
            button.addEventListener('click', function () {
                let literacyId = this.getAttribute('data-id');
                let icon = this.querySelector('img');
                fetch(`/favorite/${literacyId}`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({})
                })
                .then(response => response.json())
                .then(data => {
                    icon.src = data.favorited ? '{{ asset("images/fav/sim.png") }}' : '{{ asset("images/fav/nao.png") }}';
                });
            });
        });
    </script>
</x-guestLayout>
