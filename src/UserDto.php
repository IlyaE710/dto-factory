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
