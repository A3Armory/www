<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Leaderboard extends CI_Controller {

  public function index() {

    $path_params = $this->uri->ruri_to_assoc();


    $format = "pretty";
    if (array_key_exists("format", $path_params)) {
      $format = $path_params["format"];
    }

    $this->load->model("Leaderboard_model");
    $data = $this->Leaderboard_model->get($this->input->get('server'));
    $data = $data->hits->hits;

    switch ($format) {
      case "json":
        $this->load->view('leaderboard/json', array("data" => $data));
        break;
      case "html":
        $this->load->view('leaderboard/html', array("data" => $data));
        break;
      default:
        $this->load->view('leaderboard/pretty', array("data" => $data));
    }
  }
}


