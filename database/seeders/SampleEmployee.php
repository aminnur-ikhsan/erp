<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\HumanResource\DataEmplpoyeesModel;
use Faker\Factory as Faker;

class SampleEmployee extends Seeder
{
    /**
     * Run the database seeds.
     * command: php artisan db:seed --class=SampleEmployee
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        $many = 5;

        for ($i = 1; $i <= $many; $i++) {
            $employee = new DataEmplpoyeesModel;
            $employee['name'] = $faker->name;
            $employee['email'] = $faker->unique()->safeEmail;
            $employee['address'] = $faker->address;
            $employee->save();
        }
    }
}
