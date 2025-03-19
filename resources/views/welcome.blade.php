<x-guestLayout>
    {{--
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

            @guest  
                <a href="/register" 
                   class="mt-6 inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg shadow-lg">
                    Junte-se a nós
                </a>
            @endguest

        </div>
    </div>

    <x-stories :stories="$stories"/>

    --}}

    <x-hero/>

    <x-margins>

        <x-section title="What is our purpose?">  
            <p>Despite the steady rise in literacy rates over the past 50 years, there are still 754 million illiterate adults around the world, most of whom are women. These numbers produced by the UIS are a stark reminder of the work ahead to meet the Sustainable Development Goals (SDGs), especially Target 4.6 to ensure that all youth and most adults achieve literacy and numeracy by 2030.
            <p>Current literacy data are generally collected through population censuses or household surveys in which the respondent or head of the household declares whether they can read and write with understanding a short, simple statement about one's everyday life in any written language. Some surveys require respondents to take a quick test in which they are asked to read a simple passage or write a sentence, yet clearly literacy is a far more complex issue that requires more information.</p>
            <p>For the UIS, the existing dataset serves as a placeholder for a new generation of indicators being developed with countries and partners under the umbrella of the Global Alliance to Monitor Learning (GAML).</p>
            <p>GAML is developing the methodologies needed to gather more nuanced data and the tools required for their standardisation. In particular, the Alliance is finding ways to link existing large-scale assessments to produce comparable data to monitor the literacy skills of children, youth and adults. This involves close collaboration with a wide range of partners.</p></p>
        </x-section>

        <x-section title="The Foundation of 21st-Century Skills">          
            <p>Digital literacy encompasses a range of skills, from basic computer use to advanced problem-solving in digital environments. These skills are integral to what educators often refer to as “21st-century skills,” which include critical thinking, creativity, collaboration, and communication. In a world where information is at our fingertips, students must be adept at not only accessing digital information but also evaluating its credibility and using it effectively.</p>
            <p>For students, particularly those in the Transition Year, developing these skills early on provides a strong foundation for future learning and career opportunities. Transition Year students who engage in digital literacy programs are better equipped to handle the complexities of higher education and the workforce, where digital competence is increasingly valued.</p>
        </x-section>

    </x-margins>

</x-guestLayout>
