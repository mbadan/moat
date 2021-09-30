<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{    
    public function __construct()
    {
        parent::__construct();
                
        $this->load->model('m_login');
        $this->load->library('session');
    }
    
    /**
     * Página de login
     * 
     * @Router("/login")
     * 
     * @return object|string
     */
    public function index()
    {

        return $this->load->view('page/login');
    }

    /**
     * 
     * @Router("/login/logar")
     * 
     * @return void
     */
    public function logar()
    {
        $data = [
            "user"  => strtolower(trim($this->input->post('user'))),
            "password" => $this->input->post('password')
        ];

        if (!empty($data['password']) and ($login = $this->m_login->logar($data)))
        {
            
            $session = [
                "id"        => $login[0]->id,
                "user"      => $login[0]->user,
                "name"      => $login[0]->name,
                "role"      => $login[0]->role
            ];

            $this->session->set_userdata($session);
            
            return redirect('/painel');
        }
        
        return redirect('/login?erro=1');
    }
}
