<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    use HasFactory;
    protected $fillable = [
        'destination', 'slug', 'views'
    ];
    public function getUrlData()
    {
        return config('app.url') . '/' . $this->slug;
    }
    public static function deleteStaleLinks()
    {
        $thirtyDaysAgo = Carbon::now()->subDays(30);

        self::where('updated_at', '<', $thirtyDaysAgo)->delete();
    }
}
