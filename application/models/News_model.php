<?php
class News_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }
        
        public function get_news($slug = FALSE)
        {
                if ($slug === FALSE)
                {
                        $query = $this->db->get('su16_news');
                        return $query->result_array();
                }

                $query = $this->db->get_where('su16_news', array('slug' => $slug));
                return $query->row_array();
        }

        public function set_news(){
                // Initialize the URL helper.
                $this->load->helper('url');

                // CI's "post" function parses the POST superglobal and strips spaces from the title.
                // URL title changes text into a URL-friendly format, dash separated and lowercase.
                $slug = url_title($this->input->post('title'),'dash', TRUE);

                // Each array element matches with column titles in the DB.
                $data = array(
                        'title' => $this->input->post('title'),
                        'slug' => $slug,
                        'text' => $this->input->post('text')
                );

                // Insert into database.
                return $this->db->insert('news', $data);
        }
}