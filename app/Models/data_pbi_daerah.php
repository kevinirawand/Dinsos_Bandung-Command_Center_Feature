<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class data_pbi_daerah extends Model
{
    use HasFactory;
    protected $table = 'data_pbi_daerah';
    protected $fillable = [
        'No',
        'Ps_Noka',
        'Noka',
        'Nama',
        'Nik',
        'Pisat',
        'Tgl_lahir',
        'Jenkel',
        'Kd_Status_Pst',
        'Premi',
        'Kelas',
        'Tmt',
        'No_Pkk',
        'NmPkk',
        'Alamat',
        'Rt',
        'Rw',
        'Kd_Desa',
        'NmDesa',
        'Kd_Kec',
        'Nm_Kec',
        'No_KK',
        'Jn_Stag',
        'Ts_Input',
        'CreateBy',
        'UpdateBy',
       ];
}
