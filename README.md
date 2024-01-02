# Пример использования DTO с ResponseFactory

Этот проект демонстрирует пример использования Data Transfer Objects (DTO) с ResponseFactory для создания объекта `UserDto` из входных данных.

## Пример использования

Для использования данного примера, у вас должен быть установлен PHP и Composer.

Пример использования:

```php
<?php

namespace App;

readonly class UserDto
{
    public function __construct(
        #[Map(path: 'name')] public string $name,
        #[Map(path: 'lastLoginDate')] public string $lastLoginDate,
        #[Map(path: 'profile')] public ProfileDto $profile,
    ) {
    }
}

readonly class UserDto
{
    public function __construct(
        #[Map(path: 'name')] public string $name,
        #[Map(path: 'lastLoginDate')] public string $lastLoginDate,
        #[Map(path: 'profile')] public ProfileDto $profile,
    ) {
    }
}

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
