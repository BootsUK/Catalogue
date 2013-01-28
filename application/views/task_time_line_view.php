<?php require('http://evdatacenter.co.uk/boots/application/views/req/gantt.php'); ?>

<h2>Time line</h2>

<?php 

$time_start = "01012013";


	echo $row['t_title'] . " ";
	echo $row['t_dev'] . " ";
	echo $row['t_due'];
	$due_date = explode("/", $row['t_due']);
	$total_due_date = $due_date[0] . $due_date[1] . $due_date[2];
	echo "<div style='width:" . $total_due_date / 50 . ";background-color:#4779C4; height:10px;'></div>";
	echo "<br />";
}


?>

<table>
	<tr>
		<th>January</th>
		<th>February</th>
		<th>March</th>
		<th>April</th>
		<th>May</th>
		<th>June</th>
		<th>July</th>
		<th>August</th>
		<th>September</th>
		<th>October</th>
		<th>November</th>
		<th>December</th>
	</tr>

</table>