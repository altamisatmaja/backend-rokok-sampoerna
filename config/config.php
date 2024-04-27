<?php

(new Dotenv(__DIR__.'/../.env'))->load();

define('BASE_URL', getenv('BASE_URL'));
