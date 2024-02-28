<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;

    protected $fillable = ['owner_name', 'certificate_number', 'issuing_institution', 'issuing_date', 'expiration_date'];
}
