<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Create users table
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name'); // User's first name
            $table->string('middle_name')->nullable(); // User's middle name
            $table->string('last_name'); // User's last name
            $table->string('email')->unique(); // User's email address
            $table->string('password'); // User's password (hashed)
            $table->string('phone_no'); // User's phone number
            $table->date('date_of_birth')->nullable(); // User's date of birth
            $table->text('address')->nullable(); // User's address
            $table->string('photo')->nullable(); // File path for the user's photo
            $table->string('employee_type'); // User's role type
            $table->unsignedBigInteger('created_by')->nullable(); // ID of the user who created the record
            $table->timestamps(); // Timestamps for created_at and updated_at

            // Foreign key constraint for created_by (optional, if using relationships)
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
        });
        
        // Insert default admin user
        if (!DB::table('users')->where('email', 'rubenjrtbertuso@gmail.com')->exists()) {
            DB::table('users')->insert([
                'first_name' => 'RubenJr',
                'middle_name' => 'tapiod',
                'last_name' => 'Bertuso',
                'email' => 'rubenjrtbertuso@gmail.com',
                'phone_no' => '+639272914369',
                'date_of_birth' => null,
                'address' => null,
                'employee_type' => 'admin',
                'password' => Hash::make('benjr23'),
                'created_by' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Create password_reset_tokens table
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        // Create sessions table
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('users');
    }
};
