<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class KriteriaModel extends Model
{
    public function allData()
    {
        return DB::table('kriteria')
            ->select(
                'kriteria.id as kriteria_id',
                'nama',
                'kriteria'
            )
            ->leftJoin('atribut', 'atribut.id', '=', 'kriteria.id_atribut')
            ->paginate(5);
    }

    public function allDataNoPaginate()
    {
        return DB::table('kriteria')
            ->select(
                'kriteria.id as kriteria_id',
                'id_atribut',
                'nama',
                'kriteria'
            )
            ->leftJoin('atribut', 'atribut.id', '=', 'kriteria.id_atribut')
            ->get();
    }

    public function getData($id_atribut)
    {
        return DB::table('kriteria')
            ->select(
                'kriteria.id as kriteria_id',
                'kriteria'
            )
            ->leftJoin('atribut', 'atribut.id', '=', 'kriteria.id_atribut')
            ->where('id_atribut', $id_atribut)
            ->paginate(5);
    }

    public function detailData($id)
    {
        return DB::table('kriteria')->where('id', $id)->first();
    }

    public function getIDAtribut($id)
    {
        return DB::table('kriteria')->where('id', $id)->value('id_atribut');
    }

    public function addData($data)
    {
        DB::table('kriteria')->insert($data);
    }

    public function editData($id, $data)
    {
        DB::table('kriteria')
            ->where('id', $id)
            ->update($data);
    }

    public function deleteData($id)
    {
        DB::table('kriteria')
            ->where('id', $id)
            ->delete();
    }
}
