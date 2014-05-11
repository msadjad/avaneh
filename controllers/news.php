<?php

class News extends Controller {

    function __construct() {
        parent::__construct();
    }
    
    function index() {
        $this->view->title = 'News';
        $this->view->type = 'news';
        $this->view->render('header');
        $this->view->render('news/index');
        $this->view->render('footer');
    }
    
}