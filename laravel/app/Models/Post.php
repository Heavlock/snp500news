<?php

namespace App\Models;

use App\Services\Traits\Translitter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    use Translitter;

    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    static function createPost(array $post)
    {
        return Post::firstOrCreate($post);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

}
