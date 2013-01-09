 <?php 

 	echo "<table class='sortable'>";

 	echo "<thead><tr><th rel='0' name='id'>ID</th>";
 	echo "<th rel='1' name='First name'>First name</th>";
 	echo "<th rel='2' name='Last name'>Last name</th>";
 	echo "<th rel='3' name='email'>E-Mail</th>";
 	echo "<th rel='4' name='Company'>Company</th>";
 	echo "</tr></thead>";

      foreach ($users as $row) {
      	echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['first_name'] . "</td>";
        echo "<td>" . $row['last_name'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['company'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
?>
