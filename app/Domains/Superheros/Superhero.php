<?php

namespace App\Domains\Superheros;

use Illuminate\Database\Eloquent\Model;

class Superhero extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nickname',
        'real_name',
        'origin_description',
        'superpowers',
        'catch_phrase',
    ];

    /**
     * Return the images assigned to the superhero
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->hasMany(SuperheroesImage::class);
    }
}