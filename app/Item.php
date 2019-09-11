<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Item extends Model
{
    public $incrementing = false;

    protected $table = 'items';

    protected $fillable = [
        'id',
        'id_category',
        'slug',
        'name',
        'stock'
    ];

    protected static function boot()
    {
        parent::boot();

        // Set UUID on boot.
        self::creating(function ($model) {
            $model->id = (string)Str::uuid(4);;
        });
    }
}
