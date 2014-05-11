<?php

class Login_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function run()
    {
        $sth = $this->db->prepare("SELECT id,username,first_name,middle_name,last_name FROM users WHERE 
                username = :login AND password = :password");
        $sth->execute(array(
            ':login' => $_POST['login'],
            ':password' => Hash::create('sha256', $_POST['password'], HASH_PASSWORD_KEY)
        ));
        
        $data = $sth->fetch();
        
        $count =  $sth->rowCount();
        if ($count > 0) {
            // login
            Session::init();
            Session::set('loggedIn', true);
            Session::set('userid', $data['id']);
            Session::set('username', $data['username']);
            Session::set('fname', $data['first_name']);
            Session::set('mname', $data['middle_name']);
            Session::set('lname', $data['last_name']);
            header('location: '.URL.'main');
        } else {
            header('location: '.URL.'login');
        }
        
    }
    
}