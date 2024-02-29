<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapping extends Model
{
    use HasFactory;

    protected $fillable = ['endpoint_id', 'source_field', 'target_field'];

    public function endpoint()
    {
        return $this->belongsTo(Endpoint::class);
    }
}
