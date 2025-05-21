<x-action-section>
    <x-slot name="title">
        {{ __('Eliminar Conta') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Elimina permanentemente a tua conta.') }}
    </x-slot>

    <x-slot name="content">
        <div class="max-w-xl text-sm text-gray-600">
            {{ __('Uma vez eliminada a tua conta, todos os seus recursos e dados serão permanentemente apagados. Antes de eliminares a tua conta, por favor descarrega quaisquer dados ou informações que queiras manter.') }}
        </div>

        <div class="mt-5">
            <x-danger-button wire:click="confirmUserDeletion" wire:loading.attr="disabled">
                {{ __('Eliminar Conta') }}
            </x-danger-button>
        </div>

        <!-- Modal de Confirmação para Eliminar Conta -->
        <x-dialog-modal wire:model.live="confirmingUserDeletion">
            <x-slot name="title">
                {{ __('Eliminar Conta') }}
            </x-slot>

            <x-slot name="content">
                {{ __('Tens a certeza que queres eliminar a tua conta? Uma vez eliminada, todos os seus recursos e dados serão permanentemente apagados. Por favor, introduz a tua palavra-passe para confirmar que queres eliminar definitivamente a tua conta.') }}

                <div class="mt-4" x-data="{}" x-on:confirming-delete-user.window="setTimeout(() => $refs.password.focus(), 250)">
                    <x-input type="password" class="mt-1 block w-3/4"
                                autocomplete="current-password"
                                placeholder="{{ __('Palavra-passe') }}"
                                x-ref="password"
                                wire:model="password"
                                wire:keydown.enter="deleteUser" />

                    <x-input-error for="password" class="mt-2" />
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-secondary-button wire:click="$toggle('confirmingUserDeletion')" wire:loading.attr="disabled">
                    {{ __('Cancelar') }}
                </x-secondary-button>

                <x-danger-button class="ms-3" wire:click="deleteUser" wire:loading.attr="disabled">
                    {{ __('Eliminar Conta') }}
                </x-danger-button>
            </x-slot>
        </x-dialog-modal>
    </x-slot>
</x-action-section>
