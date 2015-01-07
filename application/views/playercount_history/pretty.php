<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>A3Armory Player Count History</title>

  <link href="http://visjs.org/dist/vis.css" rel="stylesheet" type="text/css" />
  <script src="http://visjs.org/dist/vis.js"></script>


</head>
<body>

<body>

<div id="visualization"></div>

<script type="text/javascript">

  var container = document.getElementById('visualization');

  var items = [
    <?
      $total = count($data);
      $i = 0;
      foreach ($data as $index => $row) {
        if (!is_object($row)) continue;
    ?>
    {x: <? echo $row->key ?>, y: <? echo $row->pcs->max ?>} <? if (++$i !== $total) { echo ",";} else {$last = $row->key;} ?>
    <? } ?>
  ];



  var dataset = new vis.DataSet(items);



  var options = {
    legend: {left:{position:"bottom-left"}},
    width: "600px",
    start: <? echo ($last - (24 * 60 * 60 * 1000)) ?>,
    end: <? echo $last ?>,
    defaultGroup: "Player count",
    width: "400px",
    height: "250px",
    shaded: true,
    drawPoints: false
  };
  var graph2d = new vis.Graph2d(container, dataset, options);

</script>
</body>
</html>
