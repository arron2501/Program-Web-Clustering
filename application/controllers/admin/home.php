<?php

class Home extends CI_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->model('model_clustering');
  }

  public function index() {
    $data['data_corona'] = $this->db->get('data_corona');
    $this->load->view("admin/home", $data);
  }
}

?>
