<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PersonaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'DNI'=> $this->faker->unique()->phoneNumber(),
            'nombre'=>$this->faker->name(),
            'apell_pat'=> $this->faker->lastName(),
            'apell_mat'=> $this->faker->lastName(),
            'email'=>$this->faker->unique()->safeEmail(),
            'telefono'=>$this->faker->unique()->phoneNumber(),
            'posicion'=> $this->faker->numberBetween(1,2),
            'activo'=>$this->faker->numberBetween(0,1),
            'borrado'=>$this->faker->numberBetween(0,1)
        ];
    }
}
