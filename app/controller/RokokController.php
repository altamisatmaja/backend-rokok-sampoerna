<?php

class RokokController extends Controller{
    private $rokokmodels;

    public function __construct(){
        $this->rokokmodels = $this->model('Rokok');
    }

    public function index(){
        $data = [
            'title' => 'Rokok',
            'rokok' => $this->rokokmodels->getAll(),
        ];

        $this->view('pages/admin/rokok/list', $data);
    }
}