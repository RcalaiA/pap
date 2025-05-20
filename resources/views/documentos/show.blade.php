<x-guestLayout>
    <section class="py-8 bg-white md:py-16 dark:bg-gray-900 antialiased">
        <div class="max-w-screen-xl px-4 mx-auto 2xl:px-0">
            <div class="lg:grid lg:grid-cols-2 lg:gap-8 xl:gap-16">
                <div class="shrink-0 max-w-md lg:max-w-lg mx-auto">
                    <img class="w-full h-96 object-cover dark:hidden" 
                         src="{{ asset('images/documents/' . $document->image) }}" 
                         alt="{{ $document->title }}" />
                    <img class="w-full h-96 object-cover hidden dark:block" 
                         src="{{ asset('images/documents/' . $document->image) }}" 
                         alt="{{ $document->title }}" />
                </div>

                <div class="mt-6 sm:mt-8 lg:mt-0">
                    <h1 class="text-2xl font-extrabold text-gray-900 sm:text-3xl dark:text-white">
                        {{ $document->title }}
                    </h1>
                    <div class="mt-4 sm:items-center sm:gap-4 sm:flex">
                        <p class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">
                            Fonte: {{ $document->font ?? 'Fonte desconhecida' }}
                        </p>
                    </div>

                    <div class="mt-6 sm:gap-4 sm:items-center sm:flex sm:mt-8">
                        <a href="{{ $document->url }}" target="_blank"
                           class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                            Ver {{ $document->format }}
                        </a>
                    </div>

                    <hr class="my-6 md:my-8 border-gray-200 dark:border-gray-800" />

                    <p class="mb-6 text-gray-500 dark:text-gray-400">
                        {{ $document->description }}
                    </p>

                    {{-- Botão de like --}}
                    @auth
                        @if(auth()->user()->hasVerifiedEmail())
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
                            <p class="text-gray-500 italic">Verifique seu e-mail para curtir este documento.</p>
                        @endif
                    @else
                        <p class="text-gray-500 italic">Faça login para curtir este documento.</p>
                    @endauth
                </div>
            </div>

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

            {{-- Comentários --}}
            <div class="mt-12">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Comentários</h2>

                @auth
                    @if(auth()->user()->hasVerifiedEmail())
                        <form id="comment-form" action="{{ route('comments.store', $document) }}" method="POST" class="mb-6">
                            @csrf
                            <textarea name="content" rows="4" required
                                class="w-full p-3 border border-gray-300 rounded dark:bg-gray-800 dark:border-gray-700 dark:text-white"
                                placeholder="Escreva seu comentário aqui..."></textarea>
                            <button type="submit"
                                    class="mt-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                                Enviar comentário
                            </button>
                        </form>
                    @else
                        <p class="text-gray-500 italic">Verifique seu e-mail para comentar.</p>
                    @endif
                @else
                    <p class="text-gray-500 italic">Faça login para comentar.</p>
                @endauth

                <div>
                    @if ($document->comments->where('parent_id', null)->count() > 0)
                        @php
                            function renderComments($comments, $document) {
                                foreach ($comments as $comment) {
                                    echo '<div class="mb-4 p-4 border border-gray-200 rounded dark:border-gray-700 dark:bg-gray-800">';
                                    echo '<p class="text-gray-800 dark:text-gray-300">'.e($comment->content).'</p>';
                                    echo '<div class="mt-2 text-sm text-gray-500 dark:text-gray-400">';
                                    echo 'Por <strong>'.e($comment->user->name).'</strong> em '.$comment->created_at->format('d/m/Y H:i');
                                    echo '</div>';

                                    if(auth()->check() && auth()->user()->hasVerifiedEmail()) {
                                        echo '<button class="reply-btn mt-2 text-blue-600 hover:underline focus:outline-none" data-comment-id="'.$comment->id.'">Responder</button>';
                                        echo '<form action="'.route('comments.store', $document).'" method="POST" class="reply-form mt-2 hidden" data-parent-id="'.$comment->id.'">';
                                        echo csrf_field();
                                        echo '<textarea name="content" rows="3" required class="w-full p-2 border border-gray-300 rounded dark:bg-gray-800 dark:border-gray-700 dark:text-white" placeholder="Escreva sua resposta aqui..."></textarea>';
                                        echo '<input type="hidden" name="parent_id" value="'.$comment->id.'">';
                                        echo '<button type="submit" class="mt-1 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-1 px-3 rounded">Enviar resposta</button>';
                                        echo '</form>';
                                    }

                                    if ($comment->replies && $comment->replies->count() > 0) {
                                        echo '<div class="ml-6 mt-4 border-l-2 border-gray-300 dark:border-gray-600 pl-4">';
                                        renderComments($comment->replies, $document);
                                        echo '</div>';
                                    }

                                    echo '</div>';
                                }
                            }
                        @endphp

                        @php
                            $rootComments = $document->comments->where('parent_id', null);
                            renderComments($rootComments, $document);
                        @endphp

                    @else
                        <p class="text-gray-500 italic">Nenhum comentário ainda.</p>
                    @endif
                </div>
            </div>
        </div>
    </section>

    {{-- Script do Like e toggle formulário resposta --}}
    @auth
        @if(auth()->user()->hasVerifiedEmail())
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

                $(document).on('click', '.reply-btn', function() {
                    var commentId = $(this).data('comment-id');
                    var form = $('.reply-form[data-parent-id="'+commentId+'"]');
                    form.toggleClass('hidden');
                });
            </script>
        @endif
    @endauth
</x-guestLayout>
