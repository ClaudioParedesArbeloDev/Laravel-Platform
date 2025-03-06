<div> 
    <div>
        <p>{{$name}}</p>
        <input type="text" wire:model.live="message">
        <button wire:click="send">{{__('send')}}</button>
        <small>{{$message}}</small>
    </div>
   
</div>