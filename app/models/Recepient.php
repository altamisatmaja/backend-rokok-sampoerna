<?php

class Recepient extends Model
{
    public function __construct(){
        parent::__construct();
        $this->setTableName('recepient');
        $this->setColumn([
            'id_recepient',
            'nama_recepient',
            'no_hp_recepient',
            'alamat_recepient',
        ]);
    }

    public function getAllData(){
        return $this->get()->fetchAll();
    }
}