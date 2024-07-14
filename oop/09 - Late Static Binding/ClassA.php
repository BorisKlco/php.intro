<?php

class ClassA
{
    protected static string $n = 'A';

    public static function getN(): string
    {
        return static::$n;
    }
}
