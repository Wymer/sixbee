<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('appointment')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10).'@example.com',
            'appointment_date' => \Carbon\Carbon::create('2000', '01', '01'),
            'number' => rand(1,999999),
            'issue' => Str::random(20),
            'status' => 'pending',
        ]);
    }
}