<x-guestLayout>

    {{-- Hero com vídeo de fundo e texto verde --}}
    <section class="relative w-full h-screen overflow-hidden bg-black text-white">
        <video autoplay muted loop class="absolute inset-0 w-full h-full object-cover opacity-30">
            <source src="{{ asset('images/logos/video.mp4') }}" type="video/mp4">
        </video>
        <div class="relative z-10 flex flex-col justify-center items-center h-full px-6 text-center">
            <h1 class="text-5xl md:text-6xl font-extrabold leading-tight drop-shadow-lg text-green-500">
                Literacia é Poder
            </h1>
            <p class="mt-4 text-xl max-w-2xl text-green-500">
                Junte-se a uma comunidade dedicada à construção de competências essenciais para o século XXI.
            </p>
        </div>
    </section>

    {{-- Destaques rápidos com dados de literacia digital, financeira e saúde em Portugal --}}
    <section class="bg-white py-16">
        <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-3 gap-10 text-center">
            <div>
                <h3 class="text-2xl font-bold text-green-600">29,9%</h3>
                <p class="mt-2 text-gray-600">População com literacia digital acima do nível básico</p>
            </div>
            <div>
                <h3 class="text-2xl font-bold text-green-600">63%</h3>
                <p class="mt-2 text-gray-600">Pontuação no indicador global de literacia financeira</p>
            </div>
            <div>
                <h3 class="text-2xl font-bold text-green-600">73%</h3>
                <p class="mt-2 text-gray-600">População com literacia em saúde inadequada</p>
            </div>
        </div>
    </section>

    {{-- Sobre o projeto --}}
    <x-margins>
        <x-section title="A Nossa Missão">
            <div class="grid md:grid-cols-2 gap-8 items-start text-green-600">
                <div>
                    <p class="mb-4">
                        No mundo atual, ler e escrever é só o começo. A nossa missão é garantir que cada jovem e adulto desenvolva as ferramentas necessárias para navegar num mundo cada vez mais complexo — desde a literacia tradicional até às competências digitais.
                    </p>
                    <p class="mb-4">
                        Trabalhamos em alinhamento com os Objetivos de Desenvolvimento Sustentável da ONU para alcançar uma mudança real até 2030.
                    </p>
                    <p>
                        Através de parcerias, investigação e tecnologia, oferecemos recursos educativos que fazem a diferença.
                    </p>
                </div>
                <div>
                    <img src="{{ asset('images/literacies/rights.png') }}" alt="Gráfico de Literacia" class="rounded-xl shadow-lg w-3/4 mx-auto">
                </div>
            </div>
        </x-section>
    </x-margins>

</x-guestLayout>
