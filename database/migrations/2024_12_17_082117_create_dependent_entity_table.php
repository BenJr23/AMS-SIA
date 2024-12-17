<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dependent_entities', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('username'); // Username column
            $table->string('email'); // Email column
            $table->unsignedBigInteger('attendance_id'); // Foreign key for attendance
            $table->timestamps(); // Created at & Updated at

            // Foreign key constraint
            $table->foreign('attendance_id')->references('id')->on('attendances')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dependent_entities');
    }
};