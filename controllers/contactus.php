<?php

class Contactus extends Controller {

    function __construct() {
        parent::__construct();
    }
    
    function index() {
        $this->view->title = 'Contact us';
        $this->view->type = 'contactus';
        $this->view->render('header');
        $this->view->render('contactus/index');
        $this->view->render('footer');
    }
    
}