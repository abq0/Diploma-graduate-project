<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class propertiesModel extends Model
{
    use HasFactory;
    protected $table = 'properties';

    protected $fillable = [
        'office_id',
        'category',
        'paymentType',
        'title',
        'description',
        'area',
        'city',
        'district',
        'street',
        'latitude',
        'longitude',
        'ownerName',
        'roomsNum',
        'kitchensNum',
        'bathroomNum',
        'floorsNum',
        'mobileNumber',
        'hasWhatsapp',
        'hasElevator',
        'hasPool',
        'hasGarage',
        'hasYard',
    ];
}
