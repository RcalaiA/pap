<x-guestLayout>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 max-w-6xl mx-auto my-12 px-4">
        @foreach ($literacies as $literacy)
            <a 
                href="{{ url('literacias/' . $literacy->slug) }}" 
                class="group block" 
                aria-label="Learn more about {{ $literacy->name }}"
            >
                <article 
                    class="border-2 border-gray-200 rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-shadow bg-white"
                >
                    <img 
                        class="h-40 w-full object-cover group-hover:scale-105 transition-transform" 
                        src="{{ asset('images/literacies/' . $literacy->image) }}" 
                        srcset="{{ asset('images/literacies/' . $literacy->image) }} 1x, {{ asset('images/literacies/' . $literacy->image_high_res) }} 2x" 
                        alt="{{ $literacy->name }}" 
                        loading="lazy"
                    >
                    <div class="p-4">
                        <h2 
                            class="text-center text-lg font-semibold text-gray-800 group-hover:text-blue-500 transition-colors"
                        >
                            {{ $literacy->name }}
                        </h2>
                        <p class="text-center text-sm text-gray-600 mt-2">
                            {{ Str::limit($literacy->description, 80) }}
                        </p>
                    </div>
                </article>
            </a>
        @endforeach
    </div>
</x-guestLayout>

