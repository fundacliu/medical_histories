    <div id="wrapper">
        <h1 class="Semi">HISTORIA QUIRURGICA</h1>
        <form onsubmit="return false">
            <div class="col-2">
                <label>
                    Departamento
                    <input placeholder="A que departamento se dirige?" id="departamento" name="departamento" tabindex="1">
                </label>
            </div>
            <div class="col-2">    
                <label>
                    Nombres
                    <input placeholder="Nombres" id="nombres" name="nombres" tabindex="1">
                </label>
            </div>
            <div class="col-2">  
                <label>
                    Apellidos
                    <input placeholder="Apellidos" id="apellido" name="apellido" tabindex="1">
                </label>
            </div>
            <div class="col-2">      
                <label>Sexo</label>
                <center class="check"><input type="checkbox" class="js-switch"></center>
            </div>
            <div class="col-3">  
                <label>
                    Fecha
                    <input type="date" placeholder="Fecha" id="fecha" name="fecha" tabindex="1">
                </label>
            </div>
            <div class="col-3">
                <label>
                    Phone Number
                    <input placeholder="What is the best # to reach you?" id="phone" name="phone" tabindex="3">
                </label>
            </div>
            <div class="col-3">
                <label>
                    Email
                    <input placeholder="What is your e-mail address?" id="email" name="email" tabindex="4">
                </label>
            </div>
            <div class="col-2">
                <label>
                Availability
                    <select tabindex="5">
                        <option>5-15 hrs per week</option>
                        <option>15-30 hrs per week</option>
                        <option>30-40 hrs per week</option>
                    </select>
                </label>
            </div>
            <div class="col-2">
                <label>
                    Skills
                    <input placeholder="List a few of your primary skills" id="skills" name="skills" tabindex="6">
                </label>
            </div>
            <div class="col-3">
                <label>
                    Yrs Experience
                    <input placeholder="How many years of experience?" id="experience" name="experience" tabindex="7">
                </label>
            </div>
            <div class="col-3">
                <label>Contact References?</label>
                <center class="check"><input type="checkbox" class="js-switch"></center>
            </div>
            <div class="col-3 switch">
                <label>E-mail Updates?</label>
                <center class="check"><input type="checkbox" class="js-switch"></center>
            </div>
            <div class="col-submit">
                <button class="button btn btn-default btn-lg">Guardar</button>
            </div>
        </form>
    </div>
    <script type="text/javascript">
    var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
        elems.forEach(function(html) {
            var switchery = new Switchery(html);
    });
    </script>