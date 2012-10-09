 <?php 
      foreach ($search_results as $row) {
        echo "<p>" . $row['id'] . "</p>";
        echo "<p>" . $row['title'] . "</p>";
        echo "<p>" . $row['description'] . "</p>";
    }
?>

