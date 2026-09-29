<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $table = 'berita';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'judul',
        'isi',
        'tanggal',
        'foto',
    ];
}
