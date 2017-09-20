<?php

namespace App\Services;

interface AuthServiceInterface
{
    public function authentication($data);

    public function authorization();

    public function getCurrentUser();

    public function getInfoCurrentUser($user);
}
