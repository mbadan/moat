<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('m_register');

    }


    public function index()
    {

        return $this->load->view('page/register');
    }

    public function cadastrar()
    {
        $cadastro = $this->m_register->cadastrar([
            "name"          => $this->input->post('name'),
            "role"          => $this->input->post('role'),
            "user"      => trim($this->input->post('user')),
            "password"      => $this->input->post('password')
        ]);

        if ($cadastro) 
        {   
            return redirect('/register/complete');
        } 

        return redirect('/register?erro=1');
    }

        public function complete()
    {

        return $this->load->view('page/complete');
    }
}
