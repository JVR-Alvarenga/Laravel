<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Category;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
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
