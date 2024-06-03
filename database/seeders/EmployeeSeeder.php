<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Employee::create([
            'name' => 'employee',
            'email' => 'employee@tqnia.com',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
            'remember_token' => \Str::random(10),
        ]);    }
}
