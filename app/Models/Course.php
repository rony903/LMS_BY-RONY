<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    // Tentukan atribut yang diizinkan untuk mass assignment
    protected $fillable = [
        'title',
        'description',
        'is_active',
        'status',
        // Tambahkan atribut lain yang perlu diisi
    ];
    public function materials()
    {
        return $this->hasMany(Material::class);
    }
    public function participants()
    {
        return $this->hasMany(Participant::class);
    }

    public function instructors()
    {
        return $this->hasMany(Instructor::class);
    }
}