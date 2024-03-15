<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteInformation extends Model
{
    use HasFactory;

    protected $table = "site_informations";
    protected $fillable = [
        'logo',
        'title'
    ];
}
