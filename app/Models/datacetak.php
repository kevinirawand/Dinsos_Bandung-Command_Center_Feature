<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class datacetak extends Model
{
    use HasFactory;
    protected $table = 'Data_cetak';
    protected $fillable = [
        'Nik',
        'Nokk',
        'Nama',
        'Tanggal_Lahir',
        'Alamat',
        'Desa_Kelurahan',
        'Kecamatan',
        'Alamat',
        'Bansos',
        'Uhc',
        'Dapodik',
       ];

}
