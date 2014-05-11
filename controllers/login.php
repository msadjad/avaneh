<?php

class Login extends Controller {

    function __construct() {
        parent::__construct();    
    }
    
    function index() 
    {    
        $this->view->title = 'راهنمای سفر';
        
        $this->view->render('login/header');
        $this->view->render('login/index');
        $this->view->render('footer');
    }
    
    function run()
    {
        $this->model->run();
    }
    
    public function edit($id) 
    {
        $this->view->title = 'ساخت کاربر جدید';
        $this->view->user = $this->model->userSingleList($id);
        
        $this->view->render('header');
        $this->view->render('user/edit');
        $this->view->render('footer');
    }
    
    public function logout()
    {
        Session::destroy();
        
        header('location: '.URL.'login/');
    }
}