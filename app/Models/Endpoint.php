<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endpoint extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'url'];

    public function mappings()
    {
        return $this->hasMany(Mapping::class);
    }
}
