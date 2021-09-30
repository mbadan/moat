<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller
{    
    function __construct()
    {
        parent::__construct();
    }
 
    /**
     * @Router("/logout')
     * 
     * @return void
     */
    public function index()
    {
        $this->session->sess_destroy();

        return redirect('/login', 'refresh');
    }  
 }
 