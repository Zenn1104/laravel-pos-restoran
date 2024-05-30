<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Number;

class Menu extends Model
{
    use HasFactory;

    public static $types = [
        'coffee',
        'non-coffee',
        'tea',
        'food'
    ];

    protected $fillable = [
        'name', 'price', 'description', 'type', 'photo'
    ];

    public function getHargaAttribute()
    {
        return 'Rp. '.Number::format($this->price).',-';
    }

    public function getGambarAttribute()
    {
        return $this->photo ? Storage::url($this->photo) : url('noimages.png');
    }
}