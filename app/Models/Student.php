<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Course;


class Student extends Model
{
    use HasFactory;

    public function course(){
        return $this->belongsToMany(Course::class);
    }
}
