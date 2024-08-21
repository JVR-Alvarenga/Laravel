<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class CategoryFactory extends Factory {
    public function definition() {
        return [
            "title" => $this->faker->text(30),
            "color" => $this->faker->safeHexColor(),
            "user_id" => User::all()->random()
        ];
    }
}
