
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
/**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('roombook', function (Blueprint $table) {
            $table->id();
            $table->string('Name');
            $table->string('Email');
            $table->string('Phone');
            $table->string('Country');
            $table->string('Roomtype');
            $table->string('Bed');
            $table->string('Noofroom');
            $table->string('Meal');
            $table->string('cin');
            $table->string('cout');
            $table->string('nodays');
            $table->string('stat');
            $table->timestamps();
        });
    }

     /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roombook');
    }
};
