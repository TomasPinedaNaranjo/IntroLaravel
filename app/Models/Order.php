<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * PRODUCT ATTRIBUTES

     * $this->attributes['id'] - int - contains the product primary key (id)

     * $this->attributes['item'] - string - contains the product name
      
     * $this->attributes['total'] - float - contains the product price
     
     * $this->attributes['address'] - string - contains the product description
     */

    protected $fillable = ['item', 'total', 'address', 'payment_method'];

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function setId($id): void
    {
        $this->attributes['id'] = $id;
    }

    public function getItem(): string
    {
        return $this->attributes['item'];
    }

    public function setItem($item): void
    {
        $this->attributes['item'] = $item;
    }

    public function getTotal(): float
    {
        return $this->attributes['total'];
    }

    public function setTotal($total): void
    {
        $this->attributes['total'] = $total;
    }

    public function getAddress(): string
    {
        return $this->attributes['address'];
    }

    public function setAddress($address): void
    {
        $this->attributes['address'] = $address;
    }
}
