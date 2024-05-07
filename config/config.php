<?php

require_once '../routes/dotenv.php';
var_dump('/../.env');
if(file_exists('../.env')){
    echo 'fole ada';
} else{
    echo 'tidak ada';
}
(new Dotenv(__DIR__.'/../.env'))->load();

define('BASE_URL', getenv('BASE_URL'));
