<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use Sluggable;

    protected $fillable = [
        'title', 'image', 'body', 'iframe', 'user_id'
    ];

    /**
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
                'onUpdate' => true
            ]
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function getGetExcerptAttribute(): string
    {
        return Str::limit($this->body, 140);
    }

    public function getGetImageAttribute()
    {
        if ($this->image) {
            return url("storage/{$this->image}");
        }

        return '';
    }
}
