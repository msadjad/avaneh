<?php

class products extends Controller {

    function __construct() {
        parent::__construct();
    }
    
    function index() {
        //echo Hash::create('sha256', 'sadjad', HASH_PASSWORD_KEY);
        //echo Hash::create('sha256', 'test2', HASH_PASSWORD_KEY);
        $this->view->title = 'Products';
        $this->view->type = 'products';
        $this->view->render('header');
        $this->view->render('products/index');
        $this->view->render('footer');
    }
    
}

?>
