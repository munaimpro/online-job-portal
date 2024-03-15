<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteMenu extends Model
{
    use HasFactory;

    protected $table = "site_menus";
    protected $fillable = [
        'navigation_menu_name',
        'navigation_menu_link'
    ];
}
