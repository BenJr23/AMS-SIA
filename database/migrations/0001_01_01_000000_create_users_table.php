<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB; // Import DB facade
use Illuminate\Support\Facades\Hash; // Import Hash facade

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
            $table->string('username');
            $table->string('first_name'); // Add first_name column
            $table->string('last_name');  // Add last_name column
            $table->string('email')->unique();
            $table->string('role')->default('user'); // Add role column with default value
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->unsignedBigInteger('created_by'); // Add created_by column
            $table->foreign('created_by')->references('id')->on('users'); // Set foreign key constraint
            $table->rememberToken();
            $table->timestamps();
        });

        // Insert default user with role
        if (!DB::table('users')->where('email', 'admin@example.com')->exists()) {
            DB::table('users')->insert([
                'username' => 'benjr23',
                'first_name' => 'RubenJr',
                'last_name' => 'Bertuso',
                'email' => 'rubenjrtbertuso@gmail.com',
                'role' => 'admin', // Assign admin role to default user
                'password' => Hash::make('benjr23'), // Hash the default password
                'created_by' => 1, // Set created_by to 0 for initial admin account
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
