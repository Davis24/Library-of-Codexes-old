<?php 
    $_tpl = array();
    $_tpl['title'] = 'Ebooks | Library of Codexes';
    $_tpl['meta_desc'] = 'Library of Codexes has a growing collection of ebooks in epub, azw3, and pdf format so you can take your reading on the go.';
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
 
<div class = "jumbotron">
  <div class = "container">
    <h1 style = "font-weight:bold;">Ebooks</h1>
    <p style = "text-align: center; font-weight:bold">Love our ebooks? <a href = "#donateModal" data-toggle = "modal">Donate</a></p>
  </div>
</div>
<div class = "container">

      <!-- Example row of columns -->
      <div class="row">

        <div class="col-md-2">
        
        </div>
        <div class="col-md-4">
          <h2>Mailing List</h2>
          <p>Never miss out on a new ebook by joining Library of Codexes' mailing list. </p>
          <form class = "form-horizontal" role = "form" method = "post" action="http://scripts.dreamhost.com/add_list.cgi">
            <input type="hidden" name="list" value="_locupdate_" />
            <input type="hidden" name="domain" value="_libraryofcodexes.com/ebookslist_" />

            <!-- Optional: -->
            <input type="hidden" name="unsuburl" value="_http://UnsubscribedURL_" />
            <input type="hidden" name="alreadyonurl" value="_http://AlreadyOnURL_" />
            <input type="hidden" name="notonurl" value="_http://NotOnURL_" />
            <input type="hidden" name="invalidurl" value="_http://InvalidURL_" />
            <input type="hidden" name="emailconfirmurl" value="_http://EmailConfirmURL_" />
            <input type="hidden" name="emailit" value="1" />
            <!-- Required: -->
            <p>E-mail<input type="text" class = "form-control" name="email" /></p>

            <!-- Required: -->
            <p><input class="btn btn-sm btn-success" type="submit" name="submit"  value="Subscribe" />

            <!-- Optional: -->
            <input class="btn btn-sm btn-danger"  type="submit" name="unsub" value="Unsubscribe" /></p>

        </form>
       <!--    <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p> -->
        </div>
        <div class="col-md-4">
          <h2>Suggest a New Game</h2>
          <p>Don't see your favorite video game on the list then request it.</p>
          <p><a class="btn btn-default" data-toggle="modal" href="#contactModal" role="button">Contact &raquo;</a></p>
       </div>
        <div class="col-md-2">
        
        </div>
      </div>
 <div class="row">
    <div class="col-xs-12 col-md-12">
      <div id = "table_reload">
        <table id = "example2" class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>Game</th>
            <th>Ebook</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          $query = "SELECT GAME_TITLE, GAME_ID FROM GAMES ORDER BY GAME_TITLE";
          $result = mysqli_query($db, $query);
          if (mysqli_num_rows($result) > 0) 
          {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) 
            {
              $game_temp = str_replace(" ", "-", $row["GAME_TITLE"]);

              #echo var_dump($row);

              echo "<tr>";
              echo "<td><a href = '/game=" .$row["GAME_ID"]."/".$game_temp."'>".$row["GAME_TITLE"]."</a></td>";
              echo '<td><a href = "/ebooks/epub/'.$game_temp.'.epub">EPUB</a> · <a href = "/ebooks/azw3/'.$game_temp.'.azw3">AZW3</a> · <a href = "/ebooks/pdf/'.$game_temp.'.pdf">PDF</a></td>';
            } echo "</tr>";
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