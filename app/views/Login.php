	<?php echo $head; ?>
	<body class="fondo">
		<div class="login-box-body fondo">
			<div class="login-logo">
				<a href="#"><b></b>INICIAR SESION</a>
			</div><!-- /.login-logo -->
			<form action="/<?php echo trim($_SERVER['SCRIPT_NAME'], "/index.php"); ?>/accion/login" method="post">
				<input type="hidden" name="_token" value="">
				<div class="form-group has-feedback MarginArriba">
					<input type="text" class="form-control" placeholder="Usuario" name="nick"/>
					<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
				</div>
				<div class="form-group has-feedback">
					<input type="password" class="form-control" placeholder="Password" name="password"/>
					<span class="glyphicon glyphicon-lock form-control-feedback"></span>
				</div>
				<div class="row MarginArriba">
					<div class="col-xs-8">
						<div class="MarginAbajo">
							<a href="Recuperar">No Recuerdas Tu Contraseña?</a><br>
							<a href="Registrar" class="text-center">No Posees Cuenta? Registrate!</a>
						</div>
					</div><!-- /.col -->
					<div class="col-xs-4">
						<button type="submit" class="button">Acceder</button>
					</div><!-- /.col -->
				</div>
			</form>
		</div><!-- /.login-box-body -->
	</body>
	<?php echo $script; ?>