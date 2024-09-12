<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ponto extends Model
{
    use HasFactory;

    public $table = 'time_records';

    protected $fillable = [
        'user_id',
        'image',
        'time_in',
        'time_out_break',
        'time_in_break',
        'time_out',
        'ip_address',
        'now_localization',
        'last_localization',
        'dateHour',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
