<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class ObjectCount_History extends CI_Controller {

  public function index() {

    $path_params = $this->uri->ruri_to_assoc();


    $format = "pretty";
    if (array_key_exists("format", $path_params)) {
      $format = $path_params["format"];
    }

    $this->load->model("ObjectCount_History_model");
    $data = $this->ObjectCount_History_model->get($this->input->get('server'));

    switch ($format) {
      case "json":
        $this->load->view('objectcount_history/json', array("data" => $data));
        break;
      case "html":
        $this->load->view('objectcount_history/html', array("data" => $data));
        break;
      default:
        $this->load->view('objectcount_history/pretty', array("data" => $data));
    }
  }
}


