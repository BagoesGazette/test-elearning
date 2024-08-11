<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WatchTime extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'course_id',
        'watch_time'
    ];

    public function course(){
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
