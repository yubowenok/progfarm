<html>
  <head>
    <title>PHP Test</title>
  </head>
  <body>
    <?php
      include 'db/query.php';
      connectDB('bowen','test');
      $result = getAllPlatforms();
      echo get_class($result);
      echo '<table>';
      while($row = mysqli_fetch_array($result)){
        echo '<tr>';
        echo '<td>' . $row['id'] . '</td>';
        echo '<td>' . $row['name'] . '</td>';
        echo '<td>' . $row['url'] . '</td>';
        echo '</tr>';
      }
      echo '</table>';
    ?>
  </body>
</html>