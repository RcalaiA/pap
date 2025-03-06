<x-guestLayout>
    <div class="max-w-6xl mx-auto my-12 px-4 space-y-6">
        @foreach ($literacies as $literacy)
            <a 
                href="{{ url('literacias/' . $literacy->slug) }}" 
                class="group block w-full" 
                aria-label="Learn more about {{ $literacy->name }}"
            >
                <article 
                    class="flex flex-col sm:flex-row items-center sm:items-stretch border-2 border-gray-200 rounded-xl overflow-hidden shadow-md hover:shadow-lg transition-all bg-white"
                >
                    <div class="w-full sm:w-1/4 h-36 sm:h-48 overflow-hidden">
                        <img 
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300 ease-out" 
                            src="{{ asset('images/literacies/' . $literacy->image) }}" 
                            srcset="{{ asset('images/literacies/' . $literacy->image) }} 1x, {{ asset('images/literacies/' . $literacy->image_high_res) }} 2x" 
                            alt="{{ $literacy->name }}" 
                            loading="lazy"
                        >
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
        @endforeach
    </div>
</x-guestLayout>
