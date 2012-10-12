 <?php 
      foreach ($users as $row) {
        echo "<p>" . $row['id'] . "</p>";
        echo "<p>" . $row['first_name'] . "</p>";
        echo "<p>" . $row['last_name'] . "</p>";
        echo "<p>" . $row['email'] . "</p>";
        echo "<p>" . $row['company'] . "</p>";
    }
?>
