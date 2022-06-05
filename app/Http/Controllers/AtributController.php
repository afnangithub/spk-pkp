<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AtributModel;
use App\Models\KriteriaModel;

class AtributController extends Controller
{
    public function __construct()
    {
        $this->AtributModel = new AtributModel;
        $this->KriteriaModel = new KriteriaModel;
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'atribut' => $this->AtributModel->allData(),
        ];
        return view('v_atribut.v_data', $data);
    }

    public function search()
    {
        $data = [
            'atribut' => $this->AtributModel->searchData(Request()->search),
        ];
        return view('v_atribut.v_data', $data);
    }

    public function detail($id)
    {
        if (!$this->AtributModel->detailData($id)) {
            abort(404);
        }
        $data = [
            'atribut' => $this->AtributModel->detailData($id),
            'kriteria' => $this->KriteriaModel->getData($id),
        ];
        return view('v_atribut.v_detail', $data);
    }

    public function add()
    {
        return view('v_atribut.v_add');
    }

    public function insert()
    {
        //Jika
        Request()->validate([
            'nama' => 'required|unique:atribut,nama',
            'status' => 'required',
        ], [
            'nama.required' => 'wajib diisi !!',
            'nama.unique' => 'Nama Atribut Ini Sudah Ada !!',
            'status.required' => 'wajib diisi !!',
        ]);

        $data = [
            'nama' => Request()->nama,
            'status' => Request()->status,
        ];
        $id = $this->AtributModel->isGetIDDicari();
        if ($id && Request()->status == 'dicari') {
            $this->AtributModel->editData($id, $data);
        } else {
            $this->AtributModel->addData($data);
        }
        return redirect()->route('atribut')->with('pesan', 'Data Berhasil Di Tambahkan !!!');
    }

    public function edit($id)
    {
        if (!$this->AtributModel->detailData($id)) {
            abort(404);
        }
        $data = [
            'atribut' => $this->AtributModel->detailData($id),
        ];
        return view('v_atribut.v_edit', $data);
    }

    public function update($id)
    {
        Request()->validate([
            'nama' => 'required',
        ], [
            'nama.required' => 'wajib diisi !!',
        ]);

        $data = [
            'nama' => Request()->nama,
        ];

        $this->AtributModel->editData($id, $data);

        return redirect()->route('atribut')->with('pesan', 'Data Berhasil Di Update !!!');
    }

    public function delete($id)
    {
        $this->AtributModel->deleteData($id);
        return redirect()->route('atribut')->with('pesan', 'Data Berhasil Di Di Hapus !!!');
    }

    public function index_kriteria()
    {
        $data = [
            'kriteria' => $this->KriteriaModel->allData(),
        ];
        return view('v_atribut.v_kriteria.v_data', $data);
    }

    public function add_kriteria($id)
    {
        $data = [
            'id' => $id,
        ];
        return view('v_atribut.v_kriteria.v_add', $data);
    }

    public function insert_kriteria()
    {
        //Jika
        Request()->validate([
            'id' => 'required',
            'kriteria' => 'required',
        ], [
            'id.required' => 'wajib diisi !!',
            'kriteria.required' => 'wajib diisi !!',
        ]);

        $data = [
            'id_atribut' => Request()->id,
            'kriteria' => Request()->kriteria,
        ];

        $this->KriteriaModel->addData($data);
        return redirect()->route('atribut.detail', Request()->id)->with('pesan', 'Data Berhasil Di Tambahkan !!!');
    }

    public function edit_kriteria($id)
    {
        if (!$this->KriteriaModel->detailData($id)) {
            abort(404);
        }
        $data = [
            'kriteria' => $this->KriteriaModel->detailData($id),
        ];
        return view('v_atribut.v_kriteria.v_edit', $data);
    }

    public function update_kriteria($id)
    {
        Request()->validate([
            'id' => 'required',
            'kriteria' => 'required',
        ], [
            'id.required' => 'wajib diisi !!',
            'kriteria.required' => 'wajib diisi !!',
        ]);

        $data = [
            'id' => Request()->id,
            'kriteria' => Request()->kriteria,
        ];

        $id_atribut = $this->KriteriaModel->getIDAtribut($id);
        $this->KriteriaModel->editData($id, $data);

        return redirect()->route('atribut.detail', $id_atribut)->with('pesan', 'Data Berhasil Di Update !!!');
    }

    public function delete_kriteria($id)
    {
        $id_atribut = $this->KriteriaModel->getIDAtribut($id);
        $this->KriteriaModel->deleteData($id);
        return redirect()->route('atribut.detail', $id_atribut)->with('pesan', 'Data Berhasil Di Di Hapus !!!');
    }
}
