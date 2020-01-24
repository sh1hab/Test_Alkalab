<?php

/** Factory for question table
 *
 * @var \Illuminate\Database\Eloquent\Factory $factory
 */

use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(App\Models\Question::class, function (Faker $faker) {

    $types = ['textarea','radio','checkbox'];

    return [
        'type' => $types[ random_int( 0,count($types)-1 ) ],
        'name' => $faker->sentence,
        'question_required' => str::random(15),
        'description' => $faker->text,
        'answer' => [$faker->paragraph,''][random_int(0,1)]
    ];
});
