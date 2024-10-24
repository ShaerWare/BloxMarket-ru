<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Claude extends Model
{
    protected $fillable = [
        'api_key',
        'endpoint',
    ];
}
