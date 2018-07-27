<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductPhoto extends Model
{
    protected $fillable = [
      'filename',
      'product_id'
    ];
    public function photos()

    {
        return $this->belongsTo(Product::class);
    }
}
