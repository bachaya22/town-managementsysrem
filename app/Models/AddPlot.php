<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class AddPlot extends Model
{
    use HasFactory;
    protected $fillable = [
        'plotno','type','categories','length','width','marla','price','down_payment','total_amount','status','description',
    ];

    function booking():HasOne{
     return $this->hasOne(Booking::class);
 }
}
