<?php

use App\Models\User;

class ProfileViewModel
{
    public function __construct(
        public User $user,
        public array $companies,
        public array $organizations,
        public string $action,
    ) {}
}
