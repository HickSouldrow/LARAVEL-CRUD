<div>
    <flux:modal 
        name="create-message" 
        class="md:w-900 bg-neutral-900 border border-lime-500 shadow-xl rounded-xl">

        <div class="space-y-6 text-neutral-200">
            
            <div>
                <flux:heading size="lg" class="text-lime-500 font-semibold">
                    Criar Recado
                </flux:heading>

                <flux:text class="mt-2 text-neutral-400">
                    Crie um novo recado
                </flux:text>
            </div>

            <flux:input 
                wire:model="title"
                label="Título do Recado"
                placeholder="Digite o título..."
                class="bg-neutral-800 border-lime-900 text-neutral-100" />

            <flux:textarea
                wire:model="content"
                label="Conteúdo"
                placeholder="Escreva algo..."
                class="bg-neutral-800 border-lime-400 text-neutral-100" />

            <div class="flex">
                <flux:spacer />

                <flux:button 
                    type="submit"
                    variant="primary"
                    wire:click="save"
                    class="cursor-pointer bg-lime-500 hover:bg-lime-500 border border-lime-400 text-black font-semibold">
                    Salvar Recado
                </flux:button>
            </div>
        </div>
        
    </flux:modal>
</div>
