<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    use HasFactory;
    protected $fillable = [
        'destination', 'slug', 'views',
    ];
    public function getUrlData()
    {
        return config('app.url') . '/' . $this->slug;
    }
}
