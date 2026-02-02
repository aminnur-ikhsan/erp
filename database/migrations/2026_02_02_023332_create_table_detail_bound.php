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
     * command: php artisan migrate --path=database/migrations/2026_02_02_023332_create_table_detail_bound.php
     */
    public function up(): void
    {
        // Buat skema 'warehouse' jika belum ada
        DB::statement('CREATE SCHEMA IF NOT EXISTS warehouse;');

        Schema::create('warehouse.detail_bound', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('bound_id');
            $table->string('bound_type');
            $table->bigInteger('item_id');
            $table->integer('item_price_buy');
            $table->integer('item_stock');
            $table->string('loker_code');
            $table->string('status')->nullable();
            $table->timestamps();
        });

        // Jalankan seeder untuk data contoh
        Artisan::call('db:seed', [
            '--class' => 'Database\Seeders\Warehouse\SampleDetailBound',
            '--force' => true
        ]);
    }

    /**
     * Reverse the migrations.
     * command: php artisan migrate:rollback --path=database/migrations/2026_02_02_023332_create_table_detail_bound.php
     */
    public function down(): void
    {
        Schema::dropIfExists('warehouse.detail_bound');
    }
};
