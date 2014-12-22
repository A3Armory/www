<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>A3Armory Scoreboard</title>

	<style type="text/css">

    table a:link {
      color: #666;
      font-weight: bold;
      text-decoration:none;
    }
    table a:visited {
      color: #999999;
      font-weight:bold;
      text-decoration:none;
    }
    table a:active,
    table a:hover {
      color: #bd5a35;
      text-decoration:underline;
    }
    table {
      font-family:Arial, Helvetica, sans-serif;
      color:#666;
      font-size:12px;
      text-shadow: 1px 1px 0px #fff;
      background:#eaebec;
      margin:20px;
      border:#ccc 1px solid;

      -moz-border-radius:3px;
      -webkit-border-radius:3px;
      border-radius:3px;

      -moz-box-shadow: 0 1px 2px #d1d1d1;
      -webkit-box-shadow: 0 1px 2px #d1d1d1;
      box-shadow: 0 1px 2px #d1d1d1;
    }
    table th {
      padding:21px 25px 22px 25px;
      border-top:1px solid #fafafa;
      border-bottom:1px solid #e0e0e0;

      background: #ededed;
      background: -webkit-gradient(linear, left top, left bottom, from(#ededed), to(#ebebeb));
      background: -moz-linear-gradient(top,  #ededed,  #ebebeb);
    }
    table th:first-child {
      text-align: left;
      padding-left:20px;
    }
    table tr:first-child th:first-child {
      -moz-border-radius-topleft:3px;
      -webkit-border-top-left-radius:3px;
      border-top-left-radius:3px;
    }
    table tr:first-child th:last-child {
      -moz-border-radius-topright:3px;
      -webkit-border-top-right-radius:3px;
      border-top-right-radius:3px;
    }
    table tr {
      text-align: center;
      padding-left:20px;
    }
    table td:first-child {
      text-align: left;
      padding-left:20px;
      border-left: 0;
    }
    table td {
      padding:12px;
      border-top: 1px solid #ffffff;
      border-bottom:1px solid #e0e0e0;
      border-left: 1px solid #e0e0e0;

      background: #fafafa;
      background: -webkit-gradient(linear, left top, left bottom, from(#fbfbfb), to(#fafafa));
      background: -moz-linear-gradient(top,  #fbfbfb,  #fafafa);
    }
    table tr.even td:not(.icon) {
      background: #f4f4f6;
      background: -webkit-gradient(linear, left top, left bottom, from(#ebedeb), to(#f4f4f6));
      background: -moz-linear-gradient(top,  #ebedeb,  #f4f4f6);
    }
    table tr:last-child td {
      border-bottom:0;
    }
    table tr:last-child td:first-child {
      -moz-border-radius-bottomleft:3px;
      -webkit-border-bottom-left-radius:3px;
      border-bottom-left-radius:3px;
    }
    table tr:last-child td:last-child {
      -moz-border-radius-bottomright:3px;
      -webkit-border-bottom-right-radius:3px;
      border-bottom-right-radius:3px;
    }

    table tr:hover td:not(.icon) {
      background: #f2f2f2;
      background: -webkit-gradient(linear, left top, left bottom, from(#f2f2f2), to(#f0f0f0));
      background: -moz-linear-gradient(top,  #f2f2f2,  #f0f0f0);
    }

    table td.west {
      background:  #3179ff;
      width: 10px;
    }

    table td.east {
      background: #ff383d;
      width: 10px;
    }

    table td.guer {
      background: #66c858;
      width: 10px;
    }

    th.header {
      background: url('public/img/bg.gif') right center no-repeat;
      cursor: pointer;
      font-weight: bold;
      padding-left: 20px;
      border-right: 1px solid #dad9c7;
      margin-left: -1px;
    }

    th.headerSortUp {
      background: url('public/img/asc.gif') right center no-repeat;
    }

    th.headerSortDown {
      background: url('public/img/desc.gif') right center no-repeat;
    }

  </style>

  <script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
  <script src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
  <script src="https://code.jquery.com/ui/1.11.2/jquery-ui.min.js"></script>
  <script src="public/js/jquery.tablesorter.min.js"></script>
</head>
<body>

  <table id="scoreboard">
    <thead>
      <tr>
        <th></th>
        <th>Name</th>
        <th>Side</th>
        <th>Player kills</th>
        <th>AI Kills</th>
        <th>Deaths</th>
        <th>Revives</th>
        <th>Captures</th>
      </tr>
    </thead>
    <?php
    $i = 1;
    foreach ($data as $uid => $pdata) {
      if (!is_object($pdata)) continue;
      $class = strtolower($pdata->PlayerInfo->LastPlayerSide);
    ?>
    <tr>
      <td class="icon <?php echo $class ?>"></td>
      <td><?php echo $pdata->PlayerInfo->Name ?></td>
      <td><?php echo $pdata->PlayerInfo->LastPlayerSide ?></td>
      <td><?php echo $pdata->PlayerScore->playerKills ?></td>
      <td><?php echo $pdata->PlayerScore->aiKills ?></td>
      <td><?php echo $pdata->PlayerScore->deathCount ?></td>
      <td><?php echo $pdata->PlayerScore->reviveCount ?></td>
      <td><?php echo $pdata->PlayerScore->captureCount ?></td>
    </tr>
    <?php
      $i++;
    } ?>
  </table>

    <script>
      $(function(){
        $('#scoreboard').tablesorter({sortList: [[3,1]], widgets: ['zebra'], headers: {0:{sorter: false}}});
      });
    </script>
</body>
</html>