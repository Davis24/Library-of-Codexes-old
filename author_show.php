<?php 
    $_tpl = array();
    $_tpl['title'] = 'Library of Codexes';
    $_tpl['meta_desc'] = 'A video game codex database website with authors, collections, and ebooks from your favorite games.';

  include ('header.php'); 
  require_once('./includes/dbconnect.php');
?>

<div class = "container">
  <div class="page-header">
    <h1>
    <?php 
      $link = (int)$_GET["a"];
      $query = "SELECT CONCAT(FIRST_NAME,' ', LAST_NAME) as Name, BIOGRAPHY FROM authors WHERE AUTHOR_ID = ('".$link."')";
      $result = mysqli_query($connection, $query);
      $bio = "";
      if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
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
          $query = "SELECT CODEX_TITLE, CODEX_ID FROM codexes WHERE FK_AUTHOR_ID = ('".$link."')";
          $result = mysqli_query($connection, $query);
          if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)){
              $codex_temp = str_replace(" ", "-", $row["CODEX_TITLE"]);
              echo "<tr>";
              echo "<td><a href = '/codex=".$row["CODEX_ID"]."/".$codex_temp."'>" .$row["CODEX_TITLE"] . "</a></td>";
              echo "</tr>"; 
            }
          }
          mysqli_close($connection);
        ?>
        </tbody>
      </table>
    </div><!--/.col-md-12 -->      
  </div><!--/.row -->
</div><!--/.container -->
<?php include ('footer.php'); ?>
<link href="https://cdn.datatables.net/plug-ins/1.10.7/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet" />
<script src="https://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/plug-ins/1.10.7/integration/bootstrap/3/dataTables.bootstrap.js"></script>
<script type="text/javascript">
  $('#example').dataTable();
</script>
