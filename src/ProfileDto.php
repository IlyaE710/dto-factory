<?php

namespace App;

readonly class ProfileDto
{
    public function __construct(
        #[Map(path: 'profileId')] public int $profileId,
        #[Map(path: 'email')] public string $email,
    ) {
    }
}
