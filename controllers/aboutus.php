<?php

class Aboutus extends Controller {

    function __construct() {
        parent::__construct();
    }
    
    function index() {
        $this->view->title = 'About us';
        $this->view->type = 'aboutus';
        $this->view->render('header');
        $this->view->render('aboutus/index');
        $this->view->render('footer');
    }
}