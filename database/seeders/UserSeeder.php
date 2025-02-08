<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::create([
            'user_id' => substr(str_replace(['/', '+', '='], '', base64_encode(Str::uuid()->getBytes())), 0, 10),
            'user_nama' => 'raka',
            'user_pass' => Hash::make('password'),
            'user_hak' => 'SuperUser',
            'user_sts' => 1
        ]);
    }
}
