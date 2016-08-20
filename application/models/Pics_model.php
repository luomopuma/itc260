<?php
class Pics_model extends CI_Model {

        public function __construct()
        {
                $this->api_key = '71ce0149f754d71b91513455d2bc0975';
                $this->tags = FALSE;
                $this->perPage = 28;
        }
        

        public function get_pics_url($slug = FALSE)
        {
                if (! $slug)
                {       
                        // default value if no tags specified
                        $this->tags = 'polar_bears';
                }
                else{
                        $this->tags = $slug;
                }
                return $this->create_url($this->tags);
        }

        // Create the Flickr search URL from specified tags
        public function create_url($slug){
                $url = 'https://api.flickr.com/services/rest/?method=flickr.photos.search';
                $url.= '&api_key=' . $this->api_key;
                $url.= '&tags=' . $this->tags;
                $url.= '&per_page=' . $this->perPage;
                $url.= '&format=json';
                $url.= '&nojsoncallback=1';
                $url .= 'safe_search=1';
                $url .= 'content_type=1';
                return $url;
        }

        // Returns an array of photo objects based on URL-encoded flickr API call
        public function get_pics($url){
                $response = json_decode(FILE_GET_CONTENTS($url));
                if($response->stat == "fail"){
                       echo "ERROR: ".$response->message;
                }
                else{
                        $pics = $response->photos->photo; 
                        return $pics;
                }
        }

        // Echoes medium-sized images in HTML
        public function list_pics($pics){
                $result = '';
                foreach($pics as $pic){
                        $size = 'm';
                        $photo_url = 'http://farm'. $pic->farm . '.staticflickr.com/' . $pic->server . '/' . $pic->id . '_' . $pic->secret . '_' . $size . '.jpg';
                        $title = $pic->title;
                        $title = substr($title,0,10);
                        $result .= "<div id='photo'><h4>$title</h4><img title='" . $pic->title . "' src='" . $photo_url . "' /></div>";
                }
                return $result;
        }

}