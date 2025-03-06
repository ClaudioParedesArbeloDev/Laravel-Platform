<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Comment;
use App\Models\Blog;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;


class LikeButton extends Component
{
    public $model;
    public $isLiked;
    public $likesCount;

    public function mount($model)
    {
        $this->model = $model;
        $this->isLiked = $model->isLikedBy(Auth::user());
        $this->likesCount = $model->likes()->count();
    }

    public function toggleLike()
    {
        if ($this->isLiked) {
            $this->model->likes()->where('user_id', Auth::id())->delete();
            $this->isLiked = false;
            $this->likesCount--;
        } else {
            $this->model->likes()->create(['user_id' => Auth::user()->id]);
            $this->isLiked = true;
            $this->likesCount++;
        }
    }


    public function render()
    {
        return view('livewire.like-button');
    }
}
