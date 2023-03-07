<?php

namespace App\Models;
//Models Update
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'mobile',
        'doj',
        'gender',
        'status',
    ];
}
