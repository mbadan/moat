<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Painel extends CI_Controller
{    
    public function __construct()
    {
        parent::__construct();

        if (empty($this->session->userdata('id'))) {
            redirect('/login', 'refresh');
        }

        $this->load->model('m_functions');
        $this->load->library('session');
    }
    
    public function index()
    {   
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://moat.ai/api/task/',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'GET',
          CURLOPT_HTTPHEADER => array(
            'Basic: ZGV2ZWxvcGVyOlpHVjJaV3h2Y0dWeQ=='
          ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $data['artists'] = json_decode($response);

        $data['albuns'] = $this->m_functions->getAlbuns();

        return $this->load->view('page/painel', $data);
    }

    public function deletealbum(): bool
    {
        $id       = $this->input->post('id');
        $excluido = $this->m_functions->delete($id);
        
        return ($excluido) ? true : false;
    }

    public function addAlbum()
    {
        $data = [
            "name"      => $this->input->post('name'),
            "artist" => $this->input->post('artist'),
            "user"      => $this->session->userdata('id'),
            "year"   => $this->input->post('year'),
            "comment"   => $this->input->post('comment')
        ];

        $new_album = $this->m_functions->addAlbum($data);

        return ($new_album) ? true : false;
    }

    public function view(int $id)
    {   
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://moat.ai/api/task/',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'GET',
          CURLOPT_HTTPHEADER => array(
            'Basic: ZGV2ZWxvcGVyOlpHVjJaV3h2Y0dWeQ=='
          ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $data['artists'] = json_decode($response);
        $data['album'] = $this->m_functions->getAlbum($id);

        return $this->load->view('page/view' , $data);
    }

    public function editAlbum()
    {
        $data = [
            "id"        => $this->input->post('id'),
            "name"      => $this->input->post('name'),
            "artist"    => $this->input->post('artist'),
            "user"      => $this->session->userdata('id'),
            "year"      => $this->input->post('year'),
            "comment"   => $this->input->post('comment')
        ];

        $edit_album = $this->m_functions->editAlbum($data);

        return ($edit_album) ? true : false;
    }
}
