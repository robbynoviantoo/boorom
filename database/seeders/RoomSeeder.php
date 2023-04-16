<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Room;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Room::create([
            'id'            => 1,
            'name'          => 'Room Meeting 1',
            'description'   => 'Ruang meeting Aula Tengah',
            'capacity'      => 20,
        ]);

        Room::create([
            'id'            => 2,
            'name'          => 'Room Meeting 2',
            'description'   => 'Ruang meeting Lt 2',
            'capacity'      => 25,
        ]);
    }
}
