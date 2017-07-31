<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class richtext extends CI_Controller {
 
        public function __construct() {
            parent::__construct();
            $this->load->model('post/richtext1');
 
        }
        public function index()
    {
        $this->load->view('/guest/richtext');
    }
         
         
        public function addArticle(){
            echo "llego";
         $title =  $_POST['title'];
         $article = htmlentities( $_POST['article']);  
         $this->articleModel->addArticle($title, $article);
          
        }
         
        public function loadArticle(){
           $this->articleModel->loadArticle(); 
        }
}
 
/* End of file welcome.php */
/* Location: ./application/controllers/Home.php */