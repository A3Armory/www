<?php

class Leaderboard_model extends CI_Model {
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

    $query = <<<EOF
    {
      "from": 0,
      "size": 1000,
      "fields": [
        "PlayerInfo.Name",
        "PlayerScore.playerKills",
        "PlayerScore.aiKills",
        "PlayerScore.deathCount",
        "PlayerScore.reviveCount",
        "PlayerScore.captureCount",
        "updatedAt_"
      ],
      "script_fields": {
        "PlayerScore.kdr": {
          "script": "if (doc['PlayerScore.deathCount'].value == 0) { doc['PlayerScore.playerKills'].value } else { Math.round(100 * (doc['PlayerScore.playerKills'].value / doc['PlayerScore.deathCount'].value))/100}"
        }
      },
      "sort": {
        "PlayerScore.playerKills": {
          "order": "desc"
        }
      },
      "filter": {
        "and": [
          {
            "exists": {
              "field": "PlayerScore.playerKills"
            }
          },
          {
            "exists": {
              "field": "PlayerScore.playerKills"
            }
          },
          {
            "range": {
              "updatedAt_": {
                "gt": "now-1M"
              }
            }
          }
        ]
      }
    }
EOF;

    $page = trim($serverConfig["ES_Players_Index"], "/") . "/_search";

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

    return $data;
  }
}