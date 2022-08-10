<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $user = User::factory()->create([
             'name' => 'Test User',
             'email' => 's2test@example.com',
         ]);
        $token = $user->createToken('api', ['user:actions']);
        $token = explode('|', $token->plainTextToken)[1];
        $user->update(['api_token' => $token]);
    }
}
