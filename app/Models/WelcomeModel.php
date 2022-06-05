<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class WelcomeModel extends Model
{
    public function countAtribut()
    {
        return DB::table('atribut')->count();
    }

    public function allData()
    {
        return DB::table('data')->get();
    }

    public function getDataset($id_data)
    {
        return DB::table('dataset')
            ->where('id_data', $id_data)
            ->get();
    }
}
