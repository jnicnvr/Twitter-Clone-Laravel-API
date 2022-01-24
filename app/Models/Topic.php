<?php

namespace App\Models;

use App\Models\User;
use App\Traits\isOrderable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Topic extends Model
{
    use HasFactory, isOrderable;

    protected $fillable = [
        'title'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
