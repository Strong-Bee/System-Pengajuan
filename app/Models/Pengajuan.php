<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pengajuan extends Model
{
    // Nama tabel
    protected $table = 'pengajuan';

    // Mass assignable fields
    protected $fillable = [
        'user_id',
        'jenis',            // cuti, lembur, sakit
        'tanggal_mulai',
        'tanggal_selesai',
        'alasan',
        'status',           // pending, disetujui, ditolak
        'catatan_admin'
    ];

    // Constants untuk status
    public const STATUS_PENDING = 'pending';
    public const STATUS_DISETUJUI = 'disetujui';
    public const STATUS_DITOLAK = 'ditolak';

    // Relasi ke User
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Scope untuk status
    public function scopePending($query)
    {
        return $query->where('status', self::STATUS_PENDING);
    }

    public function scopeDisetujui($query)
    {
        return $query->where('status', self::STATUS_DISETUJUI);
    }

    public function scopeDitolak($query)
    {
        return $query->where('status', self::STATUS_DITOLAK);
    }
}
