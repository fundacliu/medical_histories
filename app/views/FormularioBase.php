<div id="wrapper">
    <h1 class="Semi">HISTORIA QUIRURGICA</h1>
    <div class="col-12">
        <div class="row">        
            <form onsubmit="return false">
            
                <div class="col-1">
                    <label>
                        Departamento
                        <input required placeholder="A que departamento se dirige?" id="departamento" name="departamento" tabindex="1">
                    </label>
                </div>
                <div class="col-2">  
                    <label>
                        Apellidos
                        <input required placeholder="<?php echo $persona->apellidos(); ?>" id="apellido" tabindex="2" readonly>
                    </label>
                </div>
                <div class="col-2">  
                    <label>
                        Fecha
                        <input type="number" required placeholder="<?php echo date('d/m/Y'); ?>" id="fecha" tabindex="3" readonly>
                    </label>
                </div>
                <div class="col-2">    
                    <label>
                        Nombres
                        <input required placeholder="<?php echo $persona->nombres(); ?>" id="nombres" tabindex="4" readonly>
                    </label>
                </div>
                <div class="col-2">  
                    <label>
                        Hora
                        <input type="text" required placeholder="<?php echo date('h:i:s A'); ?>" id="hora" tabindex="5" readonly>
                    </label>
                </div>
                <div class="col-3">      
                    <label>
                        Sexo
                        <select tabindex="6" readonly>
                            <option>Masculino</option>
                            <option>Fenenino</option>
                        </select>
                    </label>
                </div>
                <div class="col-3">  
                    <label>
                        Lugar de nacimiento
                        <input required placeholder="<?php echo $persona->Lugar_nacimiento(); ?>" id="lugarFecha" name="lugarFecha" tabindex="7" readonly>
                    </label>
                </div>
                <div class="col-3">
                    <label>
                        Edad
                        <input type="number" required placeholder="<?php echo $edad;?>" id="edad" tabindex="8" readonly>
                    </label>
                </div>

               <div class="col-3">  
                    <label>
                        Ubicacion
                        <input required placeholder="Ubicacion" id="ubicacion" name="ubicacion" tabindex="9" readonly>
                    </label>
                </div>
                <div class="col-3">  
                    <label>
                        Numero de Historia
                        <input type="number" required placeholder="Numero de Historia" id="historia" name="historia" tabindex="10" >
                    </label>
                </div>
                <div class="col-3">
                    <label>
                        Clasificacion Economica
                        <input required placeholder="Clasificacion Economica" id="clasificacion" name="clasificacion" tabindex="11">
                    </label>
                </div>

                <div class="col-2">
                    <label>
                        Cedula de Identidad
                        <input required type="number" placeholder="<?php echo $persona->apellidos(); ?>" id="cedula" name="cedula" tabindex="12" readonly>
                    </label>
                </div>
                <div class="col-2">  
                    <label>
                        Procedencia
                        <input required placeholder="Procedencia" id="procedencia" name="procedencia" tabindex="13" readonly>
                    </label>
                </div>
                <div class="col-1">
                    <label>
                        Direccion Actual
                        <input required placeholder="<?php echo $persona->direccion(); ?>" id="direccion" name="direccion" tabindex="14" readonly>
                    </label>
                </div>
                <div class="col-submit">
               
                    <a data-toggle="modal" href="<?php echo ROOT; ?>">
                        <button class="button btn btn-default btn-lg">Aceptar</button> 
                    </a>
                </div>    
                <a class='boton' href='javascript:history.back(-1);'><i class="fa fa-reply" aria-hidden="true"></i></a>                 
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


    
    <!--script type="text/javascript">
    var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
        elems.forEach(function(html) {
            var switchery = new Switchery(html);
    });
    </script-->