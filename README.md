# PHP Dashboard Example

Este proyecto muestra una configuracion basica de PHP con MySQL y un dashboard con menu lateral.

## Base de datos

El archivo `sql/init.sql` contiene el script para crear la base de datos `GPTest3` y una tabla ejemplo `users`.

```
mysql -u root -p < sql/init.sql
```

La configuracion de conexion se encuentra en `config/database.php`, utilizando el usuario `root` y la contraseña `terminal`.

## Ejecucion

Coloca los archivos en un servidor web con soporte PHP (por ejemplo Apache) y abre `public/dashboard.php` en tu navegador.
