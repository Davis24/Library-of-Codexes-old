<?php 
    $_tpl = array();
    $_tpl['title'] = 'Library of Codexes';
    $_tpl['meta_desc'] = 'A video game codex database website with authors, collections, and ebooks from your favorite games.';

  include ('header.php'); 
  require_once('./includes/dbconnect.php');
?>


<div class = "container">
  <div class = "page-header">
    <?php 
      $link = (int)$_GET["co"];
      $query = "SELECT NAME, CURATOR FROM collections WHERE COLLECTIONS_ID = ('".$link."')";
      $result = mysqli_query($connection, $query);
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
      $query = "SELECT codexes.CODEX_TITLE, codexes.CODEX_TEXT, CONCAT(authors.FIRST_NAME,' ',authors.LAST_NAME) as NAME
                FROM collection_bridge 
                INNER JOIN codexes 
                  ON codexes.CODEX_ID = collection_bridge.FK_CODEX_ID
                INNER JOIN authors 
                  ON  codexes.FK_AUTHOR_ID = authors.AUTHOR_ID
                WHERE FK_COLLECTION_ID = ('".$link."')";  
      $result = mysqli_query($connection, $query);
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
        mysqli_close($connection);         
      ?>
    </div>
</div>
<?php include ('footer.php'); ?>
<script type = 'text/javascript' src = '/includes/change_text.js'></script>