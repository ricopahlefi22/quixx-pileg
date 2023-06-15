<?php

namespace Database\Seeders;

use App\Models\WebConfig;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WebConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WebConfig::factory()->create([
            'token' => 'f=kR20D=?4i9WsGndN5dJo8MXkQO4K6JycsrVQlroG0mwmJovHX2bH//LFiciHFv',
            'photo' => 'storage/init-images/photo.png',
            'name' => 'Rion Sardi',
            'password' => bcrypt('12341234'),
            'pin' => bcrypt('123123'),
            'phone_number' => '089528597031',
            'strict' => false,
        ]);
    }
}