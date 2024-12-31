<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParticipantsTable extends Migration
{
    public function up()
    {
        Schema::create('participants', function (Blueprint $table) {
            $table->id(); // Kolom ID
            $table->string('name'); // Kolom Nama
            $table->string('email')->unique(); // Kolom Email (unik)
            $table->foreignId('course_id')->constrained()->onDelete('cascade'); // pastikan kolom ini ada
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('participants');
    }
}
