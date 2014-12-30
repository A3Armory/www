<?php

$result = array();
$i = 1;
foreach ($data as $uid => $pdata) {
  unset($pdata->_id);
  unset($pdata->_index);
  unset($pdata->_type);
  unset($pdata->_score);
  unset($pdata->sort);
  $pdata->rank = $i++;
}
echo json_encode($data);

