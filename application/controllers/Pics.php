<?php
class Pics extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('pics_model');
                $this->load->helper('url_helper');
                $this->load->helper('form');
        }

        public function index()
        {
            $this->view();
        }

        public function view($slug = NULL)
        {   
            $data['url'] = $this->pics_model->get_pics_url($slug);
            $data['title'] = "Flickr API";
            $data['pics'] = $this->pics_model->get_pics($data['url']);
            $data['html_pics'] = $this->pics_model->list_pics($data['pics']);
            $this->load->view('pics/view',$data);
        }

        public function custom_submit($slug = NULL){
            $slug = $this->input->post('tag');
            $slug = str_replace(" ","_",$slug);
            $slug = str_replace(",","",$slug);
            $this->view($slug);
        }
}