<?php

class ShipMethod extends Model
{
    public function __construct(){
        parent::__construct();
        $this->setTableName('jenis_pengiriman');
        $this->setColumn([
            'id_jenis_pengiriman',
            'nama_jenis_pengiriman',
        ]);
    }

    public function getAllData(){
        return $this->get()->fetchAll();
    }
}