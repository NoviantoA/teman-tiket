<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketUsers extends Model
{
    use HasFactory;
    protected $table = 'ticket_users';
    protected $primaryKey = 'ticket_users_id';
    protected $fillable = [
        "transaction_id",
        "ticket_user_email",
        "ticket_user_name",
        "ticket_user_phone",
        "ticket_user_bdate",
        "ticket_user_gender",
        "ticket_user_address",
    ];
}
