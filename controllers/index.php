<?php

class Index extends Controller {

    function __construct() {
        parent::__construct();
    }
    
    function index() {
        $this->view->type = "home";
        $this->view->render('index/index');
        $this->view->render('footer');
    }
    
}