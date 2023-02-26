<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blt_BBM extends Model
{
    use HasFactory;
    protected $table = 'data_blt_bbm';
    protected $fillable = [
        'Nik',
        'Nokk',
        'Nama_Penerima',
        'Alamat',
        'Nomer_Rekening',
        'status',
        'Bansos_BLT_BBM',
        'periode',
        'penyalur',
        'Kelurahan',
        'Kecamatan',
        'CreateBy',
        'UpdateBy',
       ];
}
