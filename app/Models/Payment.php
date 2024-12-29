<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function member()
    {
        return $this->belongsTo(Order::class, 'id_order', 'id');
    }

    public function getBuktiTransferUrlAttribute()
    {
        if (!$this->bukti_transfer) {
            return null;
        }
        return asset('uploads/payment_proof/' . $this->bukti_transfer);
    }
}
