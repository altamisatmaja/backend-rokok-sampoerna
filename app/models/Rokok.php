<?php

class Rokok extends Model {
    public function __construct(){
        parent::__construct();
        $this->setTableName('rokok');
        $this->setColumn([
            'id_rokok',
            'nama_rokok',
            'harga_pack',
            'type',
        ]);
    }

    public function getAll(){
        return $this->get()->fetchAll();   
    }

    /**
     * Create data rokok
     */
    public function store($data){
        $table = [
            'nama_rokok' => $data['nama_rokok'],
            'harga_pack' => $data['harga_pack'],
            'type' => $data['type'],
        ];

        return $this->insertData($table);
    }

    /**
     * Show by id data rokok
     */
    public function getbyid($id){
        return $this->get(['id_rokok' => 'id'])->fetch();
    }

    /**
     * Update data rokok
     */
    public function update($data){
        $table = [
            'nama_rokok' => $data['nama_rokok'],
            'harga_pack' => $data['harga_pack'],
            'type' => $data['type'],
        ];
        $key = [
            'id_rokok' => $data['id'],
        ];

        return $this->updateData($table, $key);
    }

    /**
     * Delete data rokok
     */
    public function destroy($id){
        return $this->deleteData(['id_rokok' => $id]);
    }
}