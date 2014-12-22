<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class PlayersList_model extends CI_Model {
  function __construct() {
    parent::__construct();
  }

  function get($serverId = NULL) {

    $a3servers = $this->config->item("a3w_servers");

    if (!isset($a3servers)) {
      return new stdClass(); //FIXME: need to redirect to 500
    }

    $serverConfig = NULL;
    if (!is_string($serverId)) {
      $serverConfig = reset($a3servers);
    }
    else if(array_key_exists($serverId,$a3servers)){
      $serverConfig = $a3servers[$serverId];
    }

    if (!isset($serverConfig)) {
      return new stdClass(); //FIXME: need to redirect to 500
    }

    $page = trim($serverConfig["CouchDB_URL"], "/") . "/" . $serverConfig["PlayersListFileID"] .'PlayersList';

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $page);
    curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
    $json= curl_exec($ch);
    curl_close ($ch);

    if (!is_string($json)) {
      return new stdClass();
    }

    $data = json_decode($json);

    if (!is_object($data)) {
      return new stdClass();
    }

    return $data;
  }
}