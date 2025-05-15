<x-guestLayout>
    <section class="py-8 bg-white md:py-16 dark:bg-gray-900 antialiased">
        <div class="max-w-screen-xl px-4 mx-auto 2xl:px-0">
            <div class="lg:grid lg:grid-cols-2 lg:gap-8 xl:gap-16">
                <!-- Imagem do documento com tamanho maior -->
                <div class="shrink-0 max-w-md lg:max-w-lg mx-auto">
                    <img class="w-full h-96 object-cover dark:hidden" 
                         src="{{ asset('images/documents/' . $document->image) }}" 
                         alt="{{ $document->title }}" />
                    <img class="w-full h-96 object-cover hidden dark:block" 
                         src="{{ asset('images/documents/' . $document->image) }}" 
                         alt="{{ $document->title }}" />
                </div>

                <!-- Informações do documento -->
                <div class="mt-6 sm:mt-8 lg:mt-0">
                    <!-- Título e fonte -->
                    <h1 class="text-2xl font-extrabold text-gray-900 sm:text-3xl dark:text-white">
                        {{ $document->title }}
                    </h1>
                    <div class="mt-4 sm:items-center sm:gap-4 sm:flex">
                        <p class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">
                            Fonte: {{ $document->font ?? 'Fonte desconhecida' }}
                        </p>
                    </div>

                    <div class="mt-6 sm:gap-4 sm:items-center sm:flex sm:mt-8">
                        <!-- Link para abrir o documento -->
                        <a href="{{ $document->url }}" target="_blank"
                           class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                            Ver {{ $document->format }}
                        </a>
                    </div>

                    <hr class="my-6 md:my-8 border-gray-200 dark:border-gray-800" />

                    <!-- Descrição do Documento -->
                    <p class="mb-6 text-gray-500 dark:text-gray-400">
                        {{ $document->description }}
                    </p>

                    {{-- Botão de like --}}
                    @auth
                        <div class="flex items-center gap-2">
                            <button id="like-btn" data-document-id="{{ $document->id }}" class="focus:outline-none">
                                <img id="like-icon"
                                     src="{{ auth()->user()->likedDocuments->contains($document->id) ? asset('images/like/like.png') : asset('images/like/no_like.png') }}"
                                     alt="Like"
                                     class="w-8 h-8" />
                            </button>
                            <span id="likes-count" class="text-gray-700 dark:text-gray-300">
                                {{ $document->likes()->count() }}
                            </span>
                        </div>
                    @else
                        <p class="text-gray-500 italic">Faça login para curtir este documento.</p>
                    @endauth

                </div>
            </div>

            <!-- Nova seção com as informações horizontais -->
            <div class="mt-12 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
                <div class="flex flex-col items-center">
                    <strong class="text-gray-900 dark:text-white">Formato:</strong>
                    <p class="text-gray-500 dark:text-gray-400">{{ $document->format }}</p>
                </div>

                <div class="flex flex-col items-center">
                    <strong class="text-gray-900 dark:text-white">Faixa Etária:</strong>
                    <p class="text-gray-500 dark:text-gray-400">{{ $document->age_group }}</p>
                </div>

                <div class="flex flex-col items-center">
                    <strong class="text-gray-900 dark:text-white">Interativo:</strong>
                    <p class="text-gray-500 dark:text-gray-400">
                        {{ $document->is_interactive ? 'Sim' : 'Não' }}
                    </p>
                </div>

                <div class="flex flex-col items-center">
                    <strong class="text-gray-900 dark:text-white">Possui Download:</strong>
                    <p class="text-gray-500 dark:text-gray-400">
                        {{ $document->has_download ? 'Sim' : 'Não' }}
                    </p>
                </div>

                <div class="flex flex-col items-center">
                    <strong class="text-gray-900 dark:text-white">Duração:</strong>
                    <p class="text-gray-500 dark:text-gray-400">
                        @if($document->duration)
                            {{ $document->duration }} minutos
                        @else
                            Não disponível
                        @endif
                    </p>
                </div>

                <div class="flex flex-col items-center">
                    <strong class="text-gray-900 dark:text-white">Idioma:</strong>
                    <p class="text-gray-500 dark:text-gray-400">{{ $document->language }}</p>
                </div>

                <div class="flex flex-col items-center">
                    <strong class="text-gray-900 dark:text-white">Fonte:</strong>
                    <p class="text-gray-500 dark:text-gray-400">{{ $document->font }}</p>
                </div>

                <div class="flex flex-col items-center">
                    <strong class="text-gray-900 dark:text-white">Data de Publicação:</strong>
                    <p class="text-gray-500 dark:text-gray-400">
                        @if($document->published_at)
                            {{ \Carbon\Carbon::parse($document->published_at)->format('d/m/Y') }}
                        @else
                            Não disponível
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- Script do Like --}}
    @auth
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $('#like-btn').click(function() {
            var documentId = $(this).data('document-id');
            $.ajax({
                url: '/documentos/' + documentId + '/like',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    if(data.liked) {
                        $('#like-icon').attr('src', '{{ asset('images/like/like.png') }}');
                    } else {
                        $('#like-icon').attr('src', '{{ asset('images/like/no_like.png') }}');
                    }
                    $('#likes-count').text(data.likes_count);
                },
                error: function() {
                    alert('Erro ao registrar o like. Tente novamente.');
                }
            });
        });
    </script>
    @endauth
</x-guestLayout>
