<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tracking extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
        $this->load->helper('url');
    }

	public function index()
	{
		//$this->load->view('welcome_message');
		$page = 'SeniorDriver';
        $data['title'] = ucfirst($page);

		
		$this->load->view('templates/header', $data);
        $this->load->view('tracking_result_view',$data);
        $this->load->view('templates/footer', $data); 

	}

	 public function map($use_id = null, $map_id = null) {

 		$data['use_id'] = 'uid: ' . $use_id;
 		$data['map_id'] = 'mapId: ' . $map_id;

 		$this->load->view('templates/header', $data);
        $this->load->view('tracking_result_view',$data);
        $this->load->view('templates/footer', $data); 

	 }

	 public function intro() {

 		$page = 'SeniorDriver';
        $data['title'] = ucfirst($page);

 		$this->load->view('templates/header', $data);
        $this->load->view('tracking_intro_view',$data);
        $this->load->view('templates/footer', $data); 

	 }
}