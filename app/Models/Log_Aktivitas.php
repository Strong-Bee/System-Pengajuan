<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LogAktivitas extends Model
{
    // Nama tabel
    protected $table = 'log_aktivitas';

    // Mass assignable fields
    protected $fillable = [
        'user_id',
        'aktivitas',
    ];

    // Relasi ke User
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
