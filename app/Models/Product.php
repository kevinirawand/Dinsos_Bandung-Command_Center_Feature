<?php
  
namespace App\Models;
  
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
  
class Product extends Model
{
    use HasFactory;
  
    /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */
    protected $fillable = [
     'Provinsi','Kabupaten_Kota', 'Kecamatan','Desa_Kelurahan', 'RT','RW', 'NOKK','NIK', 'Tanggal_Lahir','Tempat_Lahir', 'Jenis_Kelamin'
    ];
}