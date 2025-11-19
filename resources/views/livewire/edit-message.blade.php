<div>
    <flux:modal 
        name="edit-message" 
        class="md:w-900 bg-neutral-900 border border-lime-600 shadow-xl rounded-xl">

        <div class="space-y-6 text-neutral-200">
            
            <div>
                <flux:heading size="lg" class="text-lime-600 font-semibold">
                    Editar Recado
                </flux:heading>

                <flux:text class="mt-2 text-neutral-400">
                    Edite seu recado
                </flux:text>
            </div>

            <flux:input 
                wire:model="title"
                label="Título do Recado"
                placeholder="Digite o título..."
                class="bg-neutral-800 border-lime-500 text-neutral-100" />

            <flux:textarea
                wire:model="content"
                label="Conteúdo"
                placeholder="Edite seu recado..."
                class="bg-neutral-800 border-lime-600 text-neutral-100" />

            <div class="flex">
                <flux:spacer />

                <flux:button 
                    type="submit" 
                    variant="primary"
                    wire:click="update"
                    class="cursor-pointer bg-lime-600 hover:bg-lime-500 border border-lime-600 text-black font-semibold">
                    Atualizar Recado
                </flux:button>
            </div>
        </div>
        
    </flux:modal>
</div>
