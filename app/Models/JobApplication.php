<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id','company_id','job_id','first_name','last_name','address','gender','dob','image', 'signature', 'cv', 'status'
    ];
}
