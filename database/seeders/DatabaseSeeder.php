<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\User;
use \App\Models\UserType;
use \App\Models\Question;
use \App\Models\Category;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        UserType::factory(1)->create();
        UserType::factory()->create([
            'title' => 'Igrac'
        ]);
        User::factory(10)->create();
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'user_type_id' => '1'
        ]);
        User::factory()->create([
            'name' => 'Pera Peric',
            'email' => 'igrac@example.com',
            'user_type_id' => '2'
        ]);
        Category::factory(5)->create();
        Question::factory(5)->create();
    }
}
