<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    protected $table = 'events';
    // Make all attributes mass assignable
    protected $fillable = [
        'nama_event',
        'tanggal_event',
        'jam_mulai',
        'jam_selesai',
        'lokasi',
        'deskripsi',
        'file_foto'
    ];
    use HasFactory;
}
