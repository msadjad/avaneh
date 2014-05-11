<?php

class ManageProducts extends Controller {

    function __construct() {
        parent::__construct();
        Auth::handleLogin();
    }
    
    function index() {
        //echo Hash::create('sha256', 'sadjad', HASH_PASSWORD_KEY);
        //echo Hash::create('sha256', 'test2', HASH_PASSWORD_KEY);
        $this->view->title = 'راهنمای سفر';
        $this->view->selected = 1;
        $this->view->render('header');
        $this->view->render('index/index');
        $this->view->render('footer');
    }
    
}