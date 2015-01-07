<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Analytics extends CI_Controller {

  public function index() {

    $this->load->model("ObjectCount_History_model");
    $odata = $this->ObjectCount_History_model->get($this->input->get('server'));

    $this->load->model("VehicleCount_History_model");
    $vdata = $this->VehicleCount_History_model->get($this->input->get('server'));

    $this->load->model("PlayerCount_History_model");
    $pdata = $this->PlayerCount_History_model->get($this->input->get('server'));

    $data = array(
      "odata" => $odata,
      "vdata" => $vdata,
      "pdata" => $pdata
    );

    $this->load->view('misc/count_dashboard', array("data" => $data));

  }
}


