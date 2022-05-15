<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class officesModel extends Model
{
    use HasFactory;
    protected $table = 'offices';

    protected $fillable = [
        'password',
        'name',
        'slug',
        'views',
        'city',
        'district',
        'street',
        'status',
    ];
}
