<?php 

class DashboardController extends Controller{
    public function index(){
        $data = [
            'title' => 'Rokok',
        ];

        $this->view('pages/admin/dashboard', $data);
    }
}