<!-- Navigation -->
<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
    <div class="container Completo">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand page-scroll" href="#page-top">
                <i class="glyphicon glyphicon-book ColorLetraEnca"></i>  <span class="light">Historias Medicas</span>
            </a>
        </div>
        <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
            <ul class="nav navbar-nav ColorLetraEnca">
                <li class="hidden">
                    <a href="#page-top"></a>
                </li>
                <?php if ($permiso == 'invitado') { ?>
                <li>
                    <a class="page-scroll" href="/<?php echo trim($_SERVER['SCRIPT_NAME'], "/index.php"); ?>/Login">Ingresar</a>
                </li>
                <li>
                    <a class="page-scroll" href="/<?php echo trim($_SERVER['SCRIPT_NAME'], "/index.php"); ?>/Registrar">Registrar</a>
                </li>
                <?php } else { ?>
                <li>
                    <a class="page-scroll" href="/<?php echo trim($_SERVER['SCRIPT_NAME'], "/index.php"); ?>/accion/cerrar">Cerrar</a>
                </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>
