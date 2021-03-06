<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use Sluggable;
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'categories'
            ]
        ];
    }

    protected $fillable = ['categories', 'slug'];
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
