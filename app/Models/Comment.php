<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Comment extends Model
{
    use HasFactory;
    use Sluggable;

    const STATUS_PUBLISHED = 'published';
    const STATUS_WAITING_MODERATION = 'in_moderation';
    const STATUS_ARCHIVED = 'archived';

    const REPORTS_TO_HIDE = 5;

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'content',
                'onUpdate' => true,
            ],
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function reports()
    {
        return $this->hasMany(Report::class);
    }

    // Determine if a comment should be hidden
    public function shouldBeHidden()
    {
        return $this->status == self::STATUS_WAITING_MODERATION
            || $this->reports->count() >= self::REPORTS_TO_HIDE;
    }
}
