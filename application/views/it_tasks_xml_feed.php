<?php 

foreach($results as $row){
	echo "<title id=". $row['t_id'] .">" . $row['t_title'] . "</title>";
	echo "<description>" . $row['t_desc'] . "</description>";
	echo "<priority>" . $row['t_priority'] . "</priority>";
	echo "<due_date>" . $row['t_due'] . "</due_date>";
	echo "<comp_date>" . $row['t_comp'] . "</comp_date>";
	echo "<status>" . $row['t_status'] . "</status>";
	echo "<developer>" . $row['t_dev'] . "</developer>";
	echo "<stakeholder>" . $row['t_sh'] . "</stakeholder>";
	echo "<date_added>" . $row['t_date_added'] . "</date_added>";
	echo "<date_modified>" . $row['t_date_mod'] . "</date_modified>";
	echo "<modified_by>" . $row['t_mod_by'] . "</modified_by>";
	echo "<comments>" . $row['t_comments'] . "</comments>";
	echo "<set_by>" . $row['t_set_by'] . "</set_by>";
}


?>