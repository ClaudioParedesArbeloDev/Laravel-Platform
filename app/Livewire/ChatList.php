<?php

namespace App\Livewire;

use Livewire\Component;

use Livewire\Attributes\On;

class ChatList extends Component
{
    public $messages = [];

    #[On('messageReceived')]
    public function messageReceived($message)
    {
        $this->messages[] = $message;
    }

    public function render()
    {
        return view('livewire.chat-list');
    }
}
