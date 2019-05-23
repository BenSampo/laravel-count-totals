<?php

use BenSampo\CountTotals\Tests\Models\Subscriber;

/* @var $factory \Illuminate\Database\Eloquent\Factory */

$factory->define(Subscriber::class, function () {
    return [
        'status' => 'confirmed',
        'name' => 'John Smith'
    ];
});
