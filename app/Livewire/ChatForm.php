<?php

namespace App\Livewire;

use Livewire\Component;
use App\Events\SendMessage;

class ChatForm extends Component
{

    public $name;

    public $message;
    
    public $avatar;

    public function mount($user){
        $this->name = $user->username;

        if(!empty($user->avatar))
            $this->avatar = $user->avatar->avatar;

        $this->message = '';

         $data = [
            'user' => $this->name,
            'message' => $this->message,
            'avatar' => $this->avatar
         ];
         $this->dispatch('messageReceived', $data);
    }
    
    public function send(){
       $this->validate([
            'message' => 'required',
        ]);
       $this->dispatch("messageSend");

       $data = [
        'user' => $this->name,
        'message' => $this->message,
        'avatar' => $this->avatar
        
       ];

       $this->dispatch("messageReceived", $data);

       event(new SendMessage($this->name, $this->message, $this->avatar));

       $this->message = '';
    }

    public function render()
    {
         return view('livewire.chat-form');

    }

}
