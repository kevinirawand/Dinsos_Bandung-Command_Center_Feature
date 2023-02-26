<?php

namespace App\Exports;

use App\Models\Dtks;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\FromQuery;

class DtksExport implements FromCollection, WithHeadings, ShouldQueue
{

    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return dtks::orderBy('created_at', 'DESC')->get()->pagination(10);
    }
    
    public function headings(): array
    {
        return [ 'Nama',
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
                'Pbi_Jni',
                'created_at',
                'update_at',
            ];
    }
}
