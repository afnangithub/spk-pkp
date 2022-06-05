<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DataModel extends Model
{
    public function allData()
    {
        return DB::table('data')
            ->paginate(5);
    }

    public function searchData($data)
    {
        $result = DB::table('data')
                ->where('keterangan', 'like', '%'.$data.'%')
                ->paginate(5);
        return $result;
    }

    public function detailData($id)
    {
        return DB::table('data')->where('id', $id)->first();
    }

    public function addData($data)
    {
        DB::table('data')->insert($data);
    }

    public function editData($id, $data)
    {
        DB::table('data')
            ->where('id', $id)
            ->update($data);
    }

    public function deleteData($id)
    {
        DB::table('data')
            ->where('id', $id)
            ->delete();
    }
}
