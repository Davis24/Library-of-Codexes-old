<?php 
    $_tpl = array();
    $_tpl['title'] = 'Library of Codexes';
    $_tpl['meta_desc'] = 'A video game codex database website with authors, collections, and ebooks from your favorite games.';

  include('header.php');
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
<h1>
    <?php
          $game = ""; 
          $game_id = "";

          $link = (int)$_GET["c"];
          $query = "SELECT FK_GAME_ID FROM codexes where CODEX_ID = ('".$link."')";

          $result = mysqli_query($db, $query);
          if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
              $game_id = $row["FK_GAME_ID"];
            }
          }
          
          $query = "SELECT CODEX_ID, CODEX_TITLE FROM codexes where CODEX_ID < ".$link." AND FK_GAME_ID =".$game_id." ORDER BY CODEX_ID DESC LIMIT 1";
          $result = mysqli_query($db, $query);
          if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
              $name_temp = str_replace(" ", "-", $row["CODEX_TITLE"]);
              echo "<a href = '/my-site/codex=".$row["CODEX_ID"]."/".$name_temp."'>&lt</a> ";
            }
          }
         
          $query = "SELECT CODEX_TITLE, games.GAME_TITLE
                    FROM codexes 
                    INNER JOIN games 
                      ON codexes.FK_GAME_ID = games.GAME_ID 
                    WHERE CODEX_ID = ('".$link."')";
          $result = mysqli_query($db, $query);
          if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
              echo $row["CODEX_TITLE"];
              $game = $row["GAME_TITLE"];
            }
          }
          
          $query = "SELECT CODEX_ID, CODEX_TITLE FROM codexes where CODEX_ID > ".$link." AND FK_GAME_ID =".$game_id." ORDER BY CODEX_ID LIMIT 1";
          $result = mysqli_query($db, $query);
          if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
              $name_temp = str_replace(" ", "-", $row["CODEX_TITLE"]);
              echo " <a href = '/my-site/codex=".$row["CODEX_ID"]."/".$name_temp."'>&gt;</a></h1>";
            }
          }      
        ?>
    

    <div id = "center">
    <?php 
        $query = "SELECT CODEX_TITLE, CONCAT(authors.FIRST_NAME, ' ', authors.LAST_NAME) as Name, codexes.FK_AUTHOR_ID, CODEX_TEXT FROM codexes INNER JOIN authors ON codexes.FK_AUTHOR_ID = authors.AUTHOR_ID WHERE CODEX_ID = ('".$link."')";;
        $result = mysqli_query($db, $query);
        if (mysqli_num_rows($result) > 0) 
        {
          while($row = mysqli_fetch_assoc($result)) 
          {
            $name_temp = str_replace(" ", "-", $row["Name"]);
            $game_rep = str_replace(" ", "-", $game);
            echo "<h2><a href = '/author=".$row["FK_AUTHOR_ID"]."/".$name_temp."'>" .$row["Name"]."</a></h2>   
            <h3><a href ='/game=".$game_id."/".$game_rep."'>".$game ."</a></h3>          
            <br>
            <div class = 'btn-toolbar' role = 'toolbar'>
              <div class = 'btn-group'>
                <button id='increase_font' type='button' class='btn btn-default' aria-label='Plus'>
                <span class='glyphicon glyphicon-plus' aria-hidden='true'></span>
                </button>
                <button id = 'decrease_font' type='button' class='btn btn-default' aria-label='Minus'>
                <span class='glyphicon glyphicon-minus' aria-hidden='true'></span>
                </button>
                <button id = 'change_color' type='button' class='btn btn-default' aria-label='Adjust'>
                <span class='glyphicon glyphicon-adjust' aria-hidden='true'></span>
                </button>
              </div>
            </div>
            </div>
            <br>
            </div>
            <div class = 'container'>
              <p id = 'text'>".nl2br($row["CODEX_TEXT"]) ."</p>
            </div>";
          }
        }
        mysqli_close($db);         
        ?>

<?php include ('footer.php'); ?>
<script type = 'text/javascript' src = '/my-site/includes/change_text.js'></script>