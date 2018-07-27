<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use Sluggable;
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    protected $fillable = [
      'title',
        'slug',
        'details',
        'danger',
        'date_born',
        'date_death',
        'country_id',
        'category_id',
    ];
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function images()
    {
        return $this->hasMany(ProductPhoto::class);
    }
}
