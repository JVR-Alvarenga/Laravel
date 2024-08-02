<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Task;

class DatabaseSeeder extends Seeder{
    public function run(){
        // \App\Models\User::factory(10)->create();
        User::factory(4)->create();
        Category::factory(3)->create();
        Task::factory(10)->create();
    }
}
