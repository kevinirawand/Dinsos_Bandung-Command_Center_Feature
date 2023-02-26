<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data_Ppks extends Model
{
    use HasFactory;
    protected $table = 'data_ppks';
    protected $fillable = [
        'Kategori_Ppks',
        'Kondisi_Kedisabilitasan',
        'Ragam_Disabilitas',
        'No_KK',
        'Nik',
        'Nama_Lengkap',
        'Jenkel',
        'Tempat_Lahir',
        'Tanggal_Lahir',
        'Agama',
        'Pendidikan_Terakhir',
        'Pekerjaan',
        'Status_Kawin',
        'Shdk_Duk',
        'Nama_Ibu_Kandung',
        'Kecamatan',
        'Kelurahaan',
        'Alamat',
        'Rt',
        'Rw',
        'Ppks_Tinggal',
        'Status_Dtks',
        'BPNT',
        'PKH',
        'Pbi_Jkn',
        'Jenis_Bansos',
        'Status_Bansos',
        'Hubungan_Keluarga',
        'Status_Duk',
        'CreatedBy',
        'UpdateBy',
       ];
}
