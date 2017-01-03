
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
    <link rel="icon" href="/images/library_of_codexes_icon.ico" />
    <meta name = "description" content = "<?php echo $_tpl['meta_desc']?>">
    <meta name = "keywords" content = "library, codexes, video games, reading, lore, codex, dishonored, mass effect">

    <title><?php echo $_tpl['title']?></title>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700' rel='stylesheet' type='text/css'>
    <link href="/includes/bootstrap-3.3.6-dist/css/bootstrap.min.css" rel='stylesheet'>
    <link href="/css/font_style.css" rel = 'stylesheet' type = "text/css">
    <link href="/css/nav_style.css" rel='stylesheet' type = "text/css">
    <link href="/css/home_style.css" rel = 'stylesheet' type = "text/css">
    <link href="/css/footer.css" rel='stylesheet' type = "text/css">
 
 </head>

  <body>
    <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-79563886-1', 'auto');
  ga('send', 'pageview');

</script>
      <nav class="navbar navbar-default navbar-static-top" style = "margin-bottom:0px; border-bottom: 0px;">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class ="navbar-brand" href = "/"><b>Library of Codexes</b></a>           
          </div>  
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li><a href = "/ebookslist">Ebooks</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Games<span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href = "/game=3/Baldur's-Gate">Baldur's Gate</a></li>
                  <li><a href = "/game=9/Deus-Ex">Deus Ex</a></li>
                  <li><a href = "/game=4/Diablo">Diablo</a><li>
                  <li><a href = "/game=1/Dishonored">Dishonored</a></li>
                  <li><a href = "/game=7/Fable">Fable</a></li>
                  <li><a href = "/game=5/Mass-Effect">Mass Effect</a></li>
                  <li><a href = "/game=2/Star-Wars-The-Old-Republic">Star Wars: The Old Republic</a></li>
                  <li><a href = "/game=8/The-Last-of-Us">The Last of Us</a></li>
                  <li><a href = "/game=6/Tomb-Raider">Tomb Raider</a></li>
                </ul>
              </li>
            </ul>
            <div class="col-sm-12 col-md-3 pull-right">
              <ul class="nav navbar-nav">
                <li><a data-toggle ="modal" href ="#donateModal"  >Donate</a></li>
                <li><a href = "/contact">Contact</a></li>
              </ul>
            </div><!--/.col-sm-->        
          </div><!--/.nav-collapse -->
        </div><!--/container-->
      </nav>
<!-- Donate Modal -->
<div class="modal fade" id="donateModal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 style="color:red; text-align: center;">&hearts; Thank You! &hearts;</h3>
      </div>
      <div class="modal-body" style = "text-align: center;">
          <div class="form-group">
            <p>Your support helps keep Library of Codexes alive.</p>
              <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                <input type="hidden" name="cmd" value="_s-xclick">
                <input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----">
                <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
              </form>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-default btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
      </div>
    </div>
  </div>
</div><!--modal fade-->