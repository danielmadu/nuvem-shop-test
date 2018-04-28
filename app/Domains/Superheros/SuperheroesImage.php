<?php

namespace App\Domains\Superheros;

use Illuminate\Database\Eloquent\Model;

class SuperheroesImage extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'path',
        'superhero_id',
    ];

    public function superhero()
    {
        return $this->belongsTo(Superhero::class);
    }
}