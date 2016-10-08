<?php 
    $_tpl = array();
    $_tpl['title'] = 'Donate | Library of Codexes';
    $_tpl['meta_desc'] = 'Library of Codexes is the result of numerous hours of works. If you find it useful please consider contributing to its continued development.';
    include ('header.php'); ?>
<div class = "container">
	<div class = "page-header">
		<h1>Enjoying the Site?</h1>
		<h3 style = "text-align:center;">Consider a quest reward</h3>
	</div>
    <div class="row featurette">
        <div class="col-xs-12 col-md-12">       
       		<p class="lead" style = "font-family: 'Lora', serif;">Library of Codexes, as with all websites, requires a monthly payment to stay hosted. Since the site will never have ads or paid content a donation of any size would go a long way. If giving money makes you uncomfortable you can instead give something more tangible from my amazon <a href = "https://amzn.com/w/38HSGH7LVLICN">wishlist</a>. </p>
        </div>
    </div>
    <br/>
    <div class = "col-xs-3 col-md-4"></div>
    <div class = "col-xs-3 col-md-2">
    	<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
			<input type="hidden" name="cmd" value="_s-xclick">
			<input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----">
			<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
    		<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
    	</form>
    </div>
</div><!--/.container-->


<?php include ('footer.php'); ?>