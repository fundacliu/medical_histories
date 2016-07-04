## Sistema de historias médicas para el Fundacliu

Este sistema fue creado bajo la tarea de llevar un control automatico de las historias medicas, y llevar a cabo una gestión mas rápida y eficiente

## Descargar

si usted es un usuario poco experimentado les recomendamos instalar el siguiente stack

* [XAMPP](https://www.apachefriends.org/es/download.html) - XAMPP es el entorno más popular de desarrollo con PHP
* [Git](https://git-scm.com/downloads) - Git es un sistema de control de versiones libre y de código abierto diseñado para manejar todo, desde pequeñas a proyectos muy grandes con rapidez y eficacia
* [Composer](https://getcomposer.org/doc/00-intro.md) - Composer es una herramienta para la gestión de la dependencia en PHP. Le permite importar las bibliotecas de su proyecto depende y administrar (instalar / actualizar) sus dependencias por usted


## Instalación 

para la instalacion de el sistema de historias médicas se requiere tener el modulo descomentado "rewrite_module" y además agregar el directorio a usar permiso de sobrescritura  "AllowOverride all" en su httpd.conf, y además en su php.ini activar el driver PDO a usar para que Choco ORM pueda funcionar, actualmente es el driver de MySQL

por otra parte los directorios que apache escucha varian segun el sistema operativo o el stack instalado, estos son los directorias basicos

* Apache de Linux - /srv/http o /var/www
* XAMPP para Linux - /opt/lampp/htdocs
* XAMPP para Windows - C:\\xampp\htdocs


```bash
cd /srv/http
git clone https://github.com/fundacliu/medical_histories ./
composer install
```

## Debe agregar Choco ORM al PATH

* En Linux

```bash
PATH=$PATH:/srv/http/bin
```
* En Windows consulte este [tutorial](http://aprenderaprogramar.com/index.php?option=com_content&view=article&id=389:configurar-java-en-windows-variables-de-entorno-javahome-y-path-cu00610b&catid=68:curso-aprender-programacion-java-desde-cero&Itemid=188)

## Ahora es hora de generar nuestras entidades en la base de datos

con nuestro manejador de nuestro motor de base de datos preferido crearemos la base de datos medical_histories, seguido a esto ejecutaremos en nuestra terminal abierta, advertencia "orm insert" ejecuta DROP table

```bash
orm model
orm insert
```

## Desde ahora usted puede ejecutar el proyecto

Usted debe ejecutar apache según sea su sistema operativo y su instalación el procedimiento varia, le recomendamo que inserte los datos admin.sql para crear el primer usuario administrativo

## Framework

* [Flight](http://expressjs.com/) - Un micro-framework extensible para PHP

## Bibliotecas

* Choco ORM - Un ORM orientado a la autogeneracion de código y al patrón Active Record
* Choco POST - un pequeño modulo orientado a reducir las validaciones recibida por el método POST