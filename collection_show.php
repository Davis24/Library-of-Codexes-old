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
  <div class = "page-header">
    <?php 
      $link = (int)$_GET["co"];
      $query = "SELECT NAME, CURATOR FROM COLLECTIONS WHERE COLLECTIONS_ID = ('".$link."')";
      $result = mysqli_query($db, $query);
      if (mysqli_num_rows($result) > 0) 
      {
        while($row = mysqli_fetch_assoc($result)) 
        {
          echo "<h1>".$row["NAME"] ."</h1><h3 style = 'text-align:center;'>Curator: ".$row["CURATOR"]."</h3>";
        }
      }
      ?>
  </div>
  <div id = "center">
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
  <div id = 'text'>
    <?php 
      $query = "SELECT CODEXES.CODEX_TITLE, CODEXES.CODEX_TEXT, CONCAT(AUTHORS.FIRST_NAME,' ',AUTHORS.LAST_NAME) as NAME
                FROM collection_bridge 
                INNER JOIN codexes 
                  ON codexes.CODEX_ID = collection_bridge.FK_CODEX_ID
                INNER JOIN authors 
                  ON  codexes.FK_AUTHOR_ID = authors.AUTHOR_ID
                WHERE FK_COLLECTION_ID = ('".$link."')";  
      $result = mysqli_query($db, $query);
      if(mysqli_num_rows($result) > 0) 
      {
        while($row = mysqli_fetch_assoc($result)) 
        {
          echo "<h2 style = 'font-size: 200%;'><b>".$row["CODEX_TITLE"]."</b></h2>
              <h2 style = 'font-size: 190%;'>".$row["NAME"] ."</h2><br>
              <p style = 'font-size: 160%;'>".nl2br($row["CODEX_TEXT"]) ."</p>
              <br>";
          }
        }
        mysqli_close($db);         
      ?>
    </div>
</div>
<?php include ('footer.php'); ?>
<script type = 'text/javascript' src = '/my-site/includes/change_text.js'></script>