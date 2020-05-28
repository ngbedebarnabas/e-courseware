<?php

namespace App;

use App\Faculty;
use App\Department;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['course_title', 'faculty_id', 'department_id', 'front', 'back', 'pdf'];

    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }

    public function departments()
    {
        return $this->belongsToMany(Department::class);
    }


    public function scopeSearched($query)
    {
        $search = request()->query('search');

        if(!$search){
            return $query;
        }else{

            return $query->where('course_title', 'LIKE', "%{$search}%");
        }
    }
    
}
