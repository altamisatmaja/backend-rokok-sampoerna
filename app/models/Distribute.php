<?php

class Distribute extends Model
{
    public function __construct(){
        parent::__construct();
        $this->setTableName('distribute');
        $this->setColumn([
            'id_distribute',
            'distributor_id',
            'recepient_id',
            'rokok_id',
            'kuantitas_pengiriman',
            'jenis_pengiriman_id',
            'tanggal_kirim',
            'tanggal_terima',
            'total_biaya',
        ]);
    }

    public function getAllData(){
        return $this->get()->fetchAll();
    }
}