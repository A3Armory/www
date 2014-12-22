<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Scoreboard extends CI_Controller {

  public function index() {

    $path_params = $this->uri->ruri_to_assoc();


    $format = "pretty";
    if (array_key_exists("format", $path_params)) {
      $format = $path_params["format"];
    }

    $this->load->model("PlayersList_model");
    $data = $this->PlayersList_model->get($this->input->get('server'));

    switch ($format) {
      case "json":
        $this->load->view('scoreboard/json', array("data" => $data));
        break;
      case "html":
        $this->load->view('scoreboard/html', array("data" => $data));
        break;
      default:
        $this->load->view('scoreboard/pretty', array("data" => $data));
    }
  }
}
