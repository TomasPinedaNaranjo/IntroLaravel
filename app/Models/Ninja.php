<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ninja extends Model
{
    /**
     * $this->attribute['id'] - int - contains the id of the ninja
     * $this->attribute['nombre'] - string - contains the name of the ninja
     * $this->attribute['aldea'] - string - contains the village of the ninja
     * $this->attribute['chakra'] - int - contains the chakra of the ninja
     * $this->attribute['created_at'] - string - contains the date of creation of the ninja
     * $this->attribute['updated_at'] - string - contains the date of the last update of the ninja
     */
    protected $fillable = ['nombre', 'aldea', 'chakra'];

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getNombre(): string
    {
        return $this->attributes['nombre'];
    }

    public function setNombre(string $nombre): void
    {
        $this->attributes['nombre'] = $nombre;
    }

    public function getAldea(): string
    {
        return $this->attributes['aldea'];
    }

    public function setAldea(string $aldea): void
    {
        $this->attributes['aldea'] = $aldea;
    }

    public function getChakra(): int
    {
        return $this->attributes['chakra'];
    }

    public function setChakra(int $chakra): void
    {
        $this->attributes['chakra'] = $chakra;
    }
}
