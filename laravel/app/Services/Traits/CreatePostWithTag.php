<?php

namespace App\Services\Traits;

use App\Models\Post;
use App\Models\Tag;

trait CreatePostWithTag
{
    public function createAndAttachPostWithTag(array $postData, array $tagData)
    {
        $post = Post::createPost($postData);
        $tag = Tag::createTag($tagData);
        $post->tags()->attach($tag);
    }
}
