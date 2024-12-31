<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email']; // Kolom yang bisa diisi
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}