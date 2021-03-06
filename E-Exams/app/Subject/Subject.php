<?php

namespace App\Subject;

use App\Department;
use App\Level;
use App\Professor;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $guarded=[];

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function departments()
    {
        return $this->belongsToMany(Department::class)->withTimestamps();
    }

    public function professor()
    {
        return $this->belongsTo(Professor::class);
    }

    public function exams()
    {
        return $this->hasMany(Exam::class);
    }
    public function chapters()
    {
        return $this->hasMany(Chapter::class);
    }


    public function scopeLevel($query,$level)
    {
        return $query->where('level_id',$level);
    }
    public function scopeCurrentTerm($query,$term)
    {
        return $query->where('term',$term);
    }
    public function scopeDepartment($query,$dept)
    {
        return $query->where('department_id',$dept);
    }


}
