
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
        Schema::create('payment', function (Blueprint $table) {
            $table->id();
            $table->string('Name');
            $table->string('Email');
            $table->string('Roomtype');
            $table->string('Bed');
            $table->string('Noofroom');
            $table->string('cin');
            $table->string('cout');
            $table->string('nodays');
            $table->string('roomtotal');
            $table->string('bedtotal');
            $table->string('Meal');
            $table->string('mealtotal');
            $table->string('finaltotal');
            $table->timestamps();
        });
    }

     /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Payment');
    }
};
