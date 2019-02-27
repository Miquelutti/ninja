<?php
class Teste extends CI_Controller{

    function __construct(){
      parent::__construct();
      $this->load->database();  // construct the Model class
    }
    
   public function carregar(){
       $this->load->view('index');
   }

   public function inserir(){
       $value = $this->input->post('valor');
       $this->load->view('inserir', $value);
   }
  
}