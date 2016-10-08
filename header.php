
<!--Header HTML -->
<!DOCTYPE html>
<html lang = "en">
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php 
      if(!isset($_tpl))
      {
         $_tpl = array();
         $_tpl['title'] = 'Library of Codexes';
         $_tpl['meta_desc'] = '';
      }
    ?>
    <meta name = "description" content= "<?php echo $_tpl['meta_desc']?>">
    <meta name = "keywords" content= "library, codexes, video games, reading, lore, codex, dishonored, mass effect">
    <link rel="icon" href="/my-site/images/library_of_codexes_icon.ico" />


    <title><?php echo $_tpl['title']?></title>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700' rel='stylesheet' type='text/css'>
    <link href="/my-site/includes/bootstrap-3.3.6-dist/css/bootstrap.min.css" rel='stylesheet'>
    <link href="/my-site/css/font_style.css" rel = 'stylesheet' type = "text/css">
    <link href="/my-site/css/nav_style.css" rel='stylesheet' type = "text/css">
    <link href="/my-site/css/home_style.css" rel = 'stylesheet' type = "text/css">
    <link href="/my-site/css/footer.css" rel='stylesheet' type = "text/css">
 
 </head>
  <body>

      <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class ="navbar-brand" href = "#"><b>Library of Codexes</b></a>           
          </div>  
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li><a href = "/my-site/ebooks.php">Ebooks</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Games<span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href = "/my-site/game=9/Deus-Ex">Deus Ex</a></li>
                  <li><a href = "/my-site/game=4/Diablo">Diablo</a><li>
                  <li><a href = "/my-site/game=1/Dishonored">Dishonored</a></li>
                  <li><a href = "/my-site/game=7/Fable">Fable</a></li>
                  <li><a href = "/my-site/game=5/Mass-Effect">Mass Effect</a></li>
                  <li><a href = "/my-site/game=2/Star-Wars:-The-Old-Republic">Star Wars: The Old Republic</a></li>
                  <li><a href = "/my-site/game=8/The-Last-of-Us">The Last of Us</a></li>
                  <li><a href = "/my-site/game=6/Tomb-Raider">Tomb Raider</a></li>
                  <li><a href = "/my-site/game=3/Baldur's-Gate">Baldur's Gate</a></li>
                </ul>
              </li>
            </ul>
            <div class="col-sm-3 col-md-3 pull-right">
              <ul class="nav navbar-nav">
              <li><a href = "#">Donate</a></li>
              <li><a href = "#">Contact</a></li>
            </ul>
            </div><!--/.col-sm-->        
          </div><!--/.nav-collapse -->
        </div><!--/container-->
      </nav>
