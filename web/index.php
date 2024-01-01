<?php

use App\UserDto;

require_once __DIR__ . '/../vendor/autoload.php';
$respone = [
    'name' => 'userName',
    'lastLoginDate' => '2020-11-16T04:25:03-05:00',
    'profile' => [
        'profileId' => '123',
        'email' => 'email',
    ],
];

$responseFactory = new \App\ResponseFactory();
$userDto = $responseFactory->create(UserDto::class, $respone);
echo "<pre>";print_r($userDto);echo "</pre>";