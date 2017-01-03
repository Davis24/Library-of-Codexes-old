<?php 
    $_tpl = array();
    $_tpl['title'] = 'Library of Codexes';
    $_tpl['meta_desc'] = 'A video game codex database website with authors, collections, and ebooks from your favorite games.';

  include ('header.php'); 
  require_once('./includes/dbconnect.php');
?>
<div class = "container">
  <div class="row">
    <div class="col-md-12">
	<?php
		if(isset($_POST['submit']))
		{
			if(preg_match("/^[A-Za-z]+/", $_POST['search']))
			{ 
				$name=$_POST['search']; 
   			echo "<h1>Search results for ".$name ."</h1><br>";
   			echo '<div id="tabs">';
   			$name = str_replace("'", "%", $name);
   			//Codex Count Query
   			$query = "SELECT COUNT(CODEX_TITLE) FROM codexes WHERE LOWER(CODEX_TITLE) LIKE LOWER('%".$name."%')";
   			$result = mysqli_query($connection, $query);
   			echo '<ul>';
   				if(mysqli_num_rows($result) > 0)
   				{
   					while($row = mysqli_fetch_assoc($result))
   					{
   						echo '<li><a href = "#tabs-1" onclick = "reloadTable(1,\''.$name.'\')">Codexes ('.$row["COUNT(CODEX_TITLE)"].')</a></li>';
   					}
   				}
   				//Author Count Query
  			 	$query = "SELECT COUNT(*) FROM authors WHERE LOWER(CONCAT(FIRST_NAME, ' ', LAST_NAME)) LIKE LOWER('%".$name."%')";
	   	 		$result = mysqli_query($connection, $query);		
	   	 		if(mysqli_num_rows($result) > 0)
	   	 		{
	   	 			while($row = mysqli_fetch_assoc($result))
	   	 			{
	   	 				echo '<li><a href = "#tabs-1" onclick = "reloadTable(2,\''.$name.'\')">Authors ('.$row["COUNT(*)"].')</a></li>';
	   	 			}
	   	 		}
	   	 		//Collection Count Query
	   	 		$query = "SELECT COUNT(*) FROM collections WHERE LOWER(NAME) LIKE LOWER('%".$name."%')";
	   	 		$result = mysqli_query($connection, $query);		
	   	 		if(mysqli_num_rows($result) > 0)
	   	 		{
	   	 			while($row = mysqli_fetch_assoc($result))
	   	 			{
	   	 				echo '<li><a href = "#tabs-1" onclick = "reloadTable(3,\''.$name.'\')">Collections ('.$row["COUNT(*)"].')</a></li>';
	   	 			}
	   	 		}
	   	 		echo  '</ul>'; 

				// ### START FOR CODEXES TABLE ###
				// ###############################
				echo '<div id = "tabs-1">
				<div id = "table_reload">
				<table id = "example" class="table table-striped table-bordered">
           		<thead>
             	<tr>
               	<th>Title</th>
               	</tr>
           		</thead>
           		<tbody>';

	   			$query = "SELECT CODEX_TITLE, CODEX_ID FROM codexes WHERE LOWER(CODEX_TITLE) LIKE LOWER('%".$name."%')";
	   			$result = mysqli_query($connection, $query);
	   			if(mysqli_num_rows($result) > 0)
	   			{
	   				while($row = mysqli_fetch_assoc($result))
	   				{
	   					$codex_temp = str_replace(" ", "-", $row["CODEX_TITLE"]);
	   					echo "<tr>";
	   					echo "<td><a href = '/codex=".$row["CODEX_ID"]."/".$codex_temp."'>".$row["CODEX_TITLE"]. "</a></td>";
	   					echo "</tr>";
	   				}
	   			}	
	   			echo '</tbody></table></div></div>';
	  		}
        else
        { 
          echo '<div class = "container"><h1> Please enter a valid search query</h1><br>
           <form method = "post" action = "/search.php?t=1">
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
          </form></div>';
        }
		}
		else
		{
			echo '<div class = "container"><h1> Please enter a valid search query</h1><br>
           <form method = "post" action = "/search.php?t=1">
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
          </form></div>';
		}
?>
    </div><!--/.col-md-12-->      
  </div><!--/.row-->
</div><!--/.container-->
</div>
<?php include('footer.php') ?>
<link href="https://cdn.datatables.net/plug-ins/1.10.7/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet" />
<script src="https://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/plug-ins/1.10.7/integration/bootstrap/3/dataTables.bootstrap.js"></script>
<link rel="stylesheet" href="/includes/jquery-ui-1.11.4.custom/jquery-ui.css">
<script src="/includes/jquery-ui-1.11.4.custom/jquery-ui.js"></script>
<script type="text/javascript">
  $('#example').dataTable();
</script>
<script>
  $(function() {
  $( "#tabs" ).tabs();
    });
</script>
<script  type = "text/JavaScript">
  function reloadTable(user_choice, search_term)
    {
        var selection = user_choice;
        var search = search_term;
        console.log("selection" +selection);
        console.log("term"+ search_term);
        if(selection)
        {
            $.ajax ({
                type: 'post',
                url: '/searchtable.php',
                data: {
                    choice:selection,
                    search:search_term,
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
