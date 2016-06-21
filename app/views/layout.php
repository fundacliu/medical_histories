<!DOCTYPE html>
<html>
<head>
	<?php echo $head; ?>
</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top" <?php if (isset($headBase)) ?> class="fondo" <?php ; ?>>
	<?php if (isset($menuSuperior)) echo $menuSuperior; ?>
	<?php if (isset($header)) echo $header; ?>
	<?php if (isset($busqueda)) echo $busqueda; ?>
	<?php if (isset($FormularioBase)) echo $FormularioBase; ?>
	<?php if (isset($orden)) echo $orden; ?>
	<?php if (isset($registrar)) echo $registrar; ?>
	<?php if (isset($ingreso)) echo $ingreso; ?>
	<?php if (isset($egreso)) echo $egreso; ?>
	<?php if (isset($personas)) echo $personas; ?>
	<?php if (isset($enfermeria)) echo $enfermeria; ?>
	<?php if (isset($clinica)) echo $clinica; ?>
	<?php if (isset($laboratorio)) echo $laboratorio; ?>
	<?php if (isset($moduloEspecialista)) echo $moduloEspecialista; ?>
	<?php if (isset($evolucion)) echo $evolucion; ?>
	<?php if (isset($login)) echo $login; ?>
	<?php if (isset($registro)) echo $login; ?>
	<?php if (isset($script)) echo $script; ?>
</body>
</html>