<?php

namespace Database\Seeders;
use App\Models\Job;
use App\Models\User;
use App\Models\JobType;
use App\Models\category;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

      // \App\Models\category::factory(5)->create();
      // \App\Models\JobType::factory(5)->create();

    //   \App\Models\Job::factory(25)->create();

    }
}
