<?php

namespace App\Livewire;

use App\Models\Message;
use Flux\Flux;
use Livewire\Component;
use Livewire\WithPagination;

class Messages extends Component
{
    use WithPagination;
    public $messageid;
    public function render()
    {
        $messages = Message::orderby('created_at', 'desc')->paginate(5);
        return view('livewire.messages', [
            'messages' => $messages,
        ]);
    }

    public function edit($id) 
    {
        $this->dispatch('edit-message', $id); 
    }

    public function delete($id) 
    {
        $this->messageid = $id;
        Flux::modal('delete-message')->show();
    }

    public function confirmDelete() 
    {
        Message::find($this->messageid)->delete();
        Flux::modal('delete-message')->close();

        session()->flash('success', 'Recado deletado com sucesso!');
        $this->redirectRoute('messages', navigate: true);
    }
}
