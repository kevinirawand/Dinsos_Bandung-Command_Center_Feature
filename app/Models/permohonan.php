<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class permohonan extends Model
{
    use HasFactory;
    protected $table = 'permohonan';
    protected $fillable = [
        'Id_User',
        'Nik',
        'Nama',
        'Jenis_Permohonan',
        'Kelurahan',
        'File_Permohonan',
        'CreateBy' ,
        'UpdateBy'
    ];
}
