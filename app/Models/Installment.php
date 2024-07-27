<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Installment extends Model
{
    use HasFactory;
    protected $fillable = [
        'booking_id',
        'installment_no',
        'email',
        'installment_amount',
        'date',
        'installment_status',
    ];

    public function booking()
{
    return $this->belongsTo(Booking::class);
}
}


