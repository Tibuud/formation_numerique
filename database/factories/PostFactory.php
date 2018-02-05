<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(3,true),
        'post_type' => $faker->randomElement(["formation","stage"]),
        'description' => $faker->paragraph(),
        'price' => $faker->randomFloat(2,1000,20000),
        'student_max' => $faker->numberBetween(15,50),
        'date_start'=> $faker->dateTimeBetween('+ 6 weeks','18 weeks'),
        'date_end' => $faker->dateTimeBetween('20 weeks', '50 weeks'),
        'status'=> 'unpublished'


    ];
});

// $table->increments('id');
// $table->string('title', 100);
// $table->enum('post_type', ['formation', 'stage']);
// $table->longText('description');
// $table->decimal('price', 8, 2);
// $table->tinyInteger('student_max');
// $table->dateTime('date_start');
// $table->dateTime('date_end');
// $table->enum('status', ['published', 'unpublished']);
// $table->unsignedInteger('category_id')->nullable();
// $table->foreign('category_id')->references('id')->on('categories')->onDelete('SET NULL');
