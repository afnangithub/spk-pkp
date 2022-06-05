<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DatasetModel extends Model
{
    public function allData()
    {
        return DB::table('dataset')
            ->select(
                'dataset.id as dataset_id',
                'id_data',
                'nama',
                'kriteria'
            )
            ->leftJoin('kriteria', 'kriteria.id', '=', 'dataset.id_kriteria')
            ->leftJoin('atribut', 'atribut.id', '=', 'kriteria.id_atribut')
            ->paginate(5);
    }
    public function getData($id_data)
    {
        return DB::table('dataset')
            ->select(
                'dataset.id as dataset_id',
                'id_kriteria',
                'nama',
                'kriteria'
            )
            ->leftJoin('kriteria', 'kriteria.id', '=', 'dataset.id_kriteria')
            ->leftJoin('atribut', 'atribut.id', '=', 'kriteria.id_atribut')
            ->where('id_data', $id_data)
            ->get();
    }

    public function getIDDataset($id_data, $id_kriteria)
    {
        $id_atribut = DB::table('kriteria')
            ->select(
                'id_atribut',
            )
            ->where('id', $id_kriteria)
            ->value('id_atribut');
        $id_dataset = DB::table('dataset')
            ->select(
                'dataset.id as dataset_id',
            )
            ->leftJoin('kriteria', 'kriteria.id', '=', 'dataset.id_kriteria')
            ->leftJoin('atribut', 'atribut.id', '=', 'kriteria.id_atribut')
            ->where('id_data', $id_data)
            ->where('id_atribut', $id_atribut)
            ->value('dataset_id');
        return $id_dataset;
    }

    public function addData($data)
    {
        DB::table('dataset')->insert($data);
    }

    public function editData($id, $data)
    {
        DB::table('dataset')
            ->where('id', $id)
            ->update($data);
    }
}
