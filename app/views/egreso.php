<div id="wrapper">
    <h1 class="Semi">INFORME DE EGRESO</h1>
    <div class="col-12">
        <div class="row">        
            <form onsubmit="return false">

                <div class="col-3">  
                    <label>
                        Fecha
                        <input type="date" placeholder="Fecha" id="fecha" name="fecha" tabindex="3">
                    </label>
                </div>
                <div class="col-3">
                    <label>
                        Cedula de Identidad
                        <input placeholder="Cedula de Identidad Nº:" id="cedula" name="cedula" tabindex="12">
                    </label>
                </div>

                <div class="col-3">
                    <label>
                        Nombre y Apellido
                        <input placeholder="Nombre del Paciente" id="datoPasiente" name="datoPasiente" tabindex="1">
                    </label>
                </div>


                <div class="col-1">
                    <label>
                        Descripcion
                        <input placeholder="Descripcion" id="egreso" name="egreso" tabindex="14">
                    </label>
                </div>
                <div class="col-1">
                    <label>
                        <center>Firma del Medico</center>
                        <input placeholder="" id="" name="" tabindex="14">
                    </label>
                </div>
                <div class="col-submit">
                    <button class="button btn btn-default btn-lg">Guardar</button>
                </div>                 
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
    elems.forEach(function(html) {
        var switchery = new Switchery(html);
});
</script> 