<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $user = User::create([
            'name' => 'admin',
            'email' => 'admin@teste.com',
            'email_verified_at' => now(),
            'password' => '$2a$10$d6C7Jz4FAqIzQP3QTMixhujTCAXktFCVbjcYGBAaameAO5aIKCZ5e',
      ]);
      $user->assignRole('operador','admin');
    }
}
