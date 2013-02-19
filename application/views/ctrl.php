<div class="content">  
	<table class="table table-condensed">
	  <thead>
	    <tr>
	      <th>#</th>
	      <th>Name</th>
	      <th>Code</th>
	      <th>Time</th>
	      <th>Latitude</th>
	      <th>Longitude</th>
  <th>Correct?</th>
  <th>Correct Position</th>
	      <th>IP Address</th>
	    </tr>
	  </thead>
	  <tbody>
	<?php
    $i = 1;
		foreach ($records as $key => $row) {
			echo "<tr>";
	    echo "<td>{$row['id']}</td>";
	    echo "<td><a href=\"{$base_url}view/private_mode/{$row['privateid']}\">{$row['name']}</a></td>";
	    echo "<td><a href=\"{$base_url}{$row['longid']}\">{$row['longid']}</a></td>";
	    echo "<td>".date("D M j G:i:s T Y", $row['time'])."</td>";
	    echo "<td>{$row['latitude']}</td>";
	    echo "<td>{$row['longitude']}</td>";
      echo "<td>{$row['answer']}</td>";
      echo "<td>{$row['user_position']}</td>";
	    echo "<td>{$row['ipaddress']}</td>";
	    echo "</tr>";
      $i++;
    }
    $leng = 3;
    $start = ((int)(($page-1)/$leng))*$leng+1;
	?>

	  </tbody>
	</table>
  <div class="pagination pagination-centered">
    <ul>
    <li <?php echo ($start < $leng) ? "class='disabled'" : ""; ?>><a href="<?php echo ($start < $leng) ? "#" : "/ctrl/iloveyou/".($start-1); ?>">«</a></li>
    <?php
      for($i = 0; $i < $leng; $i++){
        echo "<li". (($start+$i) == $page ? " class='active'" : "") ."><a href='/ctrl/iloveyou/".($start+$i)."'>".($start+$i)."</a></li>";
      }
    ?>
    <li><a href="/ctrl/iloveyou/<?php echo ($start+$leng); ?>">»</a></li>
    </ul>
  </div>
</div>