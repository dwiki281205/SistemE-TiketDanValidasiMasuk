<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Ticket;

class EticketEvent extends Model
{
    protected $table = 'eticket_events';

    protected $fillable = [
        'title',
        'description',
        'category',
        'vip_price',
        'regular_price',
        'venue',
        'event_date',
        'event_time',
        'total_seats',
        'price',
        'organizer_name',
        'contact',
        'poster',
        'status'
    ];

    // 🔥 TAMBAHKAN DI SINI
    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'event_id');
    }
}