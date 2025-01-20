<div>
    <!-- Header branco -->
    <nav class="border-gray-200 bg-white">
        <div class="container mx-auto flex flex-wrap items-center justify-between p-4">
            <a href="/" class="flex items-center">
                <!-- Novo logotipo -->
                <img src="logo1.png" alt="Literacias" class="h-10 mr-3">
                <!-- Removendo o texto e ajustando se necessário -->
            </a>
            <button data-collapse-toggle="mobile-menu" type="button" class="md:hidden ml-3 text-gray-400 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-300 rounded-lg inline-flex items-center justify-center" aria-controls="mobile-menu" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                </svg>
            </button>
            <div class="hidden md:block w-full md:w-auto" id="mobile-menu">
                <ul class="flex flex-col md:flex-row md:space-x-8 mt-4 md:mt-0 md:text-sm md:font-medium">
                    <li>
                        <a href="/sobre" class="bg-blue-700 md:bg-transparent text-white block pl-3 pr-4 py-2 md:text-blue-700 md:p-0 rounded">
                            Sobre nós
                        </a>
                    </li>
                    <li class="relative">
                        <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="text-gray-700 hover:bg-gray-50 border-b border-gray-100 md:hover:bg-transparent md:border-0 pl-3 pr-4 py-2 md:hover:text-blue-700 md:p-0 font-medium flex items-center">
                            Literacias
                            <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        <div id="dropdownNavbar" class="hidden absolute bg-white text-base z-10 list-none divide-y divide-gray-100 rounded shadow my-4 w-44">
                            <ul class="py-1" aria-labelledby="dropdownNavbarLink">
                                <li><a href="#" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2">Dashboard</a></li>
                                <li><a href="#" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2">Settings</a></li>
                                <li><a href="#" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2">Earnings</a></li>
                            </ul>
                            <div class="py-1">
                                <a href="#" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2">Sign out</a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <a href="/literacias" class="text-gray-700 hover:bg-gray-50 border-b border-gray-100 md:hover:bg-transparent md:border-0 block pl-3 pr-4 py-2 md:hover:text-blue-700 md:p-0">
                            Comunidade
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-gray-700 hover:bg-gray-50 border-b border-gray-100 md:hover:bg-transparent md:border-0 block pl-3 pr-4 py-2 md:hover:text-blue-700 md:p-0">
                            Contact
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- LINHA PRETA -->
    <div class="bg-black text-white">
        <div class="container mx-auto flex flex-wrap items-center justify-center p-2">
            <a class="px-4 py-1 text-sm">--></a>
            <a href="/html" class="px-4 py-1 text-sm hover:underline">Literacia Financeira</a>
            <a href="/css" class="px-4 py-1 text-sm hover:underline">Literacia Computacional</a>
            <a href="/css" class="px-4 py-1 text-sm hover:underline">Literacia Digital</a>
            <a class="px-4 py-1 text-sm"><--</a>
        </div>
    </div>
</div>