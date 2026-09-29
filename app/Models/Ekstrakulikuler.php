<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ekstrakulikuler extends Model
{
    protected $table = 'ekstrakulikuler';

    protected $primaryKey = 'id';

    protected $fillable = [
        'nama_ekstrakulikuler',
        'pembina',
        'jadwal_latihan',
        'deskripsi',
        'foto',
    ];
}
