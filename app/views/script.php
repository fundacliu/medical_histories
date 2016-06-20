<script src="<?php echo trim($_SERVER['SCRIPT_NAME'], "/index.php"); ?>/public/jquery/jquery.min.js"></script>
<script src="<?php echo trim($_SERVER['SCRIPT_NAME'], "/index.php"); ?>/public/jquery/jquery.easing.min.js"></script>
<script src="<?php echo trim($_SERVER['SCRIPT_NAME'], "/index.php"); ?>/public/grayscale/js/bootstrap.min.js"></script>
<script src="<?php echo trim($_SERVER['SCRIPT_NAME'], "/index.php"); ?>/public/grayscale/js/grayscale.js"></script>
<!-- cdn for modernizr, if you haven't included it already -->
<script src="http://cdn.jsdelivr.net/webshim/1.12.4/extras/modernizr-custom.js"></script>
<!-- polyfiller file to detect and load polyfills -->
<script src="http://cdn.jsdelivr.net/webshim/1.12.4/polyfiller.js"></script>
<script>
	webshims.setOptions('waitReady', false);
	webshims.setOptions('forms-ext', {types: 'date'});
	webshims.polyfill('forms forms-ext');
</script>