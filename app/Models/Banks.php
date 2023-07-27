<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banks extends Model
{
    use HasFactory;
    use HasFactory;

    protected $table = 'banks';
    protected $primaryKey = 'bank_id';
    protected $fillable = [
        'user_id',
        "bank_type",
        "bank_nomer_rekening",
        "bank_nomer_hp",
        "bank_name",
        "bank_name_user",
        "bank_is_verified",
    ];
}
