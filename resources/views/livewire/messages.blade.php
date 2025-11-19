<div class="relative mb-6 w-full">
    <flux:heading size="xl" level="1">{{ __('Recados') }}</flux:heading>
    <flux:subheading size="lg" class="mb-6">{{ __('Gerencie seus recados') }}</flux:subheading>
    <flux:separator variant="subtle" />

    <livewire:create-message />
    <flux:modal.trigger name="create-message">
        <flux:button class="mt-4">Criar Recado</flux:button>
    </flux:modal.trigger>
    <livewire:edit-message />

    {{-- Lista dos Recados --}}
    <div class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base border border-default mt-4">
        <table class="w-full text-sm text-left rtl:text-right text-body">
            <thead class="bg-neutral-secondary-soft border-b border-default">
                <tr>
                    <th scope="col" class="px-6 py-3 font-medium">
                        Título
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium">
                        Conteúdo
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium">
                        Ações
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($messages as $message)
                    <tr class="odd:bg-neutral-primary even:bg-neutral-secondary-soft border-b border-default">
                        <td class="px-6 py-4">
                            {{ $message->title }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $message->content }}
                        </td>
                        <td class="px-6 py-4 space-x-2">
                            <flux:button wire:click="edit({{ $message->id }})" class="cursor-pointer">Editar</flux:button>
                            <flux:button wire:click="delete({{ $message->id }})" class="cursor-pointer" variant="danger">Excluir</flux:button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="px-4 py-2 text-center text-gray-500">
                            Nenhum recado encontrado.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Excluir --}}
    <flux:modal name="delete-message" class="min-w-[22rem]">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Excluir Recado</flux:heading>

                <flux:text class="mt-2">
                    Você tem certeza que deseja excluir esse recado?<br>
                    Essa ação não pode ser desfeita.
                </flux:text>
            </div>

            <div class="flex gap-2">
                <flux:spacer />

                <flux:modal.close>
                    <flux:button variant="ghost" class="cursor-pointer">Cancelar</flux:button>
                </flux:modal.close>

                <flux:button type="submit" variant="danger" wire:click="confirmDelete()" class="cursor-pointer">Excluir Recado</flux:button>
            </div>
        </div>
    </flux:modal>

    @session('success')
        <div
            x-data="{ show: true }"
            x-show="show"
            x-init="setTimeout(() => {show = false}, 3000)"
            class="fixed top-5 right-5 z-50 rounded-md bg-green-100 p-4 text-sm text-green-600 shadow-md"
            role="alert"
        >
            <p>{{ $value }}</p>
        </div>
    @endsession
    
    {{-- Paginação --}}
    <div class="mt-4">
        {{ $messages->links() }}
    </div>
</div>
