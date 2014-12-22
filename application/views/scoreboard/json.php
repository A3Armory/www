<?php

$result = array();
foreach ($data as $uid => $pdata) {
  if (!is_object($pdata)) continue;
  $pdata->PlayerInfo->UID = "sha256-" . hash("sha256", $pdata->PlayerInfo->UID, false);
  $result[$pdata->PlayerInfo->Name] = $pdata;
}

echo json_encode($result);
