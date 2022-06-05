<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AtributModel;
use App\Models\KriteriaModel;
use App\Models\DatasetModel;
use App\Models\DataModel;

class DatasetController extends Controller
{
    public function __construct()
    {
        $this->DatasetModel = new DatasetModel;
        $this->DataModel = new DataModel;
        $this->AtributModel = new AtributModel;
        $this->KriteriaModel = new KriteriaModel;
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'datas' => $this->DataModel->allData(),
        ];
        return view('v_data.v_data', $data);
    }

    public function search()
    {
        $data = [
            'datas' => $this->DataModel->searchData(Request()->search),
        ];
        return view('v_data.v_data', $data);
    }

    public function detail($id)
    {
        if (!$this->DataModel->detailData($id)) {
            abort(404);
        }

        $data = [
            'atributs' => $this->AtributModel->allDataNoPaginate(),
            'kriterias' => $this->KriteriaModel->allDataNoPaginate(),
            'datas' => $this->DataModel->detailData($id),
            'dataset' => $this->DatasetModel->getData($id),
        ];
        return view('v_data.v_detail', $data);
    }

    public function add()
    {
        return view('v_data.v_add');
    }

    public function insert()
    {
        //Jika
        Request()->validate([
            'keterangan' => 'required',
        ], [
            'keterangan.required' => 'wajib diisi !!',
        ]);

        $data = [
            'keterangan' => Request()->keterangan,
        ];

        $this->DataModel->addData($data);
        return redirect()->route('data')->with('pesan', 'Data Berhasil Di Tambahkan !!!');
    }

    public function edit($id)
    {
        if (!$this->DataModel->detailData($id)) {
            abort(404);
        }
        $data = [
            'datas' => $this->DataModel->detailData($id),
        ];
        return view('v_data.v_edit', $data);
    }

    public function update($id)
    {
        Request()->validate([
            'keterangan' => 'required',
        ], [
            'keterangan.required' => 'wajib diisi !!',
        ]);

        $data = [
            'keterangan' => Request()->keterangan,
        ];

        $this->DataModel->editData($id, $data);

        return redirect()->route('data')->with('pesan', 'Data Berhasil Di Update !!!');
    }

    public function delete($id)
    {
        $this->DataModel->deleteData($id);
        return redirect()->route('data')->with('pesan', 'Data Berhasil Di Di Hapus !!!');
    }

    public function index_dataset()
    {
        $data = [
            'dataset' => $this->DatasetModel->allData(),
        ];
        return view('v_data.v_dataset.v_data', $data);
    }

    public function insert_dataset(Request $request)
    {
        foreach ($request->id_kriteria as $id) {
            $id_dataset = $this->DatasetModel->getIDDataset($request->id, $id);
            $data = [
                'id_data' => $request->id,
                'id_kriteria' => $id,
            ];
            if (!$id_dataset) {
                $this->DatasetModel->addData($data);
            } else {
                $this->DatasetModel->editData($id_dataset, $data);
            }
        }

        return redirect()->route('data.detail', $request->id)->with('pesan', 'Data Berhasil Di Tambahkan !!!');
    }
}
