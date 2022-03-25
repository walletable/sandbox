<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'pin' => '1234',
            'email' => $this->faker->unique()->safeEmail,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'status' => 'active',
        ];
    }

    /**
     * Add balance to the state.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function balance(int $amount)
    {
        return $this->state(function () use ($amount) {
            return [
                'balance' => $amount,
            ];
        });
    }

    /**
     * Indicate that the user is female.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function female()
    {
        return $this->state(function () {
            return [
                'gender' => 'female',
            ];
        });
    }

    /**
     * Indicate that the user is pending.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function pending()
    {
        return $this->state(function () {
            return [
                'status' => 'pending',
            ];
        });
    }

    /**
     * Indicate that the user is hold.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function hold()
    {
        return $this->state(function () {
            return [
                'status' => 'hold',
            ];
        });
    }

    /**
     * Indicate that the user is block.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function block()
    {
        return $this->state(function () {
            return [
                'status' => 'block',
            ];
        });
    }


}
