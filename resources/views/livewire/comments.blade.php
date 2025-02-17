
<div>
    <h3 class="title">Comentarios</h3>

    <div class="inputComment">
        @if (!Auth::check())
            <img src="{{asset('images/avatars/avatar.png')}}" alt="avatar" class="avatarSidebar">
            <textarea wire:model="comment"  rows="4" placeholder="Necesita estar logueado para comentar"></textarea>
            <button wire:click="addComment">Comentar</button>
        @else
            @if (Auth::user()->avatar == null)
                <img src="{{asset('images/avatars/avatar.png')}}" alt="avatar" class="avatarSidebar">
            @else
                <img src="{{asset('storage/avatars/'.Auth::user()->avatar->avatar)}}" alt="avatar" class="avatarSidebar">                    
            @endif
            <textarea wire:model="comment"  rows="4" placeholder="Escribe tu comentario"></textarea>
            <button wire:click="addComment">Comentar</button>
        @endif
    </div>

    
    <ul class="comments">
        @foreach($comments as $comment)
            <li class="comment">
                 @if ($comment->user->avatar == null)
                <img src="{{asset('images/avatars/avatar.png')}}" alt="avatar" class="avatarSidebar">
            @else
                <img src="{{asset('storage/avatars/'.$comment->user->avatar->avatar)}}" alt="avatar" class="avatarSidebar">                    
            @endif
            <div class="commentBody">
                <p>{{$comment->user->name}} {{$comment->user->lastname}}</p>
                <p>{{$comment->content}}</p>
                
                
                <livewire:like-button :model="$comment" />
            </div>
            <p>{{ $comment->created_at->diffForHumans() }}</p>
                
        </li>
        @endforeach
    </ul>
</div>