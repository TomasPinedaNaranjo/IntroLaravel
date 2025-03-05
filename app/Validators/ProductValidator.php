<?php


namespace App\Validators;

class ProductValidator
{
    public static $rules = [
        'name' => 'required',
        'price' => 'required',
    ];
}