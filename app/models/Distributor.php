<?php

class Distributor extends Model
{
    public function __construct(){
        parent::__construct();
        $this->setTableName('distributor');
        $this->setColumn([
            'id_distributor',
            'nama_distributor',
            'alamat_distributor',
            'no_hp_distributor',
            'nik_distributor',
            'foto_ktp',
        ]);
    }

    public function getAllData(){
        return $this->get()->fetchAll();
    }
}