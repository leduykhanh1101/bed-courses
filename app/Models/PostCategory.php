<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'title',
        'description',
        'content',
    ];

    public function posts()
    {
        return $this->belongsToMany(
            Post::class,
            'post_ref_category',
            'post_category_id',
            'post_id'
        );
    }
}
