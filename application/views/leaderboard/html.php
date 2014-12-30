<table>
  <thead>
  <tr>
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