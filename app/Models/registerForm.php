<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class registerForm extends Model
{
    use HasFactory;
    protected $table = 'application_form';

    protected $fillable = [
        'firstName',
        'lastName',
        'email',
        'mobileNumber',
        'city',
        'officeName',
        'officeCity',
        'district',
        'street',
        'urlSlug',
        'status',
    ];
}
