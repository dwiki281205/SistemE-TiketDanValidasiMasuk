<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EticketEvent extends Model
{
    protected $table = 'eticket_events';

protected $fillable = [
    'title',
    'description',
    'category',
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
}
