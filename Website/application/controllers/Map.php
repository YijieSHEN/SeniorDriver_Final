<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Map extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('Map_model');
        $this->load->helper('url_helper');
        $this->load->helper('url');
    }

	public function index($postcode = null)
	{
		//$this->load->view('welcome_message');
		$page = 'SeniorDriver';
        $data['title'] = ucfirst($page);

		$results = $this->Map_model->get_all_location($postcode);
        $data['locations'] = $results;
		$this->load->view('templates/header', $data);
        $this->load->view('map_result',$data);
        $this->load->view('templates/footer', $data);  
	}

    public function map_post($postcode = null)
    {
        //$this->load->view('welcome_message');
        $page = 'SeniorDriver';
        $data['title'] = ucfirst($page);
        $postcode = $_REQUEST['postcode'];
        $results = $this->Map_model->get_all_location($postcode);
        $data['locations'] = $results;
        $this->load->view('templates/header', $data);
        $this->load->view('map_result',$data);
        $this->load->view('templates/footer', $data);  
    }

    public function input($postcode = null)
    {
        //$this->load->view('welcome_message');
        $page = 'SeniorDriver';
        $data['title'] = ucfirst($page);

        //$results = $this->Map_model->get_all_location($postcode);
        //$data['locations'] = $results;
        $this->load->view('templates/header', $data);
        $this->load->view('heatmap_input_view',$data);
        $this->load->view('templates/footer', $data); 
    }
}
