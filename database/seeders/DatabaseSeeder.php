<?php

namespace Database\Seeders;

use App\Models\Job;
use App\Models\Tag;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'first_name' => 'John',
            'last_name' => 'Brown',
            'email' => 'test@example.com',
        ]);

        Job::factory(10)->create();

        Tag::factory()->create(['name' => 'Tech']);
    }
}