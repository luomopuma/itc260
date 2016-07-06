<?php

class Profile extends CI_Controller {
    
    public function view($page = 'profile')
    {
        if (! file_exists(APPPATH.'views/pages/'.$page.'.php')){
            show_404();    
        }
        $data['title'] = ucfirst($page); //Capitalize first letter
        $this->load->view('templates/header',$data);
        $this->load->view('pages/'.$page,$data);
        $this->load->view('templates/footer',$data);
        
    }
    
}