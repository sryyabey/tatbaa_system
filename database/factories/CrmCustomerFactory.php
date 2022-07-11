<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\CrmCustomer;

class CrmCustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name'            => $this->faker->name,
            'last_name'             => $this->faker->lastName,
            'birthday'              => $this->faker->dateTime,
            'email'                 => $this->faker->unique()->safeEmail,
            'phone'                 => $this->faker->phoneNumber,
            'address'               => $this->faker->address,
            'status_id'             => 1,
            'user_id'               => 2
        ];
    }
}
