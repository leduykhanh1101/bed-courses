<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'content',
        'author',
        'status',
    ];

    public function categories()
    {
        return $this->belongsToMany(
            PostCategory::class,
            'post_ref_category',
            'post_id',
            'post_category_id'
        );
    }
}
