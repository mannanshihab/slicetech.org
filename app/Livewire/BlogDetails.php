<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Attributes\Title;
use Livewire\Component;
#[Title('Blog Details')]
class BlogDetails extends Component
{
    public $post_id;
    public $auther;
    public $title;
    public $image;
    public $description;
    public $create_at;

    public function mount($slug)
    {
        $post = Post::where('slug', $slug)->first();
        $this->post_id = $post->id;
        $this->auther = $post->user->name;
        $this->title = $post->title;
        $this->image = $post->image;
        $this->description = $post->description;
        $this->create_at = $post->created_at->diffForHumans();
    }
    public function render()
    {
        return view('livewire.blog-details');
    }
}
