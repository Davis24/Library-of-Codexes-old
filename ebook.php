<?php 
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
<?php 
	$link = (int)$_GET["g"];
	#echo $link;
	 $query = "SELECT CODEX_TITLE, CONCAT(authors.TITLE, ' ',authors.FIRST_NAME, ' ', authors.LAST_NAME) as Name,
        FK_AUTHOR_ID, CODEX_TEXT, CODEX_ID FROM codexes INNER JOIN authors ON codexes.FK_AUTHOR_ID = authors.AUTHOR_ID  WHERE codexes.FK_GAME_ID = ('".$link."') ORDER BY CODEX_ID ASC ";
     #  echo $query;
	$result = mysqli_query($db, $query);
	if(mysqli_num_rows($result) > 0)
  	{
   		while($row = mysqli_fetch_assoc($result))
   		{
   			echo '<h2>'.$row["CODEX_TITLE"].'</h2><h3>'.$row["Name"].'</h3>';
   			echo'<p>'.nl2br($row["CODEX_TEXT"]).'</p>';
   		}
   	}

       
?>