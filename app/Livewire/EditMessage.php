<?php

namespace App\Livewire;

use App\Models\Message;
use Flux\Flux;
use Livewire\Attributes\On;
use Illuminate\Validation\Rule;
use Livewire\Component;

class EditMessage extends Component
{
    public $title;
    public $content;
    public $messageId;

    #[On('edit-message')] 
    public function edit($id)
    {
        $message = Message::findOrFail($id);
        $this->messageId = $id;
        $this->title = $message->title;
        $this->content = $message->content;

        Flux::modal('edit-message')->show();
    }

    public function update() 
    {
        $this->validate([
            'title' => ['required', 'string', 'max:255', Rule::unique('messages', 'title')->ignore($this->messageId)],
            'content' => ['required', 'string'],
        ]);

        $message = Message::findOrFail($this->messageId);
        $message->title = $this->title;
        $message->content = $this->content;
        $message->save();

        session()->flash('success', 'Recado atualizado com sucesso!');
        $this->redirectRoute('messages', navigate: true);

        Flux::modal('edit-message')->close();
    }

    public function render()
    {
        return view('livewire.edit-message');
    }
}
