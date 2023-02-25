<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerCare extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'nick_name',
        'description',
        'status',
    ];

    public function image()
    {
        return $this->hasOne(Image::class, 'customer_care_id');
    }
}
