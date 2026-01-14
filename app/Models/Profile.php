<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
        'email',
        'password',
        'email_verified_at'
    ];

    // quan he
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
