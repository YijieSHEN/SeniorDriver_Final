<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

         public function __construct()
        {
                parent::__construct();
                $this->load->model('Accident_model');
                $this->load->helper('url_helper');
                $this->load->helper('url');
        }

        public function home()
        {
                $page = 'SeniorDriver';
                $data['title'] = ucfirst($page); // Capitalize the first letter
                //$data['accident_list'] = $this->Accident_model->get_accident();
                $this->load->view('templates/header', $data);
                $this->load->view('home_view',$data);
                $this->load->view('templates/footer', $data);        
        }

        public function data_submitted($postcode = null, $period = null) {

                $page = 'SeniorDriver';
                $data['title'] = ucfirst($page); // Capitalize the first letter
                $data['postcode'] = $_REQUEST['postcode'];
                $data['period'] = $_REQUEST['period'];
                $data['details_link'] = "index.php/pages/data_submitted_details/" . $data['postcode'] . "/" . $data['period'];
                $data['map_link'] = "index.php/map/index/" . $data['postcode'];

                $data['result_row'] = 0;

                if (!empty($_REQUEST['period'])) {
                        if ($_REQUEST['period'] == '2015') {
                                $match_string = '%/' . substr('2015',2);
                                $results = $this->Accident_model->get_accident_by_date(str_replace(' ', '', $_REQUEST['postcode']), (string)$match_string);
                                $data['accident_list'] = $results;
                                $data['result_row'] = count($results);

                                $query_one = $this->Accident_model->get_query_one(str_replace(' ', '', $_REQUEST['postcode']), 2015);
                                $data['query_one'] = number_format($query_one->query_one_results,1);

                                $query_one = $this->Accident_model->get_query_two(str_replace(' ', '', $_REQUEST['postcode']), 2015);
                                $data['query_two'] = number_format($query_one->query_two_results,0);

                                $data['query_three'] = $this->Accident_model->get_query_three(str_replace(' ', '', $_REQUEST['postcode']), (string)$match_string);

                                $data['query_four'] = $this->Accident_model->get_query_four(str_replace(' ', '', $_REQUEST['postcode']), (string)$match_string);


                                $data['query_five'] = $this->Accident_model->get_query_five(str_replace(' ', '', $_REQUEST['postcode']), (string)$match_string);

                                $data['query_six'] = $this->Accident_model->get_query_six(str_replace(' ', '', $_REQUEST['postcode']), (string)$match_string);

                        }
                        elseif ($_REQUEST['period'] == '2016') {
                                $match_string = '%/' . substr('2016',2);
                                $results = $this->Accident_model->get_accident_by_date(str_replace(' ', '', $_REQUEST['postcode']), (string)$match_string);
                                $data['accident_list'] = $results;
                                $data['result_row'] = count($results);

                                $query_one = $this->Accident_model->get_query_one(str_replace(' ', '', $_REQUEST['postcode']), 2016);
                                $data['query_one'] = number_format($query_one->query_one_results,1);

                                $query_one = $this->Accident_model->get_query_two(str_replace(' ', '', $_REQUEST['postcode']), 2016);
                                $data['query_two'] = number_format($query_one->query_two_results,0);

                                $data['query_three'] = $this->Accident_model->get_query_three(str_replace(' ', '', $_REQUEST['postcode']), (string)$match_string);

                                $data['query_four'] = $this->Accident_model->get_query_four(str_replace(' ', '', $_REQUEST['postcode']), (string)$match_string);

                                $data['query_five'] = $this->Accident_model->get_query_five(str_replace(' ', '', $_REQUEST['postcode']), (string)$match_string);

                                $data['query_six'] = $this->Accident_model->get_query_six(str_replace(' ', '', $_REQUEST['postcode']), (string)$match_string);
                        }
                        elseif ($_REQUEST['period'] == '2017') {
                                $match_string = '%/' . substr('2017',2);
                                $results = $this->Accident_model->get_accident_by_date(str_replace(' ', '', $_REQUEST['postcode']), (string)$match_string);
                                $data['accident_list'] = $results;
                                $data['result_row'] = count($results);

                                $query_one = $this->Accident_model->get_query_one(str_replace(' ', '', $_REQUEST['postcode']), 2017);
                                $data['query_one'] = number_format($query_one->query_one_results,1);

                                $query_one = $this->Accident_model->get_query_two(str_replace(' ', '', $_REQUEST['postcode']), 2017);
                                $data['query_two'] = number_format($query_one->query_two_results,0);

                                $data['query_three'] = $this->Accident_model->get_query_three(str_replace(' ', '', $_REQUEST['postcode']), (string)$match_string);

                                $data['query_four'] = $this->Accident_model->get_query_four(str_replace(' ', '', $_REQUEST['postcode']), (string)$match_string);

                                $data['query_five'] = $this->Accident_model->get_query_five(str_replace(' ', '', $_REQUEST['postcode']), (string)$match_string);

                                $data['query_six'] = $this->Accident_model->get_query_six(str_replace(' ', '', $_REQUEST['postcode']), (string)$match_string);

                        }elseif ($_REQUEST['period'] == 'all') {
                                $data['accident_list'] = $this->Accident_model->get_accident_by_postcode(str_replace(' ', '', $_REQUEST['postcode']));
                                $data['result_row'] = count($this->Accident_model->get_accident_by_postcode(str_replace(' ', '', $_REQUEST['postcode'])));

                                $match_string = '%/' . substr('2014',2);

                                $query_one = $this->Accident_model->get_query_one(str_replace(' ', '', $_REQUEST['postcode']), 2014);
                                $data['query_one'] = number_format($query_one->query_one_results,1);

                                $query_one = $this->Accident_model->get_query_two(str_replace(' ', '', $_REQUEST['postcode']), 2014);
                                $data['query_two'] = number_format($query_one->query_two_results,0);

                                $data['query_three'] = $this->Accident_model->get_query_three_all(str_replace(' ', '', $_REQUEST['postcode']));

                                $data['query_four'] = $this->Accident_model->get_query_four_all(str_replace(' ', '', $_REQUEST['postcode']));

                                $data['query_five'] = $this->Accident_model->get_query_five_all(str_replace(' ', '', $_REQUEST['postcode']));

                                $data['query_six'] = $this->Accident_model->get_query_six_all(str_replace(' ', '', $_REQUEST['postcode']));
                                $data['period'] = 'All (From 2006)';

                        }
                        else{
                               $match_string = '%/' . substr('2016',2);
                                $results = $this->Accident_model->get_accident_by_date(str_replace(' ', '', $_REQUEST['postcode']), (string)$match_string);
                                $data['accident_list'] = $results;
                                $data['result_row'] = count($results); 
                        }
                }



                if($data['result_row'] == 0){
                        // Show submitted data on view page again.
                        $this->load->view('templates/header', $data);
                        $this->load->view('no_results_page',$data);
                        $this->load->view('templates/footer', $data); 
                }
                else{
                        // Show submitted data on view page again.
                        $this->load->view('templates/header', $data);
                        $this->load->view('postcode_result_view',$data);
                        $this->load->view('templates/footer', $data); 
                }
        }

        public function data_submitted_details($postcode = null, $period = null) {
                $page = 'SeniorDriver';
                $data['title'] = ucfirst($page); 
                $data['postcode'] = $postcode;
                $data['period'] = $period;

                if ($period == '2015') {
                        $match_string = '%/' . substr('2015',2);
                        $results = $this->Accident_model->get_accident_by_date(str_replace(' ', '', $postcode), (string)$match_string);
                        $data['accident_list'] = $results;
                        $data['result_row'] = count($results);
                }
                elseif ($period == '2016') {
                        $match_string = '%/' . substr('2016',2);
                        $results = $this->Accident_model->get_accident_by_date(str_replace(' ', '', $postcode), (string)$match_string);
                        $data['accident_list'] = $results;
                        $data['result_row'] = count($results);
                }
                elseif ($period == '2017') {
                        $match_string = '%/' . substr('2017',2);
                        $results = $this->Accident_model->get_accident_by_date(str_replace(' ', '', $postcode), (string)$match_string);
                        $data['accident_list'] = $results;
                        $data['result_row'] = count($results);
                }
                else{
                        $data['accident_list'] = $this->Accident_model->get_accident_by_postcode(str_replace(' ', '', $postcode));
                        $data['result_row'] = count($this->Accident_model->get_accident_by_postcode(str_replace(' ', '', $postcode)));
                        $data['period'] = 'All (From 2006)';
                }
                
                $this->load->view('templates/header', $data);
                $this->load->view('details',$data);
                $this->load->view('templates/footer', $data); 
        }

        public function postcode()
        {
                $page = 'SeniorDriver';
                $data['title'] = ucfirst($page); // Capitalize the first letter
                $this->load->view('postcodeAutoComplete_view', $data);
        }

         public function auspost()
        {
                $page = 'SeniorDriver';
                $data['title'] = ucfirst($page); // Capitalize the first letter
                $this->load->view('auspost', $data);
        }

    

}

