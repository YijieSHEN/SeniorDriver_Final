<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Safety extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('Safety_model');
        $this->load->helper('url_helper');
        $this->load->helper('url');
    }

	public function index()
	{
		//$this->load->view('welcome_message');
		$page = 'SeniorDriver';
        $data['title'] = ucfirst($page);

		$make_lists = $this->Safety_model->get_make();
        $make_lists_result=array();

        foreach ($make_lists as $value){
            $make_lists_result[$value->Make] = $value->Make;

        }
        //$make_lists_result['Make'] = 'Make';
        //print_r($make_lists_result);
        $data['make_lists'] = $make_lists_result;



		$this->load->view('templates/header', $data);
        $this->load->view('safety_view',$data);
        $this->load->view('templates/footer', $data); 

        
	}


    public function buildDropModels($select_make = null)  
   {  
        $model_lists = $this->Safety_model->get_model_by_make($select_make);
        $model_lists_result=array();
        $output = "";

        foreach ($model_lists as $value){
            $model_lists_result[] = $value->Model;
            $output .= "<option value='".$value->Model."'>".$value->Model."</option>";  
        }
        echo $output;

   }  


    public function data_submitted_safety($make = null, $model = null, $year = null) {
        //$this->load->view('welcome_message');
        $page = 'SeniorDriver';
        $data['title'] = ucfirst($page);

        $make_lists = $this->Safety_model->get_make();
        $make_lists_result=array();

        foreach ($make_lists as $value){
            $make_lists_result[$value->Make] = $value->Make;
        }
        $data['make_lists'] = $make_lists_result;

        $data['make'] = $this->input->post('make_lists');
        $data['model'] = $this->input->post('model_list');
        $data['year'] = $this->input->post('year_list');

        if(isset($data['make']) && isset($data['model']) && isset($data['year'])){
            $data['band_result'] = $this->Safety_model->get_band($data['make'],$data['model'],$data['year']);
            $data['get_crash_make_result'] = number_format($this->Safety_model->get_crash_make($data['make'])->get_crash_make_result,1);
            $data['get_reg_make_result'] = number_format($this->Safety_model->get_reg_make($data['make'])->get_reg_make_result,1);

            if(count($data['band_result']) != 0){
                $this->load->view('templates/header', $data);
                $this->load->view('safety_view',$data);
                $this->load->view('templates/footer', $data);
            }
            else{
                $this->load->view('templates/header', $data);
                $this->load->view('no_results_page',$data);
                $this->load->view('templates/footer', $data); 
            }
        }
        else{
            $this->load->view('templates/header', $data);
            $this->load->view('no_results_page',$data);
            $this->load->view('templates/footer', $data); 
        }


       

       

    }
}
