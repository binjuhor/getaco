<?php

use Faker\Generator as Faker;

$factory->define(App\Customer::class, function (Faker $faker) {
    return [
        'customer_name' => $faker->title.' '.$faker->firstName,
        'id_form' => 0,
        'customer_email' => $faker->email ,
        'customer_phone' => intval($faker->e164PhoneNumber),
        'id_company' => 1,
        'customer_status' => 1 ,
        'from_url' => '' ,
        'sort_order' => 0 ,
        'created_at' => $faker->dateTime ,
        'updated_at' => $faker->dateTime ,
        'dynamic_field' =>''
    ];
});
