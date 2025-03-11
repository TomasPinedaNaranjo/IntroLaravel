<?php

namespace App\Validators;

class NinjaValidator
{
    public static $rules = [
        'nombre' => 'required',
        'aldea' => 'required',
        'chakra' => 'required',
    ];
}
