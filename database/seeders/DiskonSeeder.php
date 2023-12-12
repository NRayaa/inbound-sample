<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DiskonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('diskons')->insert([
            'nama' => "fashion",
            'diskon' => 60,
        ]);
        DB::table('diskons')->insert([
            'nama' => "otomotif",
            'diskon' => 60,
        ]);
        DB::table('diskons')->insert([
            'nama' => "toys_hobbies_a",
            'diskon' => 60,
        ]);
        DB::table('diskons')->insert([
            'nama' => "art",
            'diskon' => 50,
        ]);
        DB::table('diskons')->insert([
            'nama' => "toys_hobbies_b",
            'diskon' => 50,
        ]);
        DB::table('diskons')->insert([
            'nama' => "others_fmcg",
            'diskon' => 50,
        ]);
        DB::table('diskons')->insert([
            'nama' => "elektronic_art",
            'diskon' => 40,
        ]);
        DB::table('diskons')->insert([
            'nama' => "mainan_hv",
            'diskon' => 40,
        ]);
        DB::table('diskons')->insert([
            'nama' => "perlengkapan_bayi",
            'diskon' => 40,
        ]);
        DB::table('diskons')->insert([
            'nama' => "beauty",
            'diskon' => 40,
        ]);
        DB::table('diskons')->insert([
            'nama' => "electronic_hv",
            'diskon' => 40,
        ]);
    }
}
