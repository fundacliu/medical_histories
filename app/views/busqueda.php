<?php
if ($permiso == 'invitado') {
?>
<!-- Busqueda -->
<section class="content-section text-center">
    <div class="download-section">
        <div class="container" id="download">
            <form action="base" method="POST" class="col-lg-8 col-lg-offset-2">
                <h2 class="TituloGeneral Laila Completo">Busqueda</h2>
				<input class="Barra" type="text" name="cedula" placeholder="Ingrese Identificador">
                <input type="submit" class="btn btn-default btn-lg" value="Buscar">
            </form>
        </div>
    </div>
</section>
<?php
}
?>