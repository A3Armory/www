<table>
  <thead>
  <tr>
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
  foreach ($data as $uid => $pdata) {
    if (!is_object($pdata)) continue;
  ?>
  <tr>
    <td><?php echo $pdata->PlayerInfo->Name ?></td>
    <td><?php echo $pdata->PlayerInfo->LastPlayerSide ?></td>
    <td><?php echo $pdata->PlayerScore->playerKills ?></td>
    <td><?php echo $pdata->PlayerScore->aiKills ?></td>
    <td><?php echo $pdata->PlayerScore->deathCount ?></td>
    <td><?php echo $pdata->PlayerScore->reviveCount ?></td>
    <td><?php echo $pdata->PlayerScore->captureCount ?></td>
  </tr>
  <?php }?>
</table>