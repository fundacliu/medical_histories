<div id="wrapper">
    <h1 class="Semi">HISTORIA CLINICA - PARTE I</h1>
    <div class="col-12">
        <div class="row">        
            <form onsubmit="return false">

                <div class="col-2">    
                    <label>
                        Nombres
                        <input placeholder="Nombres" id="nombres" name="nombres" tabindex="4">
                    </label>
                </div>
                <div class="col-2">  
                    <label>
                        Apellidos
                        <input placeholder="Apellidos" id="apellido" name="apellido" tabindex="2">
                    </label>
                </div>
                <div class="col-4">
                    <label>
                        Edad
                        <input placeholder="Edad" id="edad" name="edad" tabindex="8">
                    </label>
                </div>
                <div class="col-2">  
                    <label>
                        Lugar y Fecha de Nacimiento
                        <input placeholder="Lugar y Fecha de Nacimiento" id="lugarFecha" name="lugarFecha" tabindex="7">
                    </label>
                </div>
                <div class="col-4">  
                    <label>
                        Procedencia
                        <input type="text" placeholder="Procedencia por Estado" id="procedencia" name="procedencia" tabindex="3">
                    </label>
                </div>
                <div class="col-2">  
                    <label>
                        Nacionalidad
                        <input type="text" placeholder="Nacionalidad" id="nacionalidad" name="nacionalidad" tabindex="3">
                    </label>
                </div>
                <div class="col-2">  
                    <label>
                        S.S.O u Otros
                        <input type="text" placeholder="S.S.O u Otros" id="sso" name="sso" tabindex="3">
                    </label>
                </div>

               <div class="col-2">  
                    <label>
                        Direccion
                        <input placeholder="Direccion Actual Completa" id="direccion" name="direccion" tabindex="9">
                    </label>
                </div>                
                <div class="col-2">  
                    <label>
                        Parentesco
                        <input type="text" placeholder="Parentesco" id="parentesco" name="parentesco" tabindex="3">
                    </label>
                </div>
               <div class="col-2">  
                    <label>
                        Direccion y Telefono
                        <input placeholder="Direccion y Telefono" id="dirTLF" name="dirTLF" tabindex="9">
                    </label>
                </div>                
                <div class="col-2">  
                    <label>
                        Fecha de Admision
                        <input type="text" placeholder="Fecha de Admision" id="admision" name="admision" tabindex="3">
                    </label>
                </div>  



                <div class="col-1">  
                    <label>
                        Motivo
                        <input type="text" placeholder="Motivo de la Admision" id="motivo" name="motivo" tabindex="3">
                    </label>
                </div>
                <div class="col-1">  
                    <label>
                        Enfermedad Actual
                        <input type="text" placeholder="Relato conciso y completo" id="relato" name="relato" tabindex="3">
                    </label>
                </div>
                <div class="col-1">  
                    <label>
                        Diagnostico de Admision
                        <input type="text" placeholder="Diagnostico" id="diagnostico" name="diagnostico" tabindex="3">
                    </label>
                </div>
                <div class="col-2">  
                    <label>
                        Firma del Medico de Admision
                        <input type="text" placeholder="" id="medicoAdmision" name="medicoAdmision" tabindex="3">
                    </label>
                </div>
                <div class="col-2">  
                    <label>
                        Firma del Jefe de Servicios
                        <input type="text" placeholder="" id="JefeServicio" name="JefeServicio" tabindex="3">
                    </label>
                </div>



<!-- FALTA -->

               
                <div class="col-1">  
                    <label>Diagnostico Clinico Final
                        <input type="text" placeholder="Diagnostico" id="diagnosticoFinal" name="diagnosticoFinal" tabindex="3">
                    </label>
                </div>
                <div class="col-1">  
                    <label>Intervencion o Tratamiento
                        <input type="text" placeholder="Intervencion o Tratamiento" id="InterTrata" name="InterTrata" tabindex="3">
                    </label>
                </div>


                <div class="col-3">  
                    <label>Fecha Salida
                        <input type="date" placeholder="" id="salidaFecha" name="salidaFecha" tabindex="3">
                    </label>
                </div>

                <div class="col-3">  
                    <label>Hora
                        <input type="text" placeholder="" id="horaSalida" name="horaSalida" tabindex="3">
                    </label>
                </div>

                <div class="col-3">  
                    <label>Firma del Jefe de Departamento
                        <input type="text" placeholder="" id="JefeDeparta" name="JefeDeparta" tabindex="3">
                    </label>
                </div>



                <div class="col-1">
                    <label>Diagnostico Anatomo-Patologo

					</label>
                </div>

                <div class="col-2">
                    <label>Biopsia</label>
                    <center style="position:relative; margin-bottom:8px;"><input type="checkbox" class="js-switch"></center>
                </div>
                <div class="col-2">
                    <label>Autopsia</label>
                    <center style="position:relative; margin-bottom:8px;"><input type="checkbox" class="js-switch"></center>
                </div>



                <div class="col-submit">
                    <button class="button btn btn-default btn-lg">Guardar</button>
                </div>     


   <a data-toggle="modal" href="#example" class="btn btn-primary btn-large">
      Abrir ventana modal
   </a>
   <div id="example" class="modal fade">
   <div class="modal-dialog">   
      <div class="modal-content"> 
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
            ×
            </button>
            <h3>Cabecera de la ventana</h3>
         </div>
         <div class="modal-body">
            <h4>Texto de la ventana</h4>
            <p>Mas texto en la ventana.</p>                
         </div>
         <div class="modal-footer">
            <a href="#" class="btn btn-success">Guardar</a>
            <a href="#" data-dismiss="modal" class="btn">Cerrar</a>
         </div>
      </div>
   </div>
</div>



                            
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