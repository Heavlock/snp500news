<?php

namespace App\Models;

use App\Services\Traits\Translitter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    use Translitter;

    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    static function createTag(array $tag)
    {
        return Tag::firstOrCreate($tag);
    }

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
