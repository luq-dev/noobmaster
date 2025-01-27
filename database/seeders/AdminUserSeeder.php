<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@noobmaster.com'],
            ['name'=>'nm-admin',
            'password'=>Hash::make('imanadmin'),
            'is_admin'=>true,
            'date_of_birth'=>'1980-01-01'
            ]
        );
    }
}
