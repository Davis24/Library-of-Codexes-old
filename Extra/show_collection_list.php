<?php 
  include('header.php');

  $db = mysqli_connect("127.0.0.1", "root", "", "library");
  mysqli_select_db($db, "Library");
  if (!$db) {
      echo "Error: Unable to connect to MySQL." . PHP_EOL;
      echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
      echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
      exit;
  } ?>

  <div class = "container">
  <form method = "post" action = "search.php?t=1">
  <div class = "col-lg-8 col-lg-offset-2">
    <div class = "input-group input-group-lg">
      <input type="text" class="form-control" id="db-search" name = "search" placeholder="Search...."> 
      <span class = "input-group-btn">
        <button class = "btn btn-default" type = "submit" name = "submit">
    	    <span class = "glyphicon glyphicon-search" aria-hidden = "true"></span>
        </button>
      </span>
    </div><!--/.input-group-->
  </div><!--/.col-lg-8 -->
</form>
</div>
<br>
<?php
      $link = (int)$_GET["g"];
      $query = "SELECT GAME_TITLE FROM GAMES WHERE GAME_ID = ('".$link."')";
      $result = mysqli_query($db, $query);

      if(mysqli_num_rows($result) > 0)
      {
      	while($row = mysqli_fetch_assoc($result))
      	{
      		echo "<h1>".$row["GAME_TITLE"]." Collections</h1>";
      	}
      }


 ?>
 <br>
<div class = "container">
  <div class="row">
    <div class="col-md-12">
      <table id = "example" class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>Title</th>
            <th>Description</th>
          </tr>
        </thead>
        <tbody>
  <?php

  
  $query = "SELECT NAME, DESCRIPTION, COLLECTIONS_ID FROM COLLECTIONS WHERE FK_GAME_ID =  ('".$link."')";
  $result = mysqli_query($db, $query);

      if (mysqli_num_rows($result) > 0) 
      {
        while($row = mysqli_fetch_assoc($result)) 
        {
        	echo "<tr>";
            echo "<td><a href = 'collection_show.php?co=".$row["COLLECTIONS_ID"]."'>" .$row["NAME"] . "</a></td>";
            echo "<td>" .$row["DESCRIPTION"]  ."</td>";
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