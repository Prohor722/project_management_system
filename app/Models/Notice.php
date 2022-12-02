<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    use HasFactory;
    protected $fillable=['notice_description', 'course_code', 't_id', 'deadline'];

    public function teachers()
    {
        return $this->belongsTo(Teacher::class, 't_id', 't_id');
    }
}
