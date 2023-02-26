<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dtks extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'Nama',
        'Id_DTKS',
        'Provinsi',
        'Kabupaten_Kota',
        'Kecamatan',
        'Desa_Kelurahan',
        'Alamat',
        'Dusun',
        'RT',
        'RW',
        'Nokk',
        'Nik',
        'Tanggal_Lahir',
        'Tempat_Lahir', 
        'Jenis_Kelamin',
        'Pekerjaan',
        'Nama_Ibu_Kandung',
        'Hub_Keluarga',
        'Keterangan_padan',
        'Bansos_Bpnt',
        'Bansos_Pkh',
        'Bansos_Bnpnt_Ppkm',
        'Pbi_Jni'
       ];
       public function umkm()
    {
        return $this->hasMany(Data_Umkm::class, 'Nik');
    }
}
