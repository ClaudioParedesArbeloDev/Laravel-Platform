<div>
    <button wire:click="toggleLike" class="likeButton">
        @if ($isLiked)
        <i class="fa-solid fa-thumbs-up like"></i>
        
        @else
        <i class="fa-regular fa-thumbs-up dislike"></i>
        @endif
    </button>
    <span>{{ $likesCount }}</span>
</div>
