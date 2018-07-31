<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

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
    public function getRouteKeyName()
    {
        return 'slug';
    }
    protected $fillable = [
        'title',
        'slug',
        'details',
        'save_conditions',
        'danger',
        'danger_type',
        'buy_place',
        'found_date',
        'date_born',
        'date_death',
        'date_death_name',
        'country_id',
        'category_id',
        'user_id',
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function d_of_h()
    {
        return $this->belongsTo(degree_of_hazard::class, 'degree_of_hazard_id');
    }
}
