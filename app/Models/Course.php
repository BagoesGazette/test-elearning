<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_category_id', 
        'mentor_id',
        'title',
        'job',
        'time',
        'image'
    ];

    public function category(){
        return $this->belongsTo(CourseCategory::class, 'course_category_id', 'id');
    }

    public function mentor(){
        return $this->belongsTo(User::class, 'mentor_id', 'id');
    }

    /**
     * image
     *
     * @return Attribute
     */
    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value ? url('/storage/course/' . $value) : null,
        );
    }
}
