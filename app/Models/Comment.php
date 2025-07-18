<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['post_id', 'comment_text'];

    public function post(){
        return $this->belongsTo(Post::class);
    }
}
