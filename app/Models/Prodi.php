<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Prodi extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $tables = 'prodis';
    public $timestamps = true;
    public $fillable = ['fakultas_id', 'nama_prodi'];
    public function fakultas(){
        return $this->hasOne(Fakultas::class, 'id', 'fakultas_id');
    }
}
