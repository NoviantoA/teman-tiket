<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlists extends Model
{
    use HasFactory;
    protected $table = 'wishlists';
    protected $primaryKey = 'wishlist_id';
    protected $fillable = [
        'user_id',
        "event_id",
    ];
}
