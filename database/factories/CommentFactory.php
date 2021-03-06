<?php

namespace Database\Factories;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;
          
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
             'comment'=>$this->faker->text ,
             'question_id'=>$this->faker->numberBetween(1,10),
             'created_by'=>$this->faker->numberBetween(1,10),

        ];
    }
}
