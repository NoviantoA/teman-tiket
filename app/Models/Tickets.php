<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tickets extends Model
{
    use HasFactory;
    protected $table = 'tickets';
    protected $primaryKey = 'ticket_id';
    protected $fillable = [
        'event_id',
        "ticket_name",
        "ticket_capacity",
        "ticket_sold",
        "ticket_status"
    ];

    public function event(): BelongsTo
    {
        return $this->belongsTo(Events::class, 'event_id', 'event_id');
    }
}