<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    use HasFactory;
    protected $table = 'transactions';
    protected $primaryKey = 'transaction_id';
    protected $fillable = [
        'event_id',
        "ticket_id",
        "user_id",
        "transaction_ticket_count",
        "transaction_ppn",
        "transaction_app_service",
        "transaction_total",
        "transaction_is_paid",
        "transaction_end_date",
    ];
    
}
