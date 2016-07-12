<div id="wrapper">
    <h1 class="Semi">INFORME DE INGRESO</h1>
    <div class="col-12">
        <div class="row">        
            <form method="POST" action="<?php echo ROOT; ?>/accion/ingreso">

                <div class="col-3">  
                    <label>
                        Fecha y hora
                        <input type="datetime-local" value="<?php echo $fecha; ?>" name="fecha" tabindex="3" readonly>
                    </label>
                </div>
                <div class="col-3">
                    <label>
                        Cedula de Identidad
                        
                        <input value="<?php echo $cedula; ?>" name="cedula" tabindex="12" readonly>
                    </label>
                </div>

                <div class="col-3">
                    <label>
                        Nombre y Apellido
                        <input placeholder="<?php echo $nombres . ' ' . $apellidos; ?>" id="DatosPasiente" tabindex="1" readonly>
                    </label>
                </div>
                <div class="col-1">
                    <label>
                        Descripcion
                        <textarea placeholder="Descripcion" id="descripcion" name="descripcion" tabindex="14" required></textarea>
                    </label>
                </div>
                <div class="col-3">
                    <label>
                        Departamentos
                        <select name="departamentos">
                            <?php 
                            foreach ($departamentos as $value) {
                                echo '<option value="' . $value['id'] . '">' . $value['departamento'] . '</option>';
                            }
                            ?>
                        </select>
                    </label>
                </div>
                <div class="col-3">
                    <label>Emergencia</label>
                    <center style="position:relative; margin-bottom:8px;"><input id="a" type="checkbox" name="emergencia" class="js-switch js-check-change"></center>
                </div>
                <div class="col-3">
                    <label>Consulta externa</label>
                    <center style="position:relative; margin-bottom:8px;"><input id="a" type="checkbox" name="externa" class="js-switch js-check-change"></center>
                </div>
                <div class="col-submit">

                    <input type="submit" class="btn btn-default btn-lg" value="Guardar" tabindex="3">    
                </div>    
                
                                <a class='boton' href='javascript:history.back(-1);'><i class="fa fa-reply" aria-hidden="true"></i></a>             
            </form>
        </div>
    </div>
</div>
<!--script type="text/javascript">
var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
    elems.forEach(function(html) {
        var switchery = new Switchery(html);
});
</script-->