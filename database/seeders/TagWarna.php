<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TagWarna extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tag_warnas')->insert([
            'nama' => "merah",
            'harga' => 90000,
        ]);
        DB::table('tag_warnas')->insert([
            'nama' => "biru",
            'harga' => 45000,
        ]);
    }
}
