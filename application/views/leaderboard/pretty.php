<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Leaderboard</title>
  <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="http://www.datatables.net/rss.xml">
  <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.css">

  <script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <script type="text/javascript" language="javascript" src="//cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" language="javascript" src="//cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.js"></script>
  <style type="text/css" >
    .wrapper {
      width: 850px;
      padding: 0px;
      margin: 0px;
    }
    body {
      background-color: transparent;
    }

    #leaderboard {
      background-color: #ffffff;
    }
    .col-sm-6 {
      width: 100%;
    }

    div.dataTables_paginate {
      float: left;
      padding-left: 25%;
    }
  </style>
</head>
<body>
  <center>
  <div class="wrapper">
    <table id="leaderboard" class="datatable table table-striped table-bordered">
      <thead>
      <tr>
        <th>Rank</th>
        <th>Name</th>
        <th>Player kills</th>
        <th>K/D</th>
        <th>AI Kills</th>
        <th>Deaths</th>
        <th>Revives</th>
        <th>Captures</th>
      </tr>
      </thead>
      <?php
      foreach ($data as $uid => $pdata) {
        if (!is_object($pdata)) continue;
        ?>
        <tr>
          <td></td>
          <td><?php echo $pdata->fields->{"PlayerInfo.Name"}[0] ?></td>
          <td><?php echo $pdata->fields->{"PlayerScore.playerKills"}[0] ?></td>
          <td><?php echo $pdata->fields->{"PlayerScore.kdr"}[0] ?></td>
          <td><?php echo $pdata->fields->{"PlayerScore.aiKills"}[0] ?></td>
          <td><?php echo $pdata->fields->{"PlayerScore.deathCount"}[0] ?></td>
          <td><?php echo $pdata->fields->{"PlayerScore.reviveCount"}[0] ?></td>
          <td><?php echo $pdata->fields->{"PlayerScore.captureCount"}[0] ?></td>
        </tr>
      <?php }?>
    </table>
  </div>
  </center>

    <script>
      $(document).ready( function () {
        $('#leaderboard').DataTable({
          "bLengthChange": false,
          "bInfo": false,
          "bAutoWidth": false,
          "fnDrawCallback": function ( oSettings ) {
            /* Need to redo the counters if filtered or sorted */
            if ( oSettings.bSorted || oSettings.bFiltered )
            {
              for ( var i=0, iLen=oSettings.aiDisplay.length ; i<iLen ; i++ )
              {
                $('td:eq(0)', oSettings.aoData[ oSettings.aiDisplay[i] ].nTr ).html( i+1 );
              }
            }
          },
          "aoColumnDefs": [
            { "bSortable": false, "aTargets": [ 0 ] }
          ],
          "order": [[ 2, "desc" ]]
        });
      });
    </script>
</body>
</html>