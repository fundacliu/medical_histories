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
                        <input placeholder="Apellidos" id="apellido" name="apellido" tabindex="2">
                    </label>
                </div>
                <div class="col-2">  
                    <label>
                        Fecha
                        <input type="date" placeholder="Fecha" id="fecha" name="fecha" tabindex="3">
                    </label>
                </div>
                <div class="col-2">    
                    <label>
                        Nombres
                        <input placeholder="Nombres" id="nombres" name="nombres" tabindex="4">
                    </label>
                </div>
                <div class="col-2">  
                    <label>
                        Hora
                        <input type="text" placeholder="Hora" id="hora" name="hora" tabindex="5">
                    </label>
                </div>
                <div class="col-3">      
                    <label>Sexo</label>
                    <center class="check"><input type="checkbox" class="js-switch" tabindex="6"></center>
                </div>
                <div class="col-3">  
                    <label>
                        Lugar y Fecha de Nacimiento
                        <input placeholder="Lugar y Fecha de Nacimiento" id="lugarFecha" name="lugarFecha" tabindex="7">
                    </label>
                </div>
                <div class="col-3">
                    <label>
                        Edad
                        <input placeholder="Edad" id="edad" name="edad" tabindex="8">
                    </label>
                </div>

               <div class="col-3">  
                    <label>
                        Ubicacion
                        <input placeholder="Ubicacion" id="ubicacion" name="ubicacion" tabindex="9">
                    </label>
                </div>
                <div class="col-3">  
                    <label>
                        Numero de Historia
                        <input placeholder="Numero de Historia" id="historia" name="historia" tabindex="10">
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
                        <input placeholder="Cedula de Identidad Nº:" id="cedula" name="cedula" tabindex="12">
                    </label>
                </div>
                <div class="col-2">  
                    <label>
                        Procedencia
                        <input placeholder="Procedencia" id="procedencia" name="procedencia" tabindex="13">
                    </label>
                </div>
                <div class="col-1">
                    <label>
                        Direccion Actual
                        <input placeholder="Direccion Actual" id="direccion" name="direccion" tabindex="14">
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
