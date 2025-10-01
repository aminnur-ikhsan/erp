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
     * command: php artisan migrate --path=database/migrations/2025_09_22_194403_create_table_item_stocks.php
     */
    public function up(): void
    {
        // Buat skema 'warehouse' jika belum ada
        DB::statement('CREATE SCHEMA IF NOT EXISTS warehouse;');

        Schema::create('warehouse.item_storages', function (Blueprint $table) {
            $table->id();
            $table->uuid('id_stock')->unique();
            $table->string('item_key_number')->unique();
            $table->string('item_category');
            $table->string('item_status');
            $table->string('item_name');
            $table->string('item_barcode')->nullable();
            $table->integer('item_stock');
            $table->integer('item_price');
            $table->timestamps();
            $table->softDeletes();
        });

        // Jalankan seeder untuk data contoh
        Artisan::call('db:seed', [
            '--class' => 'ItemSampleSeeder',
            '--force' => true
        ]);
    }

    /**
     * Reverse the migrations.
     * command: php artisan migrate:rollback --path=database/migrations/2025_09_22_194403_create_table_item_stocks.php
     */
    public function down(): void
    {
        Schema::dropIfExists('warehouse.item_storages');
    }
};
