<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Image extends Model implements Transformable
{
    use TransformableTrait, HasFactory;

    protected $fillable = [
        'post_id',
        'path',
        'post_id',
        'banner_id',
        'people_id',
        'system_id',
        'category_id',
        'new_id',
        'customer_care_id'
    ];
}
