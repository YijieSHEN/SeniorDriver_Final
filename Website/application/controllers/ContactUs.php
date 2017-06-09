<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ContactUs extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
        $this->load->helper('url');
    }

	public function index($postcode = null)
	{
		//$this->load->view('welcome_message');
		$page = 'SeniorDriver';
        $data['title'] = ucfirst($page);

		
		$this->load->view('templates/header', $data);
        $this->load->view('contact_us_view',$data);
        $this->load->view('templates/footer', $data); 

        
	}
}