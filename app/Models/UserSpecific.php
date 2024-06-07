<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $table = 'users';
    protected $primaryKey = 'user_specific_id';
    public $timestamps = false;

    protected $fillable = [
        'user_level_id',
        'email',
        'username',
        'password'
    ];

    public function userLevel()
    {
        return $this->belongsTo(UserLevel::class, 'user_level_id', 'user_level_id');
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'users_courses', 'user_specific_id', 'course_id');
    }

    public function events()
    {
        return $this->hasMany(Event::class, 'user_specific_id', 'user_specific_id');
    }
}