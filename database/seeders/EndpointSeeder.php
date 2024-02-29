<?php

namespace Database\Seeders;

use Database\Factories\EndpointFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EndpointSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EndpointFactory::factory()->count(50)->create();
    }
}
