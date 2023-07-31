<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    use HasFactory;

    protected $table = 'events';
    protected $primaryKey = 'event_id';
    protected $fillable = [
        'user_id',
        "transaction_id",
        "wishlist_id",
        "talent_id",
        "event_price",
        "event_name",
        "event_location",
        "event_date",
        "event_city",
        "event_poster",
        "event_description",
        "event_tag",
    ];
}
