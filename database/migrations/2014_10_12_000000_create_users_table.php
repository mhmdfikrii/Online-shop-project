<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->nullable()->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('full_name');
            $table->string('nohp')->unique();
            $table->string('email')->unique();
            $table->string('gender')->nullable();
            $table->string('level');
            $table->string('password');
            $table->string('tgllahir')->nullable();
            $table->string('umur')->nullable();
            $table->integer('Saldo')->default(0);
            $table->uuid('token')->unique()->default(Str::uuid());
            $table->boolean('check')->default(0);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
