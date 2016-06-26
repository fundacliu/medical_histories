<div id="wrapper">
    <h1 class="Semi">ORDEN MEDICA</h1>
    <div class="col-12">
        <div class="row">        
            <form onsubmit="return false">
                <div class="col-2">  
                    <label>
                        Fecha
                        <input type="date" placeholder="Fecha" id="fecha" name="fecha" tabindex="3">
                    </label>
                </div>
                <div class="col-2">  
                    <label>
                        Hora
                        <input type="text" placeholder="Hora" id="hora" name="hora" tabindex="5">
                    </label>
                </div>
                <div class="col-1">
                    <label>
                        Descripcion
                        <textarea placeholder="Descripcion" id="orden" name="orden" tabindex="14">
                            
                        </textarea>
              <!--          <input placeholder="Descripcion" id="ingreso" name="ingreso" tabindex="14"> -->
                    </label>
                </div>
                <div class="col-submit">
                    <a data-toggle="modal" href="#example">
                        <button class="button btn btn-default btn-lg">Guardar</button> 
                    </a>
                </div>    
                <div id="example" class="modal fade">
                    <div class="modal-dialog">   
                        <div class="modal-content"> 
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                    ×
                                </button>
                                <h3>Guardado Exitoso!</h3>
                            </div>
                            <div class="modal-body">
                                <h4>Su historia se guardo sin problemas</h4>
                            </div>
                            <div class="modal-footer">
                                <a href="#" data-dismiss="modal" class="btn btn-success">Cerrar</a>
                            </div>
                        </div>
                    </div>
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