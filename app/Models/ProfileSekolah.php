<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileSekolah extends Model
{
     protected $table = 'profile_sekolah';

    protected $primaryKey = 'id_sekolah';

    public $incrementing = false;

    protected $keyType = 'string';

    public $timestamps = false;

    protected $fillable = [
        'id_sekolah',
        'nama_sekolah',
        'kepala_sekolah',
        'foto',
        'logo',
        'alamat',
        'kontak',
        'visi-misi',
        'tahun_berdiri',
        'deskripsi',
    ];
}
