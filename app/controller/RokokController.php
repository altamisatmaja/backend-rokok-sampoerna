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
                $gambarRokok = $_FILES['gambar_rokok'];
                // print_r($gambarRokok);

                $extension = pathinfo($_FILES['gambar_rokok']['name'], PATHINFO_EXTENSION);
                $namaFile = uniqid() . '.' . $extension;
                $tmpName = $_FILES['gambar_rokok']['tmp_name'];
                $location = $_SERVER['DOCUMENT_ROOT'] . '/backend-rokok-sampoerna/public/uploads';
                $located = $location . '/' . $namaFile;
                $uploaded = move_uploaded_file($tmpName, $located);
                if ($uploaded) {
                    echo 'Berhasil terupload';
                } else {
                    echo 'gagal terupload: ' . $_FILES['gambar_rokok']['error'];
                }

                $data = [
                    'nama_rokok' => $namaRokok,
                    'harga_pack' => $hargaPack,
                    'type' => $type,
                    'gambar_rokok' => $namaFile
                ];
                $result = $this->rokokmodels->store($data);

                if ($result) {
                    Message::setFlash('success', 'Data berhasil ditambahkan');
                    $this->redirect('dashboard');
                } else {
                    Message::setFlash('success', 'Data gagal ditambahkan');
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

    public function show($id)
    {
        try {
            $url = $_SERVER['REQUEST_URI'];
            $result = explode('/', $url);

            $id = end($result);
            $result = $this->rokokmodels->getbyid($id);
            $data = [
                'title' => 'Edit Rokok',
                'rokok' => $result,
            ];
            $this->view('pages/admin/rokok/edit', $data);
        } catch (\Exception $e) {
            Message::setFlash('error', 'Terjadi kesalahan: ', $e->getMessage());
            $this->redirect('dashboard');
        }
    }

    public function update($id)
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
                    'id_rokok' => $id
                ];

                var_dump($data);

                $result = $this->rokokmodels->updateDataRokok($data);

                if ($result) {
                    echo 'Error';
                    var_dump($data);
                    $this->redirect('dashboard');
                } else {
                    echo 'Error';
                    var_dump($data);
                    $this->redirect('rokok');
                }
            } else {
                echo 'Permintaan tidak valid.';
            }
        } catch (\Exception $e) {
            echo 'Error';
            $this->redirect('dashboard');
        }
    }
}
