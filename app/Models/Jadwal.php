<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\User;

class Jadwal extends Model
{
    use HasFactory;

    protected $fillable = [
        'nip',
        'tanggal',
        'jam_mulai',
        'jam_selesai',
        'id_supervisor',
    ];

    public function guru()
    {
        return $this->belongsTo(User::class, 'nip', 'nip');
    }

    public function supervisor()
    {
        return $this->belongsTo(User::class, 'id_supervisor', 'nip');
    }
}
