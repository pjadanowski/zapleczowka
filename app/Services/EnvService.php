<?php

namespace App\Services;

class EnvService
{
    public static function updateVariable(string $key, mixed $value, bool $addQuotes = false)
    {
        if ($addQuotes) {
            $value = "\"$value\"";
        }

        $env = file_get_contents(base_path('.env'));

        $env = preg_replace('/' . $key . '=(.*)/', "{$key}=" . $value, $env);

        file_put_contents(base_path('.env'), $env);
    }
}
