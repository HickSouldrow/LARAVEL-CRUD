<?php

namespace App\Livewire;

use App\Models\Message;
use Flux\Flux;
use Livewire\Component;

class CreateMessage extends Component
{
    public $title;
    public $content;

    protected function rules() 
    {
        return [
            'title' => 'required|string|unique:messages,title|max:255',
            'content' => 'required|string',
        ];
    }

    public function save()
    {
        $this->validate();

        // Lógica para salvar o recado no banco de dados
        Message::create([
            'title' => $this->title,
            'content' => $this->content,
        ]);

        // Reseta os campos
        $this->reset();

        // Fecha a modal
        Flux::modal('create-message')->close();

        // Notificação
        session()->flash('success', 'Recado criado com sucesso!');

        $this->redirectRoute('messages', navigate: true);
    }

    public function render()
    {
        return view('livewire.create-message');
    }
}
