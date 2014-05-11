<?php

class ManageProducts_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function userSingleList($userid)
    {
        return $this->db->select('SELECT * FROM users WHERE id = :userid', array('userid' => $userid));
    }
    
    public function create($data)
    {
        $this->db->insert('users', $data);
    }
    
    public function editSave($data)
    {
        if(isset($data['password']))
        {
        $postData = array(
            'username' => $data['login'],
            'password' => Hash::create('sha256', $data['password'], HASH_PASSWORD_KEY),
            'first_name' => $data['first_name'],
            'middle_name' => $data['middle_name'],
            'last_name' => $data['last_name']
        );
        }
        else
        {
            $postData = array(
            'username' => $data['login'],
            'first_name' => $data['first_name'],
            'middle_name' => $data['middle_name'],
            'last_name' => $data['last_name']
            );
        }
        
        $this->db->update('users', $postData, "`id` = {$data['id']}");
    }
    
    public function delete($userid)
    {
        $result = $this->db->select('SELECT role FROM users WHERE userid = :userid', array(':userid' => $userid));

        if ($result[0]['role'] == 'owner')
        return false;
        
        $this->db->delete('users', "userid = '$userid'");
    }
}