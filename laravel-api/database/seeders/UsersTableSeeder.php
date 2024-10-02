<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
//↓3行追記
use Hash;
use DB;
use App\Models\User;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'ララテックくん',
                'email' => 'laratech@example.com',
                'password' => Hash::make('password')
            ],
        ];
        DB::table('users')->insert($data);
    }
}
