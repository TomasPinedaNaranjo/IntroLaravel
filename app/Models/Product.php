<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    /**
     * PRODUCT ATTRIBUTES

     * $this->attributes['id'] - int - contains the product primary key (id)

     * $this->attributes['name'] - string - contains the product name

     * $this->attributes['price'] - int - contains the product price

     * $this->comments - Comment[] - contains the associated comment

     * $this->items - Item[] - contains the associated items
     */
    protected $fillable = ['name', 'price'];

    public function getId(): int
    {

        return $this->attributes['id'];

    }

    public function setId($id): void
    {

        $this->attributes['id'] = $id;

    }

    public function getName(): string
    {

        return $this->attributes['name'];

    }

    public function setName($name): void
    {

        $this->attributes['name'] = $name;

    }

    public function getPrice(): int
    {

        return $this->attributes['price'];

    }

    public function setPrice($price): void
    {

        $this->attributes['price'] = $price;
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function setComments(Collection $comments): void
    {

        $this->comments = $comments;

    }

    public static function sumPricesByQuantities($products, $productsInSession)
    {
        $total = 0;
        foreach ($products as $product) {
            $total = $total + ($product->getPrice() * $productsInSession[$product->getId()]);
        }

        return $total;
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }

    public function getItems()
    {
        return $this->items;
    }

    public function setItems($items)
    {
        $this->items = $items;
    }
}
