<?php

namespace Database\Factories;

use App\Models\Opportunity;
use Illuminate\Database\Eloquent\Factories\Factory;

class OpportunityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Opportunity::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'=>$this->faker->word,
            'description'=>$this->faker->text(500),
            'category_id'=>$this->faker->numberBetween(1,10),
            'country_id'=>$this->faker->numberBetween(1,10),
            'deadline'=>$this->faker->Datetime() ,
            'organiser'=>$this->faker->company ,
            'created_by'=>$this->faker->numberBetween(1,10),

            
        ];
     }
}
