<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class F1_larav extends Model
{
    use HasFactory;
    protected $table = 'f1_larav';
    protected $fillable = ['driverId', 'url', 'givenName', 'familyName', 'dateOfBirth', 'nationality'];
}
