<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ItemStorageModel as ItemStorage;
use Illuminate\Support\Str;

class ItemSampleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * command: php artisan db:seed --class=ItemSampleSeeder
     */
    public function run(): void
    {
        $many = 5;
        for ($i = 1; $i <= $many; $i++) {
            ItemStorage::create([
                'id_stock' => Str::uuid(),
                'item_key_number' => strtoupper(Str::random(2)) . "-" . fake()->numerify('#########'),
                'item_category' => fake()->randomElement(['Elektronik', 'Perabotan', 'Peralatan']),
                'item_status' => fake()->randomElement(['Aktif', 'Tidak Aktif']),
                'item_name' => fake()->unique()->randomElement(['Laptop', 'Mouse', 'Keyboard', 'Monitor', 'Printer']),
                'item_barcode' => fake()->numerify('############'),
                'item_stock' => fake()->numerify('###'),
                'item_price' => (fake()->numerify('####') * 1000),
            ]);
        }
    }
}
