<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data_Pkh extends Model
{
    use HasFactory;
    protected $table = 'data_pkh';
    protected $fillable = [
        'Nik',
        'Nama_Penerima',
        'Alamat',
        'Nomer_Rekening',
        'penyalur',
        'Data_Bansos_Pkh',
        'Status',
        'Periode',
        'CreatedBy',
        'UpdateBy',
       ];
}
