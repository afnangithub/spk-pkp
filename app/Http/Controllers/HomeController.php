<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeModel;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->HomeModel = new HomeModel;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //return view('home');
        $data = [
            'c_atribut' => $this->HomeModel->countAtribut(),
            'c_kriteria' => $this->HomeModel->countKriteria(),
            'c_data' => $this->HomeModel->countData(),
            'c_dataset' => $this->HomeModel->countDataset(),
        ];
        return view('v_home', $data);
    }
}
