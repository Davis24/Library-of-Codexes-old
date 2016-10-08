<?php 
  
  $config = parse_ini_file('config.ini');
  // Try and connect to the database
  $db = mysqli_connect('127.0.0.1',$config['username'],$config['password'],$config['dbname']);
  // If connection was not successful, handle the error
  if($db === false) {
    // Handle error - notify administrator, log to a file, show an error screen, etc.
    echo "you fucked up";
  }
  $game_temp = "";
  $link = (int)$_GET["g"];
  //Compose Query
  $query = "SELECT GAME_TITLE FROM GAMES WHERE GAME_ID = ('".$link."')";
  $result = mysqli_query($db, $query);
  if (mysqli_num_rows($result) > 0) 
  {
    while($row = mysqli_fetch_assoc($result)) 
    {
        $game_temp = $row["GAME_TITLE"];
    }
  }
  $_tpl = array();
  $_tpl['title'] = $game_temp ." | Library of Codexes";
  $_tpl['meta_desc'] = $game_temp. "'s completed collection of in-game codexes and authors.";
 
  include ('header.php');
?>

<div id = "img1" class = "jumbotron">
  <div class = "container">
    <h1 style = "font-weight:bold;">Brush Up on Your Lore</h1>
    <p  id = "headerColor">Explore our collections, ebooks, authors, and more.</p>
  </div>
</div>

<div class = "container">
  <h1 style = "font-size: 300%;"><b>
  <?php 
     echo $game_temp;
    $game_temp = str_replace(" ", "-", $game_temp); 
  ?>
  </b></h1>
  <h3 style ="text-align:center"><a href = "/my-site/ebook.php?g=<?php echo $link?>">EPUB</a> · <a href = "/my-site/ebooks/mobi/<?php echo $game_temp ?>.mobi">MOBI</a> · <a href = "/my-site/ebooks/pdf/<?php echo $game_temp ?>.pdf">PDF</a></h3>
  <hr class = "style-one">
  <br><br>      
  <div class="row top-buffer">
    <div class="col-xs-12 col-md-4 column-margin">
      <a style ="cursor:pointer;" <?php $link = (int)$_GET["g"]; 
        echo 'onclick = "reloadTable(1,'.$link.')">';?>
        <img src="/my-site/images/Codexes.jpg" alt="Codexes">
      </a>
    </div>
    <div class="col-xs-12 col-md-4 column-margin ">
      <a style ="cursor:pointer;" <?php $link = (int)$_GET["g"]; 
        echo 'onclick = "reloadTable(2,'.$link.')">';?>
        <img src="/my-site/images/Authors.jpg" alt="Authors"></a>
    </div>
    <div class="col-xs-12 col-md-4 column-margin">
      <a style ="cursor:pointer;" <?php $link = (int)$_GET["g"]; 
        echo 'onclick = "reloadTable(3,'.$link.')">';?>
        <img src="/my-site/images/Collections.jpg" alt="Collections"></a>
    </div>    
  </div>
  <div class="row">
    <div class="col-xs-12 col-md-12">
      <div id = "table_reload">
        <table id = "example2" class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>Title</th>
            <th>Author</th>
          </tr>
        </thead>
        <tbody>
        <?php 
          $query = "SELECT CODEX_TITLE, CONCAT(authors.FIRST_NAME, ' ', authors.LAST_NAME) as Name,
                    FK_AUTHOR_ID, CODEX_ID FROM codexes INNER JOIN authors ON codexes.FK_AUTHOR_ID = authors.AUTHOR_ID 
                    WHERE codexes.FK_GAME_ID = ('".$link."')";;
          $result = mysqli_query($db, $query);
          if (mysqli_num_rows($result) > 0) 
          {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) 
            {
              $codex_temp = str_replace(" ", "-", $row["CODEX_TITLE"]);
              $author_temp = str_replace(" ", "-", $row["Name"]); 

              echo "<tr>";
              echo "<td><a href = '/my-site/codex=".$row["CODEX_ID"]."/".$codex_temp."'>".$row["CODEX_TITLE"] ."</a></td>";
              echo "<td><a href = '/my-site/author=" .$row["FK_AUTHOR_ID"]."/".$author_temp."'>" .$row["Name"]  ."</td>";
              echo "</tr>";  
            }
          }
          mysqli_close($db);
        ?>  
        </tbody>
      </table>
      </div>
    </div><!--/col-md-12-->
  </div><!--/row-->
</div><!--/container-->

<?php include ('footer.php'); ?>
<script  type = "text/JavaScript">
  function reloadTable(user_choice, current_game)
    {
        var selection = user_choice;
        var _game = current_game;
        console.log("selection" +selection);
        console.log("game"+_game);
        if(selection)
        {
            $.ajax ({
                type: 'post',
                url: '/my-site/loadtable.php',
                data: {
                    choice:selection,
                    game:_game,
                },
                success: function(response){
                    $('#example2').DataTable().destroy();
                    //$('#example').DataTable(response);
                    $('#table_reload').html(response);
                    $('#example').dataTable();
                }
            });
        }
    }
</script>
