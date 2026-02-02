<?php

namespace Database\Seeders\Warehouse;

use App\Models\Warehouse\DetailBoundModel;
use App\Models\Warehouse\IndboundModel;
use App\Models\ItemStorageModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SampleDetailBound extends Seeder
{
    /**
     * Run the database seeds.
     * command: php artisan db:seed --class='Database\Seeders\Warehouse\SampleDetailBound'
     */
    public function run(): void
    {
        $dataInbound = IndboundModel::first();
        $dataItem = ItemStorageModel::first();

        if (!empty($dataInbound)) {
            $many = 5;
            for ($i = 1; $i <= $many; $i++) {
                DetailBoundModel::create([
                    'bound_id' => $dataInbound['id'],
                    'bound_type' => 'inbound',
                    'item_id' => $dataItem['id'],
                    'item_price_buy' => fake()->numberBetween(1000, 99999),
                    'item_stock' => fake()->numberBetween(1, 99),
                    'loker_code' => strtoupper(Str::random(2)) . "-" . fake()->numerify('#########'),
                    'status' => fake()->randomElement(['hold', 'processed', 'done']),
                ]);
            }
        }
    }
}
