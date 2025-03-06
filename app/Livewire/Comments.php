<?php


namespace App\Livewire;

use Livewire\Component;
use App\Models\Comment;
use App\Models\Blog;
use Illuminate\Support\Facades\Auth;


class Comments extends Component
{
    public $comments = [];
    public $comment = '';
    public $user;
    public $blog_id;

    public function mount($blog_id)
    {
        
        $this->blog_id = $blog_id;
        $this->user = Auth::user();
        $this->comments = Comment::where('blog_id', $this->blog_id)
                                ->latest()
                                ->with('user')
                                ->get();
    }

    public function addComment()
    {
        if (!Auth::check()) {
            // Si el usuario no está autenticado, redirige a la página de login
            return redirect()->route('login');
        }

        $this->user = Auth::user();
        if(!empty($this->comment)){
        
        Comment::create([
            'user_id' => $this->user->id,
            'blog_id' => $this->blog_id,
            'content' => $this->comment
        ]);

        $this->comment = '';

        $this->comments = Comment::where('blog_id', $this->blog_id)->latest()->get();
       }
    }




    public function render()
    {
        return view('livewire.comments');
    }
}
