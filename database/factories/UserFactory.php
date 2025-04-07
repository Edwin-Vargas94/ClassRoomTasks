<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    protected static ?string $password;

    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
            'Administrador' => false, // Por defecto no es administrador
            //'Activo' => true, // Por defecto el usuario está activo
        ];
    }

    /**
     * Define el estado de administrador.
     */
    public function admin(): static
    {
        return $this->state(fn (array $attributes) => [
            'Administrador' => true,
        ]);
    }

    /**
     * Define el estado de usuario inactivo.
     */
    public function inactive(): static
    {
        return $this->state(fn (array $attributes) => [
            'Activo' => false,
        ]);
    }
    public function unverified(): static
{
    return $this->state(fn (array $attributes) => [
        'email_verified_at' => null,
    ]);
}
}
