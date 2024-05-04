<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Endpoint extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'url'];

    public static function getForm()
    {
        return [
            TextInput::make('name')
                ->required()
                ->maxLength(255),
            TextInput::make('url')
                ->required()
                ->maxLength(255),
        ];
    }

    public function mappings(): HasMany
    {
        return $this->hasMany(Mapping::class);
    }
}
