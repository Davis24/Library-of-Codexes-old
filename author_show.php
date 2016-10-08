<?php 
    $_tpl = array();
    $_tpl['title'] = 'Library of Codexes';
    $_tpl['meta_desc'] = 'A video game codex database website with authors, collections, and ebooks from your favorite games.';

  include ('header.php'); 
  $config = parse_ini_file('config.ini');
  // Try and connect to the database
  $db = mysqli_connect('127.0.0.1',$config['username'],$config['password'],$config['dbname']);
  // If connection was not successful, handle the error
  if($db === false) {
    // Handle error - notify administrator, log to a file, show an error screen, etc.
    echo "you fucked up";
  }
?>

<div class = "container">
  <div class="page-header">
    <h1>
    <?php 
      $link = (int)$_GET["a"];
      $query = "SELECT CONCAT(FIRST_NAME,' ', LAST_NAME) as Name, BIOGRAPHY FROM AUTHORS WHERE AUTHOR_ID = ('".$link."')";
      $result = mysqli_query($db, $query);
      $bio = "";
      if (mysqli_num_rows($result) > 0) 
      {
        while($row = mysqli_fetch_assoc($result)) 
        {
          echo $row["Name"];
          $bio = $row["BIOGRAPHY"];  
        }
      }
    ?>
    </h1>
    <hr class ="style-one"></hr>
    <h3 style="text-align:center;">
    <?php echo $bio; ?>
    </h3>
  </div><!--/.page-header -->

  <div class="row">
    <div class="col-md-12">
      <table id = "example" class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>Title</th>
          </tr>
        </thead>
        <tbody>
        <?php 
          $query = "SELECT CODEX_TITLE, CODEX_ID FROM CODEXES WHERE FK_AUTHOR_ID = ('".$link."')";
          $result = mysqli_query($db, $query);
          if (mysqli_num_rows($result) > 0) 
          {
            //output data to table
            while($row = mysqli_fetch_assoc($result))
            {
              $codex_temp = str_replace(" ", "-", $row["CODEX_TITLE"]);
              echo "<tr>";
              echo "<td><a href = '/my-site/codex=".$row["CODEX_ID"]."/".$codex_temp."'>" .$row["CODEX_TITLE"] . "</a></td>";
              echo "</tr>"; 
            }
          }
          mysqli_close($db);
        ?>
        </tbody>
      </table>
    </div><!--/.col-md-12 -->      
  </div><!--/.row -->
</div><!--/.container -->

<?php include ('footer.php'); ?>
