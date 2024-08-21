<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Category;
use Carbon\Carbon;

class TaskFactory extends Factory {
    public function definition() {
        $user = User::all()->random();
        while(count($user->categories) === 0){
            $user = User::all()->random();
        }

        return [
            "is_done" => $this->faker->boolean(50),
            "title" => $this->faker->text(20),
            "description" => $this->faker->text(60),
            "due_date" => Carbon::now()->addDays(10),
            "user_id" => $user,
            "category_id" => $user->categories->random()->id
        ];
    }
}
