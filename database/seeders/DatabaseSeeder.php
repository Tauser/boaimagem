<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Customer;
use App\Models\CustomerCategory;
use App\Models\Project;
use App\Models\Team;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;
use App\Models\Service;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void{

        $users = \App\Models\User::factory(10)->create();
        $categories = \App\Models\Category::factory(10)->create();
        $posts = \App\Models\Post::factory(30)
            ->recycle($users)
            ->recycle($categories)
            ->create();



        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
