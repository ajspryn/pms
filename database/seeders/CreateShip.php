<?php

namespace Database\Seeders;

use App\Http\Middleware\Ship;
use App\Models\ship\Ship as ShipShip;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class CreateShip extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ships')->insert([
            'uuid' => Uuid::uuid4(),
            'name' => 'Permata Intan',
            'photo' => '/storage/Ship.jpg',
            'categori' => 'Ship',
            'status' => 'Active'
        ]);
    }
}
