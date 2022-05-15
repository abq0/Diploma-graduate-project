<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class propertiesAttachmentsModel extends Model
{
    use HasFactory;
    protected $table = 'properties_attachments';

    protected $fillable = [
        'image',
        'property_id',
    ];
}
