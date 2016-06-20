	<?php echo $head; ?>
	<body class="fondo">
		<div class="register-box-body fondo">
		<div class="register-logo">
			<a href="#"><b></b>REGISTRATE</a>
		</div>
			<form action="/<?php echo trim($_SERVER['SCRIPT_NAME'], "/index.php"); ?>/accion/registro" method="post">
				<input type="hidden" name="_token" value="">
				<div class="form-group has-feedback MarginArriba">
					<input type="text" class="form-control" placeholder="Usuario" name="nombres" value=""/>
					<span class="glyphicon glyphicon-user form-control-feedback"></span>
				</div>
				<div class="form-group has-feedback">
					<input type="email" class="form-control" placeholder="Email" name="correo" value=""/>
					<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
				</div>
				<div class="form-group has-feedback">
					<input type="text" class="form-control" placeholder="cedula" name="cedula" value=""/>
					<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
				</div>
				<div class="form-group has-feedback">
					<input type="password" class="form-control" placeholder="Password" name="pass"/>
					<span class="glyphicon glyphicon-lock form-control-feedback"></span>
				</div>
				<div class="form-group has-feedback">
					<input type="password" class="form-control" placeholder="Repetir password" name="pass2"/>
					<span class="glyphicon glyphicon-log-in form-control-feedback"></span>
				</div>
				<div class="row MarginArriba">
					<div class="col-xs-8">
						<div class="MarginAbajo">
								<a href="Login" class="text-center">Ya Tienes Cuenta? Ingresa</a>       
						</div>
					</div><!-- /.col -->
					<div class="col-xs-4">
						<button type="submit" class="button">Acceder</button>
					</div><!-- /.col -->
				</div>
			</form>
		</div><!-- /.form-box -->
	</body>

	<?php echo $script; ?>