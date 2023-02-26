<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blt_Minyak_Goreng extends Model
{
    use HasFactory;
    protected $table = 'blt_minyak_gorengs';
    protected $fillable = [
        'Nokk',
        'Nik',
        'Nama',
        'Alamat',
        'Sk_Dtks',
        'Terakhir_Padan_Capil',
        'Bpnt ',
        'Bst',
        'Pkh',
        'Pbi',
        'Bpnt_Ppkm ',
        'Blt',
        'Blt_Bbm',
        'Rutilahu', 
        'Keterangan_Disabilitas',
        'Kelurahan',
        'Kecamatan',
        'CreateBy',
        'UpdateBy',
       ];
}
