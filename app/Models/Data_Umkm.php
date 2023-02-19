<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data_Umkm extends Model
{
    use HasFactory;
    protected $table = 'data_umkm';
    protected $fillable = [
        'Nik',
        'Nama_Depan',
        'Alamat',
        'Rt',
        'Rw',
        'Kelurahan',
        'Kecamatan',
        'Nama_Usaha',
        'Jenis_Usaha',
        'Bentuk_Usaha',
        'Produk_1',
        'Jenis_aset',
        'jumlah_aset',
        'Jenis_Omset',
        'Jumlah_Omset',
        'Nama_DTKS',
        'DTKS',
        'KPM_Bansos',
        'BLT_BBM',
        'CreatedBy',
        'UpdateBy',
       ];

       public function Dtks()
       {
           return $this->belongsTo(Dtks::class,'Nik');
       }
}
