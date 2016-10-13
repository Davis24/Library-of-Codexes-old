<?php 
    $_tpl = array();
    $_tpl['title'] = 'Library of Codexes';
    $_tpl['meta_desc'] = 'A video game codex database website with authors, collections, and ebooks from your favorite games.';
    include ('header.php'); ?>
      <style>
.book {
  padding: 15px 0 0 0;
  margin: auto;
}
#book:before { 
    display: block;
    width: 80%;
    height: 1em;
    background: rgba(0,0,0,.35);
    border-radius: 50%;
    position: absolute;
    bottom:-10px;
    -webkit-filter: blur(5px);
    filter: blur(5px);
    z-index:-5;
}
.shelf {
  border-bottom: 30px solid #a5a5a5;
    border-left: 20px solid transparent;
    border-right: 20px solid transparent;
  top: -15px;
  z-index: -10;
}
.shelf:after {
  content: '';
  background: #686868;
  height: 20px;
  width: calc(100% + 40px); /*IE9+*/
  position: absolute;
  top: 30px;
  left: 0;
  right: 0;
  z-index: 1;
  margin: 0 -20px;
}

  </style>
<?php include('home_page.html'); ?>	
<?php include ('footer.php'); ?>