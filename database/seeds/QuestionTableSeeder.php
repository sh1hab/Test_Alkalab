<?php

use Illuminate\Database\Seeder;

class QuestionTableSeeder extends Seeder
{
    /** 5000 Seed/dummy data for question table.
     *
     *
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Question::class, 5000)->create();
    }
}
