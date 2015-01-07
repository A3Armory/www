<table>
  <thead>
  <tr>
    <th>Time (millis)</th>
    <th>Time (string)</th>
    <th>Min</th>
    <th>Max</th>
    <th>Avg</th>
    <th>Standard Deviation</th>
    <th>Variance</th>
  </tr>
  </thead>
  <?php
  foreach ($data as $uid => $row) {
    if (!is_object($row)) continue;
  ?>
  <tr>
    <td><?php echo $row->key ?></td>
    <td><?php echo $row->key_as_string ?></td>
    <td><?php echo $row->pcs->min ?></td>
    <td><?php echo $row->pcs->max ?></td>
    <td><?php echo number_format((float)$row->pcs->avg, 2, '.', ''); ?></td>
    <td><?php echo number_format((float)$row->pcs->variance, 2, '.', ''); ?></td>
    <td><?php echo number_format((float)$row->pcs->std_deviation, 2, '.', ''); ?></td>
  </tr>
  <?php }?>
</table>