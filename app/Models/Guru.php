<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
     protected $table = 'guru';

    protected $primaryKey = 'id';

    protected $fillable = [
        'nama_guru',
        'nip',
        'mata_pelajaran',
        'foto',
    ];
}
