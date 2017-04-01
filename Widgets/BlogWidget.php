<?php namespace Modules\Theme\Widgets;

use Modules\Blog\Repositories\PostRepository;

class BlogWidget
{
    private $post;

    public function __construct(PostRepository $post)
    {
        $this->post = $post;
    }

    public function latest($amount = 5)
    {
        if($posts = $this->post->latest($amount))
        {
            return view('widgets.blog.latestposts', compact('posts'));
        }
        return false;
    }
}