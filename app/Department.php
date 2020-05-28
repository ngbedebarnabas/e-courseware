<?php

namespace App;

use App\Question;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = ['name'];



    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
