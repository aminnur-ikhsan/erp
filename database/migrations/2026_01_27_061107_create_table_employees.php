<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;

return new class extends Migration
{
    /**
     * Run the migrations.
     * command: php artisan migrate --path=database/migrations/2026_01_27_061107_create_table_employees.php
     */
    public function up(): void
    {
        // Buat skema 'humanresource' jika belum ada
        DB::statement('CREATE SCHEMA IF NOT EXISTS humanresource;');

        Schema::create('humanresource.data_employees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('address');
            $table->timestamps();
            $table->softDeletes();
        });

        // Jalankan seeder untuk data contoh
        Artisan::call('db:seed', [
            '--class' => 'SampleEmployee',
            '--force' => true
        ]);
    }

    /**
     * Reverse the migrations.
     * command: php artisan migrate:rollback --path=database/migrations/2026_01_27_061107_create_table_employees.php
     */
    public function down(): void
    {
        Schema::dropIfExists('humanresource.data_employees');
    }
};
