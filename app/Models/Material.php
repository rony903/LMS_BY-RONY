<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $fillable = ['course_id', 'title', 'description'];
    
    // Define the relationship with Course if needed
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    public function show($id)
    {
    $material = Material::findOrFail($id);
    return view('materials.show', compact('material'));
    }
}