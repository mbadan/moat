<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_functions extends CI_Model
{      
    function __construct()
    {
        parent::__construct();
    }

    public function getAlbuns() {
        return $this->db->get('album')->result();
    }		
}
