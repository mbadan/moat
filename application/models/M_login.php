<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_login extends CI_Model
{      
    function __construct()
    {
        parent::__construct();
    }

    public function logar($data)
    {
        $this->db->select('password');
        $this->db->where('user',  $data['user']);

        $user  = $this->db->get('user')->result();

        if ($user)
        {
            $senhaDB     = $user[0]->password;
            
            if ($this->checkPassword($data['password'], $senhaDB))
            {
                $this->db->select('id');
                $this->db->select('user');
                $this->db->select('name');
                $this->db->select('role');
    
                $this->db->where('user',  $data['user']);
    
                return $this->db->get('user')->result();
            }
        }
 
        return false;
    } 
   
    private function checkPassword(string $password, string $hash): bool
    {
        if (password_verify($password, $hash))
        {
            return true;
        }

        return false;
    }		
}
