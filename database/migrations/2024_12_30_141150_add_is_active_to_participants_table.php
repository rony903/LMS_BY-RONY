<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsActiveToParticipantsTable extends Migration
{
    public function up()
    {
        Schema::table('participants', function (Blueprint $table) {
            $table->boolean('is_active')->default(true); // Kolom untuk status aktif
        });
    }

    public function down()
    {
        Schema::table('participants', function (Blueprint $table) {
            $table->dropColumn('is_active');
        });
    }
}
