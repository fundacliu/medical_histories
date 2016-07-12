<?php
if ($permiso == 3) {
?>
<!-- Busqueda -->
<section class="content-section text-center">
    <div class="download-section">
        <div class="container" id="download">
            <form action="/accion/autorizar" method="POST" class="col-lg-8 col-lg-offset-2">
                <h2 class="TituloGeneral Laila Completo">Autorizar</h2>
                
   				<div class="col-md-8 col-md-offset-2 ">
	                <div class="col-md-12">
						<input class="Barra" type="text" name="cedula" placeholder="Ingrese Cedula" tabindex="1">
	                	<input type="submit" class="btn btn-default btn-lg" value="Guardar" tabindex="3">
	                </div>
	            </div>

	            <div class="col-md-8 col-md-offset-2 arriba">
	                <label>
	                    <select name="permiso" tabindex="2">
	                        <option value="2">Doctor</option>
	                        <option value="4">Enfermera</option>
	                        <option value="3">Historias Medicas</option>
	                        <option value="1">Usuario</option>
	                    </select>
	                </label>
	            </div>

            </form>
        </div>
    </div>
</section>
<?php
}
else {
?>
<script language=Javascript> location.pathname = '<?php echo ROOT; ?>/'; </script>; 
<?php
}
?>