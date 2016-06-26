<script src="<?php echo ROOT; ?>/public/grayscale/js/jquery.js"></script>
<script src="<?php echo ROOT; ?>/public/grayscale/js/bootstrap.min.js"></script>
<script src="<?php echo ROOT; ?>/public/jquery/jquery.easing.min.js"></script>

<script src="<?php echo ROOT; ?>/public/grayscale/js/switchery.min.js"></script>
<!-- cdn for modernizr, if you haven't included it already -->
<script src="http://cdn.jsdelivr.net/webshim/1.12.4/extras/modernizr-custom.js"></script>
<!-- polyfiller file to detect and load polyfills -->
<script src="http://cdn.jsdelivr.net/webshim/1.12.4/polyfiller.js"></script>
<script>
	webshims.setOptions('waitReady', false);
	webshims.setOptions('forms-ext', {types: 'date'});
	webshims.polyfill('forms forms-ext');
</script>
<script src="<?php echo ROOT; ?>/public/grayscale/js/grayscale.js"></script>
<!--script src="<?php echo ROOT; ?>/public/jquery/bootstrap-modal.js"></script-->
<script>
	function padres(padre) {
		console.log("input_" + padre);
		var input_padre = document.getElementById("input_" + padre).value;
		var padre = document.getElementById(padre);
		padre.href = "<?php echo ROOT; ?>/historia/adultos/" + input_padre;
		//window.open("<?php echo ROOT; ?>/base/" + padre);

	}
</script>

<script type="text/javascript">
    var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
    elems.forEach(function(html) {
        var switchery = new Switchery(html);
    });
</script>
