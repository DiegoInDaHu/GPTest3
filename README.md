# PHP Dashboard Example

Este proyecto muestra una configuracion basica de PHP con MySQL y un dashboard con menu lateral.

## Base de datos

El archivo `sql/init.sql` contiene el script para crear la base de datos `GPTest3` y una tabla ejemplo `users`.

```
mysql -u root -p < sql/init.sql
```

La configuracion de conexion se encuentra en `config/database.php`, utilizando el usuario `root` y la contraseña `terminal`.

## Requisitos

Necesitas tener PHP 8.3 instalado con la extensión de MySQL (`mysqli`/`pdo_mysql`).
En distribuciones basadas en Debian/Ubuntu puedes instalarlo ejecutando:

```bash
sudo apt-get install php php-mysql
```

Verifica la instalación con `which php`.

## Dependencias locales

Las librerías externas (Bootstrap, jQuery y DataTables) se encuentran en la
carpeta `packages`. Todos los archivos HTML están configurados para cargarlas
desde ahí en lugar de usar CDNs.

## Comandos de puesta en marcha

El archivo `setup_commands.txt` contiene los pasos básicos para preparar un
entorno desde cero.

## Tests

Para comprobar la sintaxis de los archivos PHP puedes ejecutar:

```bash
php -l public/settings.php
php -l public/login.php
php -l public/dashboard.php
```

Si alguno de estos comandos falla, asegúrate de tener PHP instalado y revisa el
código correspondiente.

## Ejecucion

Coloca los archivos en un servidor web con soporte PHP (por ejemplo Apache) y abre `public/login.php` para iniciar sesión con el usuario `admin@example.com` y contraseña `admin`. Tras autenticarte serás redirigido al dashboard.
