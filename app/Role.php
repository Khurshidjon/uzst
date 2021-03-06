<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['roles'];

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
}
