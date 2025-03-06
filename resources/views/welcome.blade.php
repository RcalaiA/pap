<x-guestLayout>
    <div class="relative w-full h-screen overflow-hidden">
        <video class="absolute top-0 left-0 w-full h-full object-cover" autoplay muted loop>
            <source src="{{ asset('images/logos/video.mp4') }}" type="video/mp4">
        </video>

        <div class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-50"></div>

        <div class="relative flex flex-col justify-center items-center h-full text-center text-white px-4">
            <h1 class="text-5xl font-bold">Bem-vindo ao Literacias</h1>
            <p class="mt-4 text-lg max-w-2xl">
                Um espaço dedicado à promoção e ensino da literacia. Explore nossos recursos e junte-se à comunidade.
            </p>

            @guest  {{-- Mostra o botão apenas para visitantes (não logados) --}}
                <a href="/register" 
                   class="mt-6 inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg shadow-lg">
                    Junte-se a nós
                </a>
            @endguest

        </div>
    </div>
</x-guestLayout>
