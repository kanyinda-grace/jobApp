<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Models\Category;
use Models\Country;
use Models\User ;
use Models\Opportunity;
use Models\OpportunityDetail;
use Models\Comment;
use Models\Question;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\Category::factory(10)->create();
         \App\Models\Country::factory(10)->create();
         \App\Models\User::factory(10)->create();
         \App\Models\Opportunity::factory(10)->create();
         \App\Models\OpportunityDetail::factory(10)->create();
         
          \App\Models\Question::factory(10)->create();
          \App\Models\Comment::factory(10)->create();
         
    }
}
