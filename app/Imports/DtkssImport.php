<?php

namespace App\Imports;

use App\Models\Dtks;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Validation\Rule;
// use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithLimit;

class DtkssImport implements ToModel,WithLimit,WithHeadingRow,WithValidation,SkipsOnError,WithChunkReading
{
    use Importable, SkipsErrors;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // print_r($row);
        return new Dtks([
            'Id_DTKS'     => $row['id_dtks'],
            'Provinsi'    => $row['provinsi'],
            'Kabupaten_Kota'    => $row['kabupaten_kota'],
            'Kecamatan'    => $row['kecamatan'],
            'Desa_Kelurahan'    => $row['desa_kelurahan'],
            'Alamat'    => $row['alamat'],
            'Dusun'    => $row['dusun'],
            'RT'    => $row['rt'],
            'RW'    => $row['rw'],
            'Nokk'    => $row['nokk'],
            'Nik'    => $row['nik'],
            'Nama'    => $row['nama'],
            'Tanggal_Lahir'    => $row['tanggal_lahir'],
            'Tempat_Lahir'    => $row['tempat_lahir'],
            'Jenis_Kelamin'    => $row['jenis_kelamin'],
            'Pekerjaan'    => $row['pekerjaan'],
            'Nama_Ibu_Kandung'    => $row['nama_ibu_kandung'],
            'Hub_Keluarga'    => $row['hub_keluarga'],
            'Keterangan_padan'    => $row['keterangan_padan'],
            'Bansos_Bpnt'    => $row['bansos_bpnt'],
            'Bansos_Pkh'    => $row['bansos_pkh'],
            'Bansos_Bnpnt_Ppkm'    => $row['bansos_bnpnt_ppkm'],
            'Pbi_Jni'    => $row['pbi_jni'],
        ]);
       
    }
    // public function batchSize(): int
    // {
    //     return 10;
    // }
    
    public function chunkSize(): int
    {
        return 500;
    }
    public function limit(): int
    {
        return 500;
    }
    public function getCsvSettings(): array
    {
        return [
            'delimiter' => "|"
        ];
    }
    public function rules(): array
    {
        return [
            'Id_DTKS' => \Illuminate\Validation\Rule::unique( 'id_dtks'),
            
        ];
    }

    
}
