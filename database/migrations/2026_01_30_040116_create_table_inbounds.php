<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     * command: php artisan migrate --path=database/migrations/2026_01_30_040116_create_table_inbounds.php
     */
    public function up(): void
    {
        // Buat skema 'warehouse' jika belum ada
        DB::statement('CREATE SCHEMA IF NOT EXISTS warehouse;');

        Schema::create('warehouse.inbounds', function (Blueprint $table) {
            $table->id();
            $table->uuid('inbound_id')->unique();
            $table->string('inbound_code');
            $table->string('origin_code');
            $table->string('status');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     * command: php artisan migrate:rollback --path=database/migrations/2026_01_30_040116_create_table_inbounds.php
     */
    public function down(): void
    {
        Schema::dropIfExists('warehouse.inbounds');
    }
};
