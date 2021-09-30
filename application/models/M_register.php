<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_register extends CI_Model
{    
    function __construct()
    {
        parent::__construct();
    }

    public function cadastrar($data)
    {
        if (!$this->checkUser($data['user']))
        {
            $data['password'] = $this->hashPassword($data['password']);
            
            $this->db->set('user', $data['user']);
            $this->db->set('name', $data['name']);
            $this->db->set('role', $data['role']);
            $this->db->set('password', $data['password']);
            $this->db->insert('user');

            return true;
        }

        return false;
    }    

   
    private function hashPassword(string $password): string
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    private function checkUser(string $login): bool
    {
        $this->db->select('user');
        $this->db->where('user', $login);

        $checkExiste = $this->db->get('user')->result();

        return ($checkExiste) ? true : false;
    }
}
