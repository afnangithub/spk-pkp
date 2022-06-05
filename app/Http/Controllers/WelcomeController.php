<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WelcomeModel;

class WelcomeController extends Controller
{
    public function __construct()
    {
        $this->WelcomeModel = new WelcomeModel;
    }

    public function index()
    {
        // $data_in = $this->WelcomeModel->allData();
        // $data_pro = $this->WelcomeModel->allData();
        // foreach ($data_in as $data_in_data) {
        //     $dataset_in = $this->WelcomeModel->getDataset($data_in_data);
        //     foreach ($dataset_in as $dataset_in_data) {
                
        //     }
        // }
        $data = [
            'c_atribut' => $this->WelcomeModel->countAtribut(),
        ];
        return view('v_welcome', $data);
    }
}
