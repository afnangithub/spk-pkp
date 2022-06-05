<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AtributModel extends Model
{
    public function allData()
    {
        //return DB::table('atribut')->get();
        $result = DB::table('atribut')->paginate(5);
        return $result;
    }

    public function allDataNoPaginate()
    {
        return DB::table('atribut')->get();
    }

    public function searchData($data)
    {
        $result = DB::table('atribut')
            ->where('nama', 'like', '%' . $data . '%')
            ->paginate(5);
        return $result;
    }

    public function detailData($id)
    {
        return DB::table('atribut')->where('id', $id)->first();
    }

    public function addData($data)
    {
        DB::table('atribut')->insert($data);
    }

    public function editData($id, $data)
    {
        DB::table('atribut')
            ->where('id', $id)
            ->update($data);
    }

    public function deleteData($id)
    {
        DB::table('atribut')
            ->where('id', $id)
            ->delete();
    }

    public function isGetIDDicari()
    {
        return DB::table('atribut')
            ->where('status', 'dicari')
            ->value('id');
    }
}
