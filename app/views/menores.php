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
					<input type="date" class="form-control" placeholder="Fecha de nacimiento" name="nacimiento" value=""/>
					<span class="form-control-feedback"></span>
				</div>
				<div class="form-group has-feedback">
					<input type="text" class="form-control" placeholder="Cedula del padre" name="padre" id="input_padre" onblur="padres('padre')" value=""/>
					<span class="glyphicon glyphicon-user form-control-feedback"></span>
				</div>
				<div class="form-group has-feedback">
					<input type="text" class="form-control" placeholder="Cedula del madre" name="madre" id="input_madre" onblur="padres('madre')" value=""/>
					<span class="glyphicon glyphicon-user form-control-feedback"></span>
				</div>
				<div class="form-group has-feedback">
					<input type="text" class="form-control" placeholder="Direccion" name="direccion" value=""/>
					<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
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
					<div class="col-xs-4">
						<a id="padre" href="<?php echo ROOT; ?>/base/" target="_blank" class="button btn btn-default btn-lg">Padre</a>
					</div><!-- /.col -->
					<div class="col-xs-4">
						<a id="madre" href="<?php echo ROOT; ?>/base/" target="_blank" class="button btn btn-default btn-lg">Madre</a>
					</div><!-- /.col -->
					<div class="col-xs-4">
						<button type="submit" class="button btn btn-default btn-lg">Registrar</button>
					</div><!-- /.col -->
				</div>
			</form>
		</div><!-- /.form-box -->
	</body>

	<?php echo $script; ?>