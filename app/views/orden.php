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
                    <button class="button btn btn-default btn-lg">Guardar</button>
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