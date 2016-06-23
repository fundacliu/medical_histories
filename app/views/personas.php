	<?php echo $head; ?>
	<body class="fondo">
		<div class="register-box-body fondo">
		<div class="register-logo">
			<a href="#"><b></b>REGISTRO</a>
		</div>
        
			<form action="<?php echo ROOT; ?>/accion/persona" method="post">
				<input type="hidden" name="_token" value="">
				<div class="form-group has-feedback MarginArriba">
					<input type="text" class="form-control" placeholder="Nombres" name="nombres" value=""/>
					<span class="glyphicon glyphicon-user form-control-feedback"></span>
				</div>
				<div class="form-group has-feedback">
					<input type="text" class="form-control" placeholder="Apellidos" name="apellidos" value=""/>
					<span class="glyphicon glyphicon-user form-control-feedback"></span>
				</div>
				<div class="form-group has-feedback">
					<select class="form-control" name="tipo_cedula">
						<option selected value="1">Venezolano</option>
						<option value="2">Extranjero</option>
					</select>
					<span class="form-control-feedback"></span>
				</div>
				<div class="form-group has-feedback">
					<input type="text" class="form-control" placeholder="Cedula" name="cedula" value=""/>
					<span class="glyphicon glyphicon-floppy-saved form-control-feedback"></span>
				</div>
				<div class="form-group has-feedback">
					<input type="date" class="form-control" placeholder="Fecha de nacimiento" name="nacimiento" value=""/>
					<span class="form-control-feedback"></span>
				</div>
				<div class="form-group has-feedback">
					<input type="text" class="form-control" placeholder="Direccion" name="direccion" value=""/>
					<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
				</div>
				<div class="form-group has-feedback">
					<input type="text" class="form-control" placeholder="profesion" name="profesion" value=""/>
					<span class="glyphicon glyphicon-education form-control-feedback"></span>
				</div>
				<div class="form-group has-feedback">
					<input type="text" class="form-control" placeholder="Donde nacio" name="donde_nacio" value=""/>
					<span class="glyphicon glyphicon-globe form-control-feedback"></span>
				</div>
				<div class="form-group has-feedback">
					<select class="form-control" name="sexo">
						<option selected value="1">Masculino</option>
						<option value="2">Fenenino</option>
					</select>
					<span class="form-control-feedback"></span>
				</div>
				<div class="row MarginArriba">
					<div class="col-xs-8">
						<div class="MarginAbajo">
							<a href="login" class="text-center">Ya Tienes Cuenta? Ingresa</a>       
						</div>
					</div><!-- /.col -->
					<div class="col-xs-4">
						<button type="submit" class="btn btn-default btn-lg">Registrar</button>
					</div><!-- /.col -->
				</div>
			</form>
		</div><!-- /.form-box -->
	</body>

	<?php echo $script; ?>