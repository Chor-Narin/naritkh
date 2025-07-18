<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Comment;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'content'];

    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
