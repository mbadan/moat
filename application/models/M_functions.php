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

    public function delete($id) {
        $this->db->where('id',  $id);
        $this->db->delete('album');
        return true;

    }

    public function addAlbum($data)
    {
        $this->db->insert('album', $data);
        return true;
    }

    public function getAlbum($id) {
        $this->db->where('id', $id);
        return $this->db->get('album')->result();
    }    

    public function editAlbum($data) {
        $this->db->where('id', $data['id']);
        $this->db->set('name',  $data['name']);
        $this->db->set('artist',  $data['artist']);
        $this->db->set('year',  $data['year']);
        $this->db->set('comment',  $data['comment']);
        $this->db->update('album');
        return true;
    }  		
}
