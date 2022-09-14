<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = "posts";
    
    protected $fillable = [
        'author_id',
        'user_id',
        'type_id',
        'title',
        'commentable_id',
        'commentable_type',
        'metaTitle',
        'post_img',
        'slug',
        'summary',
        'published',
        'hiden',
        'published_at',
        'content',
    ];
    
    
    public function comments()
    {
        // return $this->hasMany(Comment::class)->whereNull('parent_id');
        return $this->morphMany(Comment::class, 'commentable')->whereNull('parent_id');
        
    }
}
