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

                $extension = pathinfo($_FILES['gambar_rokok']['name'], PATHINFO_EXTENSION);
                $namaFile = uniqid() . '.' . $extension;
                $tmpName = $_FILES['gambar_rokok']['tmp_name'];
                $location = $_SERVER['DOCUMENT_ROOT'] . '/backend-rokok-sampoerna/public/uploads';
                $located = $location . '/' . $namaFile;
                $uploaded = move_uploaded_file($tmpName, $located);
                
                if ($uploaded) {
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

                /**
                 * Get data from user uploads
                 */
                $gambarRokok = $_FILES['gambar_rokok'];
                /**
                 * Get data from database if user doesnt edited image
                 */
                $result = $this->rokokmodels->getbyid($id);

                if (!empty($gambarRokok['name'])) {
                    $oldfiles = $result['gambar_rokok'];
                    $location = $_SERVER['DOCUMENT_ROOT'] . '/backend-rokok-sampoerna/public/uploads';
                    $located = $location . '/' . $oldfiles;
                    if(file_exists($located)){
                        $deleted = unlink($located);
                        if($deleted){
                            $extension = pathinfo($_FILES['gambar_rokok']['name'], PATHINFO_EXTENSION);
                            $namaFile = uniqid() . '.' . $extension;
                            $tmpName = $_FILES['gambar_rokok']['tmp_name'];
                            $location = $_SERVER['DOCUMENT_ROOT'] . '/backend-rokok-sampoerna/public/uploads';
                            $located = $location . '/' . $namaFile;
                            $uploaded = move_uploaded_file($tmpName, $located);
                            if($uploaded){
                                $data = [
                                    'nama_rokok' => $namaRokok,
                                    'harga_pack' => $hargaPack,
                                    'type' => $type,
                                    'id_rokok' => $id,
                                    'gambar_rokok' => $namaFile,
                                ];
    
                                $result = $this->rokokmodels->updateDataRokok($data);
    
                                if ($result) {
                                    Message::setFlash('success', 'Data berhasil ditambahkan');
                                    $this->redirect('dashboard');
                                } else {
                                    Message::setFlash('success', 'Data gagal ditambahkan');
                                    $this->redirect('rokok');
                                }
                            } 
                        }  
                    } 
                } else {
                    $gambarRokokOld = $result['gambar_rokok'];
                    $data = [
                        'nama_rokok' => $namaRokok,
                        'harga_pack' => $hargaPack,
                        'type' => $type,
                        'id_rokok' => $id,
                        'gambar_rokok' => $gambarRokokOld,
                    ];

                    $result = $this->rokokmodels->updateDataRokok($data);

                    if ($result) {
                        Message::setFlash('success', 'Data berhasil ditambahkan');
                        $this->redirect('dashboard');
                    } else {
                        Message::setFlash('success', 'Data gagal ditambahkan');
                        $this->redirect('rokok');
                    }
                }
            } else {
                echo 'Permintaan tidak valid.';
            }
        } catch (\Exception $e) {
            echo 'Error';
            $this->redirect('dashboard');
        }
    }

    public function destroy(){
        try {
            $url = $_SERVER['REQUEST_URI'];
            $result = explode('/', $url);

            $id = end($result);
            $data = $this->rokokmodels->getbyid($id);
            var_dump($data['gambar_rokok']);
            $location = $_SERVER['DOCUMENT_ROOT'] . '/backend-rokok-sampoerna/public/uploads';
            $located = $location . '/' . $data['gambar_rokok'];
            if (file_exists($located)){                
                var_dump($located);
                if (unlink($located)){
                    $result = $this->rokokmodels->destroy($id);
                    if ($result) {
                        Message::setFlash('success', 'Data berhasil ditambahkan');
                        $this->redirect('dashboard');
                    } else {
                        Message::setFlash('success', 'Data gagal ditambahkan');
                        $this->redirect('rokok');
                    }
                }
                else {
                    echo 'data tidak terhapus';
                }
            } else {
                echo 'data tidak ada';
            }
        } catch (\Exception $e) {
            echo 'Error';
            $this->redirect('dashboard');
        }
    }
}
