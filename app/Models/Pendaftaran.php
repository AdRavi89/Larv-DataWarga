<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;
    protected $tables = 'pendaftarans';
    public $timestamps = true;
    public $fillable = [
        'nama_lengkap',
        'alamat',
        'kota',
        'tanggal_lahir',
        'asal_sekolah',
        'ijazah_url',
        'prodi_id',
        'status',
        'tanggal_pendaftaran',
        'user_id'
    ];
    public function prodi()
    {
        return $this->hasOne(Prodi::class, 'id', 'prodi_id');
    }
}