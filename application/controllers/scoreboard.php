<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Scoreboard extends CI_Controller {

  public function index() {
    $this->load->model("PlayersList_model");
    $data = $this->PlayersList_model->get($this->input->get('server'));

    $this->load->view('scoreboard', array("data" => $data));
  }
}
