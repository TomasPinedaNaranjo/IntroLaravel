<?php


namespace App\Validators;

class OrdersValidator
{
    public static $rules = [
        'item' => 'required',
        'total' => 'required',
        'address' => 'required',
        'payment_method' => 'required',
    ];
}