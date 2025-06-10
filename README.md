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

## Ejecucion

Coloca los archivos en un servidor web con soporte PHP (por ejemplo Apache) y abre `public/login.php` para iniciar sesión con el usuario `admin@example.com` y contraseña `admin`. Tras autenticarte serás redirigido al dashboard.
