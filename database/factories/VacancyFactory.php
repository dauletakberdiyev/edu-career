<?php

namespace Database\Factories;

use App\Models\Vacancy;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\Factory;

use Spatie\Permission\Models\Role;
use App\Models\Company;


class VacancyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Vacancy::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $companies = Company::get('id')->toArray();
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'quota' => $this->faker->numberBetween(1, 10),
            'company_id' => $this->faker->randomElement($companies)['id'],
        ];
    }
}
