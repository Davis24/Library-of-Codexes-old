<?php

if( isset( $_POST['choice'] ) )
{
	$search = $_POST['search'];
	$choice = $_POST['choice'];	
    
  $config = parse_ini_file('config.ini');
  // Try and connect to the database
  $db = mysqli_connect('127.0.0.1',$config['username'],$config['password'],$config['dbname']);
  // If connection was not successful, handle the error
  if($db === false) {
    // Handle error - notify administrator, log to a file, show an error screen, etc.
    echo "you fucked up";
  }

  echo '<table id = "example" class="table table-striped table-bordered"><thead><tr>';
  if($choice == 1)
  {
    echo "<th>Title</th>
         </tr></thead><tbody>";
    $query = "SELECT CODEX_TITLE, CODEX_ID FROM codexes WHERE LOWER(CODEX_TITLE) LIKE LOWER('%".$search."%')";
            $result = mysqli_query($db, $query);
            if(mysqli_num_rows($result) > 0)
            {
              while($row = mysqli_fetch_assoc($result))
              {
                $codex_temp = str_replace(" ", "-", $row["CODEX_TITLE"]);
                echo "<tr>";
                echo "<td><a href = '/my-site/codex=".$row["CODEX_ID"]."/".$codex_temp."'>".$row["CODEX_TITLE"]. "</a></td>";
                echo "</tr>";
              }
            }
  }
  else if($choice == 2)
  {
  	echo "<th>Author</th></tr></thead><tbody>";
    $query = "SELECT CONCAT(FIRST_NAME,' ', LAST_NAME) as Name, AUTHOR_ID FROM AUTHORS WHERE LOWER(CONCAT(FIRST_NAME, ' ', LAST_NAME)) LIKE LOWER('%".$search."%')";
            $result = mysqli_query($db, $query);
            if(mysqli_num_rows($result) > 0)
            {
              while($row = mysqli_fetch_assoc($result))
              {
                $author_temp = str_replace(" ", "-", $row["Name"]);
                echo "<tr>";
                echo "<td><a href = '/my-site/author=".$row["AUTHOR_ID"]."/".$author_temp."'>".$row["Name"]. "</a></td>";
                echo "</tr>";
              }
            }
  }
  else if($choice == 3)
  {
  	echo "<th>Name</th></tr></thead><tbody>";
   	$query = "SELECT NAME, COLLECTIONS_ID FROM COLLECTIONS WHERE LOWER(NAME) LIKE LOWER('%".$search."%')";
            $result = mysqli_query($db, $query);
            if(mysqli_num_rows($result) > 0)
            {
              while($row = mysqli_fetch_assoc($result))
              {
                $collection_temp = str_replace(" ", "-", $row["NAME"]);
                echo "<tr>";
                echo "<td><a href = '/my-site/collection=".$row["COLLECTIONS_ID"]."/".$collection_temp."'>".$row["NAME"]. "</a></td>";
                echo "</tr>";
              }
            }
  }
  echo '</tbody></table>';
  mysqli_close($db);
}
?>