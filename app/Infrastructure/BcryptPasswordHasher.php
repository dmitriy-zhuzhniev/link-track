<?php

namespace App\Infrastructure;

use App\Application\Authorization\PasswordHasher;
use Illuminate\Support\Facades\Hash;

class BcryptPasswordHasher implements PasswordHasher
{
    /**
     * @param $password
     * @return string
     */
    public function hash($password)
    {
        return Hash::make($password);
    }

    /**
     * @param $password
     * @param $hashed
     *
     * @return bool
     */
    public function check($password, $hashed)
    {
        return Hash::check($password, $hashed);
    }
}