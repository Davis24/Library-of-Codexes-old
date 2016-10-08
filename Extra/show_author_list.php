<?php 
  include('header.php');
  $db = mysqli_connect("127.0.0.1", "root", "", "library");
  mysqli_select_db($db, "Library");
  if (!$db) {
      echo "Error: Unable to connect to MySQL." . PHP_EOL;
      echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
      echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
      exit;
  }

?>

<div class = "container">
  <h1><b><?php 
      $link = (int)$_GET["g"];
      $query = "SELECT GAME_TITLE FROM GAMES WHERE GAME_ID = ('".$link."')";
      $result = mysqli_query($db, $query);

      if (mysqli_num_rows($result) > 0) 
      {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) 
        {
          echo $row["GAME_TITLE"] ." Authors";
        }
      }
  ?></b></h1>
  <hr class = "style-one">
  <br><br>
</div>
 
<div class = "container">
  <div class="row">
    <div class="col-md-12">
      <table id = "example" class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>Author</th>
            <th>Biography</th>
          </tr>
        </thead>
        <tbody>
        <?php 
          $query = "SELECT CONCAT(FIRST_NAME,' ',LAST_NAME) as Name, AUTHOR_ID, BIOGRAPHY FROM AUTHORS WHERE FK_GAME_ID = ('".$link."')";
          $result = mysqli_query($db, $query);

          if (mysqli_num_rows($result) > 0) 
          {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) 
            {
              #var_dump($row);
              echo "<tr>";
              echo "<td><a href = 'author_show.php?a=".$row["AUTHOR_ID"]."'>" .$row["Name"] . "</a></td>";
              echo "<td>" .$row["BIOGRAPHY"]  ."</td>";
              echo "</tr>"; 
            }
          }
          mysqli_close($db);
        ?>  
        </tbody>
      </table>
    </div>      
  </div>
</div>

<?php include ('footer.php'); ?>