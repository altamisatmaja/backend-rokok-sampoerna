<?php

class RokokController extends Controller
{
    private $rokokmodels;

    public function __construct()
    {
        $this->rokokmodels = $this->model('Rokok');
    }

    public function index()
    {
        $data = [
            'title' => 'Rokok',
            'rokok' => $this->rokokmodels->getAll(),
        ];

        $this->view('pages/admin/rokok/list', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah data rokok',
        ];
        $this->view('pages/admin/rokok/create', $data);
    }

    public function store()
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $namaRokok = $_POST['nama_rokok'];
                $hargaPack = $_POST['harga_pack'];
                $type = $_POST['type'];
    
                $data = [
                    'nama_rokok' => $namaRokok,
                    'harga_pack' => $hargaPack,
                    'type' => $type,
                ];
                $result = $this->rokokmodels->store($data);
    
                if ($result) {
                    Message::setFlash('success','Data berhasil ditambahkan');
                    $this->redirect('dashboard');
                } else {
                    Message::setFlash('success','Data gagal ditambahkan');
                    $this->redirect('rokok');
                }
            } else {
                echo 'Permintaan tidak valid.';
            }
        } catch (\Exception $e) {
            Message::setFlash('error', 'Terjadi kesalahan: ', $e->getMessage());
            $this->redirect('dashboard');
        }
    }

    public function show($id){
        var_dump($_GET);
        $this->view('pages/admin/rokok/edit');
    }
}
