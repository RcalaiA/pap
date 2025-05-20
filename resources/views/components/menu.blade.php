<div>
    @auth
        @if (!Auth::user()->hasVerifiedEmail())
            <div class="bg-yellow-400 text-black text-center py-2 font-medium">
                <span>Por favor, verifique o seu email.</span>
                <a href="{{ route('verification.notice') }}" class="ml-2 underline hover:text-blue-800 transition-colors duration-200">
                    Verificar agora
                </a>
            </div>
        @endif
    @endauth

    <nav class="border-b border-gray-200 bg-white shadow-sm">
        <div class="container mx-auto flex flex-wrap items-center justify-between py-4 px-6">
            <a href="/" class="flex items-center">
                <img src="{{ asset('images/logos/logo2.png') }}" alt="Literacias" class="h-12 mr-6">
            </a>

            <div class="flex items-center space-x-8">
                <!-- Links principais -->
                <div class="hidden md:flex md:items-center md:space-x-8">
                    <a href="/literacias" class="text-gray-700 hover:text-blue-700 transition-colors duration-200 font-medium tracking-wide">Literacias</a>
                    <a href="/comunidade" class="text-gray-700 hover:text-blue-700 transition-colors duration-200 font-medium tracking-wide">Comunidade</a>
                </div>

                <!-- Ícone do utilizador -->
                <div class="relative">
                    <button id="userDropdownBtn" class="focus:outline-none">
                        <img src="{{ asset('images/logos/user_icon.png') }}" alt="User Icon" class="w-10 h-10 rounded-full border border-gray-300 shadow-sm hover:ring-2 hover:ring-blue-300 transition-all duration-200">
                    </button>

                    <div id="userDropdownMenu" class="hidden absolute right-0 mt-3 w-52 bg-white rounded-lg shadow-lg ring-1 ring-gray-200 z-50">
                        <div class="py-1">
                            @auth
                                <a href="{{ route('favorites.index') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 transition duration-150">Favoritos</a>
                                <a href="/user/profile" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 transition duration-150">Definições</a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="block w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100 transition duration-150">Sair</button>
                                </form>
                            @else
                                <a href="/login" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 transition duration-150">Entrar</a>
                                <a href="/register" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 transition duration-150">Registar</a>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const userDropdownBtn = document.getElementById("userDropdownBtn");
    const userDropdownMenu = document.getElementById("userDropdownMenu");

    userDropdownBtn.addEventListener("click", function (event) {
        event.stopPropagation();
        userDropdownMenu.classList.toggle("hidden");
    });

    document.addEventListener("click", function (event) {
        if (!userDropdownBtn.contains(event.target) && !userDropdownMenu.contains(event.target)) {
            userDropdownMenu.classList.add("hidden");
        }
    });
});
</script>
