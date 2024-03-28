<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountryTableSeeder extends Seeder
{
    public function run(): void
    {

        DB::table('countries')->insert([
            [
                'name'       => json_encode(['ar' => 'السعودية', 'en' => 'Saudi Arabia'], JSON_UNESCAPED_UNICODE),
                'key'        => '+966',
                'image'      => 'sa.png',
                'created_at' => Carbon::now()->subMonths(rand(0, 6)),
            ], [
                'name'       => json_encode(['ar' => 'مصر', 'en' => 'Egypt'], JSON_UNESCAPED_UNICODE),
                'key'        => '+20',
                'image'      => 'eg.png',
                'created_at' => Carbon::now()->subMonths(rand(0, 6)),
            ], [
                'name'       => json_encode(['ar' => 'البحرين', 'en' => 'El-Bahrean'], JSON_UNESCAPED_UNICODE),
                'key'        => '+973',
                'image'      => 'bh.png',
                'created_at' => Carbon::now()->subMonths(rand(0, 6)),
            ], [
                'name'       => json_encode(['ar' => 'قطر', 'en' => 'Qatar'], JSON_UNESCAPED_UNICODE),
                'key'        => '+974',
                'image'      => 'qa.png',
                'created_at' => Carbon::now()->subMonths(rand(0, 6)),
            ]
        ]);
    }
}
