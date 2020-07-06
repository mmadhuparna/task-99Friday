<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model('usermodel');
        $this->load->library('session');
    }

    public function index() {
        if ($this->input->post('finish')) {
            $this->form_validation->set_rules('name', 'Full Name', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            $this->form_validation->set_rules('email', 'Email Address', 'trim|required');
            $this->form_validation->set_rules('phone', 'Phone No.', 'trim|required');
            $this->form_validation->set_rules('gender', 'Gender', 'trim|required');
            $this->form_validation->set_rules('dob', 'Date of Birth', 'trim|required');
            $this->form_validation->set_rules('address', 'Contact Address', 'trim|required');

            $image = '';

            if ($this->form_validation->run() !== FALSE) {
               
					$config['upload_path']          = './uploads';
	                $config['allowed_types']        = 'gif|jpg|png';
	                $config['max_width']            = 1024;
	                $config['max_height']           = 768;
                    $config['file_name'] = strtotime('now').str_replace(" ", "_", $_FILES['image']['name']);
                    echo $config['file_name'];
	                
	                $this->load->library('upload', $config);

	                if ( ! $this->upload->do_upload('image'))
	                {
                            $error = array('error' => $this->upload->display_errors());
                            print_r($error);exit;
	                        	
	                }
	                else
	                {
                            $data = array('upload_data' => $this->upload->data());
                            $image = $config['file_name'];

                    }
                    
                   

				$result = $this->usermodel->insert_user(
                $this->input->post('name'), 
                $this->input->post('surname'),
                $this->input->post('username'),
                $this->input->post('education'), 
                $this->input->post('experience'),
                $this->input->post('hobbies'), 
                $this->input->post('skills'),
                $this->input->post('strength'),
                $this->input->post('weekness'),
                $this->input->post('age'), 
                $this->input->post('whatsapp'),       
				$this->input->post('password'), 
				$this->input->post('email'), 
				$this->input->post('phone'), 
				$this->input->post('gender'), 
				$this->input->post('dob'), 
                $this->input->post('address'),
                $image 
            );
            
                $data['success'] = $result;
                $this->load->view('userview', $data);
            } else {
                $this->load->view('userview');
            }
        } else {
            $user = $this->session->userdata('data');
            $this->load->view('userview',$user);
        }
    }
}
