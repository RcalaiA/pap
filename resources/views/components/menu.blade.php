<div>
    <!-- Header branco -->
    <nav class="border-gray-200 bg-white">
        <div class="container mx-auto flex flex-wrap items-center justify-between p-4">
            <a href="/" class="flex items-center">
                <img src="{{ asset('images/logos/logo2.png') }}" alt="Literacias" class="h-12 mr-7">
            </a>

            <div class="flex items-center space-x-8">
                <!-- Links-->
                <div class="hidden md:flex md:items-center md:space-x-6">
                    <a href="/literacias" class="text-gray-700 hover:text-blue-700">Literacias</a>
                    <a href="/comunidade" class="text-gray-700 hover:text-blue-700">Comunidade</a>
                    <!-- <a href="/contacto" class="text-gray-700 hover:text-blue-700">Contacto</a> -->
                </div>

                <div class="relative">
                    <button id="userDropdownBtn" class="focus:outline-none">
                        <img src="{{ asset('images/logos/user_icon.png') }}" alt="User Icon" class="w-10 h-10 rounded-full border border-gray-300 shadow-sm">
                    </button>

                    <div id="userDropdownMenu" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg z-50">
                        @auth
                            <!-- Se estiver o email confirmado -->
                            <a href="/user/profile" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Defenições</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="block w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100">Sair</button>
                            </form>
                        @else
                            <!-- Se NÃO estiver o email confirmado -->
                            <a href="/login" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Entrar</a>
                            <a href="/register" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Registar</a>
                        @endauth
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
        event.stopPropagation(); // Evita que o clique feche imediatamente
        userDropdownMenu.classList.toggle("hidden");
    });

    document.addEventListener("click", function (event) {
        if (!userDropdownBtn.contains(event.target) && !userDropdownMenu.contains(event.target)) {
            userDropdownMenu.classList.add("hidden");
        }
    });
});
</script>
