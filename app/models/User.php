<?php

class User extends Model {
    public function __construct(){
        parent::__construct();
        $this->setTableName('user');
        $this->setColumn([
            'id_user',
            'username',
            'email',
            'password',
            'created_at'
        ]);
    }

    public function getAllData(){
        return $this->get()->fetchAll();
    }
}

