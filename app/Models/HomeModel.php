<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class HomeModel extends Model
{
    public function countAtribut()
    {
        return DB::table('atribut')->count();
    }
    public function countKriteria()
    {
        return DB::table('kriteria')->count();
    }
    public function countData()
    {
        return DB::table('data')->count();
    }
    public function countDataset()
    {
        return DB::table('dataset')->count();
    }
}
