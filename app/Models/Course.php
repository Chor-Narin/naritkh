<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\student;


class Course extends Model
{
    use HasFactory;

    public function student(){
        return $this->belongsToMany(Student::class);
    }


}
