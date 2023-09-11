<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    use HasFactory;
    protected $fillable = [
        'destination', 'slug', 'views', 'created_by'
    ];

    public function user(){
        // The Url belongs to User
        $this->belongsTo('App\Model\User', 'id');
    }

    public static function deleteStaleLinks()
    {
        // This will subtract thirty days from now
        $thirtyDaysAgo = Carbon::now()->subDays(30);

        // Delete links which are stale for more than thirty days
        self::where('updated_at', '<', $thirtyDaysAgo)->delete();
    }
}
