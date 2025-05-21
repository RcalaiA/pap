<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <img src="{{ asset('images/logos/logo2.png') }}" alt="Logo" />
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Esqueceu-se da palavra-passe? Não há problema. Basta indicar o seu endereço de email e nós enviaremos um link para redefinir a palavra-passe que lhe permitirá escolher uma nova.') }}
        </div>

        @session('status')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ $value }}
            </div>
        @endsession

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Enviar Link para Redefinir Palavra-passe') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
