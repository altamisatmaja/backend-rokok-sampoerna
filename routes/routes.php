<?php

class Routes
{
    public function run()
    {
        $router = new App();
        $router->setDefaultController('DashboardController');
        $router->setDefaultMethod('index');

        $router->get('/dashboard', ['DashboardController', 'index']);

        $router->get('/rokok', ['RokokController', 'index']);
        $router->get('/rokok/add', ['RokokController', 'create']);
        $router->post('/rokok/store', ['RokokController', 'store']);
        $router->get('/rokok/update/{id}', ['RokokController', 'show']);
        $router->post('/rokok/edit/{id}', ['RokokController', 'update']);
        $router->get('/rokok/destroy/{id}', ['RokokController', 'destroy']);
        $router->run();
    }
}
