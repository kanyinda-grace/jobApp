<?php

namespace Database\Factories;

use App\Models\OpportunityDetail;
use Illuminate\Database\Eloquent\Factories\Factory;

class OpportunityDetailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = OpportunityDetail::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'opportunity_id'=>$this->faker->numberBetween(1,10),
            'benefits'=>$this->faker->text,
            'application_process'=>$this->faker->text,
            'further_queries'=>$this->faker->text,
            'eligibilities'=>$this->faker->text,
            'start_date'=>$this->faker->dateTime(),
            'end_date'=>$this->faker->datetime(),
            'official_link'=>$this->faker->url,
            'eligibble_regions'=>$this->faker->state



        ];
    }
}
