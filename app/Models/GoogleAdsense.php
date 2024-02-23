<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\HeaderEnum;

class GoogleAdsense extends Model
{
    use HasFactory;

    protected $table = 'google_adsenses';

    protected $casts = [ 
        'header' => HeaderEnum::class
    ];

}
