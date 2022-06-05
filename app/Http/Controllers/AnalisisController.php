<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\KriteriaModel;
use App\Models\AnalisisModel;
class AnalisisController extends Controller
{
    public function __construct()
    {
        $this->KriteriaModel = new KriteriaModel;
        $this->AnalisisModel = new AnalisisModel;
    }
    /*
     Yang diketahui di sini adalah mata kuliah
     Yang dicari di sini adalah konsentrasi
     */
    public function index()
    {
        $data = [
            'kriterias' => $this->KriteriaModel->allDataNoPaginate(),
            'diketahuis' => $this->AnalisisModel->allDataDiketahui(),
            'dicaris' => $this->AnalisisModel->allDataDicari(),
        ];
        return view('v_analisis.v_data', $data);
    }
    /*
     Yang diketahui di sini adalah mata kuliah
     Yang dicari di sini adalah konsentrasi
     */
    public function hitung(Request $request)
    {
        $dataset = array();
        $dicaris = $this->AnalisisModel->allDataKriteriaDicari();
        $alldata = $this->AnalisisModel->allData();
        foreach ($request->id_kriteria as $key => $value) {
            $dataset[$key][0] = $this->AnalisisModel->getDataAtribut($value);
            $dataset[$key][1] = $this->AnalisisModel->getDataKriteria($value);
            $dataset_dicari = array();
            foreach ($dicaris as $k_dicari => $dicari) {
                $jumlah_dataset = 0;
                $jumlah_dataset_dicari = 0;
                foreach ($alldata as $all) {
                    $id_kriteria_v = $this->AnalisisModel->getDataset($all->id, $value);
                    $id_kriteira_dicari = $this->AnalisisModel->getDataset($all->id, $dicari->id_kriteria);
                    if ($id_kriteria_v && $id_kriteira_dicari) {
                        $jumlah_dataset++;
                        $jumlah_dataset_dicari++;
                    } elseif ($id_kriteira_dicari) {
                        $jumlah_dataset_dicari++;
                    }
                }
                $dataset_dicari[$k_dicari][0] = $jumlah_dataset;
                $dataset_dicari[$k_dicari][1] = $jumlah_dataset_dicari;
                if ($jumlah_dataset_dicari) {
                    $dataset_dicari[$k_dicari][2] = $jumlah_dataset / $jumlah_dataset_dicari;
                } else {
                    $dataset_dicari[$k_dicari][2] = 0;
                }
            }
            $dataset[$key][2] = $dataset_dicari;
        }
        $dataset_jumlah = array();
        foreach ($dicaris as $k_dicari => $dicari) {
            $dataset_dicari = array();
            $jumlah_kriteria = 0;
            $akumulasi_kriteria = 1;
            foreach ($request->id_kriteria as $key => $value) {
                $jumlah_dataset = 0;
                $jumlah_dataset_dicari = 0;
                foreach ($alldata as $all) {
                    $id_kriteria_v = $this->AnalisisModel->getDataset($all->id, $value);
                    $id_kriteira_dicari = $this->AnalisisModel->getDataset($all->id, $dicari->id_kriteria);
                    if ($id_kriteria_v && $id_kriteira_dicari) {
                        $jumlah_dataset++;
                        $jumlah_dataset_dicari++;
                    } elseif ($id_kriteira_dicari) {
                        $jumlah_dataset_dicari++;
                    }
                }
                $dataset_dicari[$key][0] = $jumlah_dataset;
                $dataset_dicari[$key][1] = $jumlah_dataset_dicari;
                if ($jumlah_dataset_dicari) {
                    $dataset_dicari[$key][2] = $jumlah_dataset / $jumlah_dataset_dicari;
                } else {
                    $dataset_dicari[$key][2] = 0;
                }
                $akumulasi_kriteria *= $dataset_dicari[$key][2];
                $jumlah_kriteria++;
            }
            $dataset_jumlah[$k_dicari][0] = $dicari->kriteria;
            $dataset_jumlah[$k_dicari][1] = $akumulasi_kriteria * ($jumlah_dataset_dicari / $this->AnalisisModel->countData());
        }
        $hasil = array();
        $hasil[0] = 0;
        $hasil[1] = '';
        foreach ($dataset_jumlah as $k_dicari => $value) {
            if ($dataset_jumlah[$k_dicari][1] >= $hasil[1]) {
                $hasil[0] = $dataset_jumlah[$k_dicari][0];
                $hasil[1] = $dataset_jumlah[$k_dicari][1];
            }
        }
        $data = [
            'dicaris' => $this->AnalisisModel->allDataKriteriaDicari(),
            'dataset' => $dataset,
            'dataset_jumlah' => $dataset_jumlah,
            'dicarisx' => $this->AnalisisModel->allDataDicari(),
            'hasil' => $hasil,
        ];
        return view('v_analisis.v_hitung', $data);
    }
}