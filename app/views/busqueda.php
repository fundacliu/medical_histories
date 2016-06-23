<?php
if ($permiso == 'invitado') {
?>
<!-- Busqueda -->
<section class="content-section text-center">
    <div class="download-section">
        <div class="container" id="download">
            <form action="base" method="POST" class="col-lg-8 col-lg-offset-2">
                <h2 class="TituloGeneral Laila Completo">Busqueda</h2>
                
   				<div class="col-md-8 col-md-offset-2 ">
	                <div class="col-md-12">
						<input class="Barra" type="text" name="cedula" placeholder="Ingrese Identificador">
	                	<input type="submit" class="btn btn-default btn-lg" value="Buscar">
	                </div>
	            </div>

				<div class="col-md-8 col-md-offset-2 arriba">
				    <label>
				    	<select>
				    		<option>Adulto</option>
				    		<option>Niño</option>
				    	</select>
				    </label>
				</div>


            </form>
        </div>
    </div>
</section>
<?php
}
?>
<!--             <form action="base" method="POST" class="col-lg-8 col-lg-offset-2">
                <h2 class="TituloGeneral Laila Completo">Busqueda</h2>
				<input class="Barra" type="text" name="cedula" placeholder="Ingrese Identificador">

                <input type="submit" class="btn btn-default btn-lg" value="Buscar">
            </form> -->
