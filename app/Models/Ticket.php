<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'event_id',
        'buyer_name',
        'email',
        'phone',
        'seat_number',
        'ticket_code',
        'qr_code_data',
        'payment_method',
        'payment_status',
        'is_used',
        'used_at'
    ];

    public function event()
    {
        return $this->belongsTo(EticketEvent::class, 'event_id');
    }
}