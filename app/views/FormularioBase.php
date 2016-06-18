<div id="wrapper">
    <h1 class="Semi">HISTORIA QUIRURGICA</h1>
    <div class="col-12">
        <div class="row">        
            <form onsubmit="return false">
            
                <div class="col-1">
                    <label>
                        Departamento
                        <input placeholder="A que departamento se dirige?" id="departamento" name="departamento" tabindex="1">
                    </label>
                </div>
                <div class="col-2">  
                    <label>
                        Apellidos
                        <input placeholder="<?php echo $persona->apellidos(); ?>" id="apellido" name="apellido" tabindex="2" disabled>
                    </label>
                </div>
                <div class="col-2">  
                    <label>
                        Fecha
                        <input type="text" placeholder="<?php echo date('d/m/Y') ?>;  " id="fecha" name="fecha" tabindex="3" disabled>
                    </label>
                </div>
                <div class="col-2">    
                    <label>
                        Nombres
                        <input placeholder="<?php echo $persona->nombres(); ?>" id="nombres" name="nombres" tabindex="4" disabled>
                    </label>
                </div>
                <div class="col-2">  
                    <label>
                        Hora
                        <input type="text" placeholder="<?php echo date('h:i:s A'); ?>" id="hora" name="hora" tabindex="5">
                    </label>
                </div>
                <div class="col-3">      
                    <label>Sexo</label>
                    <center class="check">
                        <select disabled>
                            <option></option>
                        </select>
                    <input type="checkbox" class="js-switch" tabindex="6"></center>
                </div>
                <div class="col-3">  
                    <label>
                        Lugar y Fecha de Nacimiento
                        <input placeholder="Lugar y Fecha de Nacimiento" id="lugarFecha" name="lugarFecha" tabindex="7" disabled>
                    </label>
                </div>
                <div class="col-3">
                    <label>
                        Edad
                        <input placeholder="<?php echo $edad; ?>" id="edad" name="edad" tabindex="8" disabled>
                    </label>
                </div>

               <div class="col-3">  
                    <label>
                        Ubicacion
                        <input placeholder="Ubicacion" id="ubicacion" name="ubicacion" tabindex="9" disabled>
                    </label>
                </div>
                <div class="col-3">  
                    <label>
                        Numero de Historia
                        <input placeholder="Numero de Historia" id="historia" name="historia" tabindex="10" >
                    </label>
                </div>
                <div class="col-3">
                    <label>
                        Clasificacion Economica
                        <input placeholder="Clasificacion Economica" id="clasificacion" name="clasificacion" tabindex="11">
                    </label>
                </div>

                <div class="col-2">
                    <label>
                        Cedula de Identidad
                        <input placeholder="<?php echo $persona->apellidos(); ?>" id="cedula" name="cedula" tabindex="12" disabled>
                    </label>
                </div>
                <div class="col-2">  
                    <label>
                        Procedencia
                        <input placeholder="Procedencia" id="procedencia" name="procedencia" tabindex="13" disabled>
                    </label>
                </div>
                <div class="col-1">
                    <label>
                        Direccion Actual
                        <input placeholder="<?php echo $persona->direccion(); ?>" id="direccion" name="direccion" tabindex="14" disabled>
                    </label>
                </div>
                <div class="col-submit">
                    <button class="button btn btn-default btn-lg">Guardar</button>
                </div>                 
            </form>
        </div>
    </div>
</div>

        <!--    <div class="col-2">
                    <label>
                    Availability
                        <select tabindex="5">
                            <option>5-15 hrs per week</option>
                            <option>15-30 hrs per week</option>
                            <option>30-40 hrs per week</option>
                        </select>
                    </label>
                </div>-->


    
    <script type="text/javascript">
    var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
        elems.forEach(function(html) {
            var switchery = new Switchery(html);
    });
    </script>       
