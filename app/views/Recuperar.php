	<?php echo $head; ?>
	<body class="fondo">
		<div class="register-box-body fondo">
		<div class="register-logo">
			<a href="#"><b></b>RECUPERAR CONTRASEÑA</a>
		</div>
			<form action="#" method="post">
				<input type="hidden" name="_token" value="">

				<div class="form-group has-feedback">
					<input type="email" class="form-control" placeholder="Email" name="email" value=""/>
					<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
				</div>
				
                <div class="row MarginArriba">
                    <div class="col-xs-8">
                        <div class="MarginAbajo MarginArriba">
                            <a href="Login" class="text-center">Ya Tienes Cuenta? Ingresa</a> <br>      
                            <a href="Registrar" class="text-center">No Posees Cuenta? Registrate!</a>
                        </div>
                    </div><!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="button ">Enviar</button>
                    </div><!-- /.col -->
                </div>
			</form>
		</div><!-- /.form-box -->
	</body>


	<?php echo $script; ?>