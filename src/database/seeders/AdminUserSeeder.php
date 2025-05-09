<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::firstOrCreate(
            ['email' => 'admin@admin.com'],
            ['name' => 'Super Admin', 'password' => Hash::make('password')]
        );
        $user->assignRole('super_admin');

        User::firstOrCreate(
            ['email' => 'cms@admin.com'],
            ['name' => 'CMS Admin', 'password' => Hash::make('password')]
        )->assignRole('cms_admin');

        User::firstOrCreate(
            ['email' => 'teacher@admin.com'],
            ['name' => 'Teacher', 'password' => Hash::make('password')]
        )->assignRole('teacher');

        User::firstOrCreate(
            ['email' => 'student@admin.com'],
            ['name' => 'Student', 'password' => Hash::make('password')]
        )->assignRole('student');

        User::firstOrCreate(
            ['email' => 'hr@admin.com'],
            ['name' => 'HR Admin', 'password' => Hash::make('password')]
        )->assignRole('hr_admin');

        User::firstOrCreate(
            ['email' => 'employee@admin.com'],
            ['name' => 'Employee', 'password' => Hash::make('password')]
        )->assignRole('employee');
    }
}
