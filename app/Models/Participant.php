<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email','course_id']; // Kolom yang bisa diisi
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}