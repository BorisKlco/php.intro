<?php

namespace App\Classes;

class Env
{
    public static ?string $user = null;
    public static ?string $pass = null;

    public function __construct()
    {
        $envFile = fopen(ENV_SECRET, "r") or die("cant open secret file");
        static::$user = explode("=", fgets($envFile))[1];
        static::$pass = explode("=", fgets($envFile))[1];
    }
}
