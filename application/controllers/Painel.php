<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Painel extends CI_Controller
{    
    public function __construct()
    {
        parent::__construct();
                

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

        return $this->load->view('page/painel', $data);
    }
}
