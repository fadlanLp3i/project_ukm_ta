<?php
namespace App\Controllers;
use App\Models\UkmModel;
use CodeIgniter\Controller;

class UkmController extends Controller
{
    protected $ukmModel;

    public function __construct()
    {
        $this->ukmModel = new UkmModel();
    }

    public function index()
    {
        $data['ukm'] = $this->ukmModel->findAll(); // Semua UKM
        return view('ukm/index', $data);
    }

    public function lcc()
    {
        $data['ukm'] = $this->ukmModel->where('nama_ukm', 'LCC')->findAll();
        return view('ukm/lcc', $data);
    }

    public function lac()
    {
        $data['ukm'] = $this->ukmModel->where('nama_ukm', 'LAC')->findAll();
        return view('ukm/lac', $data);
    }

    // Tambah method untuk SEAL dan KAMIL serupa
    public function seal()
    {
        $data['ukm'] = $this->ukmModel->where('nama_ukm', 'SEAL')->findAll();
        return view('ukm/seal', $data);
    }

    public function kamil()
    {
        $data['ukm'] = $this->ukmModel->where('nama_ukm', 'KAMIL')->findAll();
        return view('ukm/kamil', $data);
    }
}