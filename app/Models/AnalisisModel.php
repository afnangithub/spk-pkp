<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class AnalisisModel extends Model
{
    /*
     Yang diketahui di sini adalah mata kuliah
     */
    public function allDataDiketahui()
    {
        return DB::table('atribut')
            ->where('status', 'diketahui')
            ->get();
    }
    /*
     Yang dicari di sini adalah konsentrasi
     */
    public function allDataDicari()
    {
        return DB::table('atribut')
            ->where('status', 'dicari')
            ->get();
    }
    /*
     Yang dicari di sini adalah konsentrasi
     */
    public function allDataKriteriaDicari()
    {
        return DB::table('atribut')
            ->select(
                'kriteria.id as id_kriteria',
                'kriteria'
            )
            ->leftJoin('kriteria', 'atribut.id', '=', 'kriteria.id_atribut')
            ->where('status', 'dicari')
            ->get();
    }
    public function getDataAtribut($id)
    {
        return DB::table('atribut')
            ->leftJoin('kriteria', 'atribut.id', '=', 'kriteria.id_atribut')
            ->where('kriteria.id', $id)
            ->value('nama');
    }
    public function getDataKriteria($id)
    {
        return DB::table('kriteria')
            ->where('id', $id)
            ->value('kriteria');
    }
    public function allData()
    {
        return DB::table('data')->get();
    }
    public function getDataset($id_data, $id_kriteria)
    {
        return DB::table('dataset')
            ->where('id_data', $id_data)
            ->where('id_kriteria', $id_kriteria)
            ->value('id');
    }
    public function countData()
    {
        return DB::table('data')->count();
    }
}