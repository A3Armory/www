<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>A3Armory Count Dashboard </title>

  <link href="http://visjs.org/dist/vis.css" rel="stylesheet" type="text/css" />
  <script src="http://visjs.org/dist/vis.js"></script>

<style type="text/css" >

  div.chart {
    float: left;
    margin: 10px;
  }

</style>
</head>
<body>


<div class="chart" id="vehicles"></div>
<div class="chart" id="objects"></div>
<div class="chart" id="players"></div>



<script type="text/javascript">
  var loadContainer = function(id, title, data, end) {
    var container = document.getElementById(id);
    var dataset = new vis.DataSet(data);
    var options = {
      legend: {left:{position:"bottom-left"}},
      width: "600px",
      start: (end - (24 * 60 * 60 * 1000)),
      end: end,
      defaultGroup: title,
      width: "400px",
      height: "250px",
      shaded: true,
      drawPoints: false
    };
    var graph2d = new vis.Graph2d(container, dataset, options);
  };

  var vitems = [
    <?
      $total = count($data["vdata"]);
      $i = 0;
      foreach ($data["vdata"] as $index => $row) {
        if (!is_object($row)) continue;
    ?>
    {x: <? echo $row->key ?>, y: <? echo $row->pcs->max ?>} <? if (++$i !== $total) { echo ",";} else {$last = $row->key;} ?>
    <? } ?>
  ];

  var vlast = <? echo $last ?>;

  var oitems = [
    <?
      $total = count($data["odata"]);
      $i = 0;
      foreach ($data["odata"] as $index => $row) {
        if (!is_object($row)) continue;
    ?>
    {x: <? echo $row->key ?>, y: <? echo $row->pcs->max ?>} <? if (++$i !== $total) { echo ",";} else {$last = $row->key;} ?>
    <? } ?>
  ];

  var olast = <? echo $last ?>;

  var pitems = [
    <?
      $total = count($data["pdata"]);
      $i = 0;
      foreach ($data["pdata"] as $index => $row) {
        if (!is_object($row)) continue;
    ?>
    {x: <? echo $row->key ?>, y: <? echo $row->pcs->max ?>} <? if (++$i !== $total) { echo ",";} else {$last = $row->key;} ?>
    <? } ?>
  ];

  var plast = <? echo $last ?>;

  loadContainer("vehicles", "Vehicle count", vitems, vlast);
  loadContainer("objects", "Object count", oitems, olast);
  loadContainer("players", "Player count", pitems, plast);

</script>
</body>
</html>
