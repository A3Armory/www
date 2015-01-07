<?php


/*
 *
 *
 */

class PlayerCount_History_model extends CI_Model {
  function __construct() {
    parent::__construct();
  }

  function get($serverId = NULL) {

    $a3servers = $this->config->item("a3w_servers");

    if (!isset($a3servers)) {
      return new stdClass();
    }

    $serverConfig = NULL;
    if (!is_string($serverId)) {
      $serverConfig = reset($a3servers);
    }
    else if(array_key_exists($serverId,$a3servers)){
      $serverConfig = $a3servers[$serverId];
    }

    if (!isset($serverConfig)) {
      return new stdClass();
    }

    $playersList = $serverConfig["PlayersList_ID"];
    if (!isset($playersList)) {
      return new stdClass();
    }

    $query = <<<EOF
    {
      "query": {
        "bool": {
          "must": [
            {
              "match": {
                "_id_old": "$playersList"
              }
            },
            {
              "range": {
                "updatedAt_": {
                  "gt": "now-7d"
                }
              }
            }
          ]
        }
      },
      "aggs": {
        "pc": {
          "date_histogram": {
            "field": "updatedAt_",
            "interval": "30m"
          },
          "aggs": {
            "pcs": {
              "extended_stats": {
                "script": "_source.players.size()"
              }
            }
          }
        }
      }
    }
EOF;

    $page = trim($serverConfig["ES_PlayersList_History_Index"], "/") . "/_search?search_type=count";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $page);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $query);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json'));


    $json= curl_exec($ch);
    curl_close ($ch);

    if (!is_string($json)) {
      return new stdClass();
    }

    $data = json_decode($json);

    if (!is_object($data)) {
      return new stdClass();
    }

    return $data->aggregations->pc->buckets;
  }
}