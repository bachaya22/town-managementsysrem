<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = [
        "customer_id", 'email', 'cnic', 'phone', "add_plot_id", 'marla', 'plot_type', 'categories',
        'total_amount', 'payment_type', 'num_installments', 'installment_payment', 'total_payment','status',
    ];

    public function customer():BelongsTo{
        return $this->belongsTo(Customer::class);
    }
    public function plots():BelongsTo{
        return $this->belongsTo(AddPlot::class,'add_plot_id');
    }
    public function installments(): HasMany
    {
        return $this->hasMany(Installment::class);
    }
    
}
