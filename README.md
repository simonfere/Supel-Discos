# Supel-Discos

Tienda online de música en formato físico desarrollada en PHP utilizando el framework [Symfony 5](https://symfony.com/).

Además, se han utilizado las siguientes librerías:

+ [Twig Templates](https://twig.symfony.com/)
+ [Doctrine](https://www.doctrine-project.org/index.html) 
+ [EasyAdmin](https://symfony.com/bundles/EasyAdminBundle/current/index.html)

Para el diseño de las interfaces se ha usado [Bootstrap 5](https://getbootstrap.com/)

## Iniciar el desarrollo

Para iniciar el desarrollo al hacer ```git clone```, escribir en la consola ```composer install``` para instalar todas las librerías especificadas en el archivo [composer.json](composer.json). En el caso de que usemos el servidor [XAMPP](https://www.apachefriends.org/es/index.html), el proyecto tiene que estar ubicado en la carpeta C:\xampp\htdocs, y los servicios [Apache](https://www.apachefriends.org/index.html) y [MySQL](https://www.mysql.com/) tienen que estar operativos.

## Configurar la base de datos e inserción de datos

Para configurar la base de datos, en el archivo [.env](.env) hay que editar entre las líneas 26 y 29 para personalizar la conexión a la base de datos que tengamos instalada (no puede haber una base de datos creada anteriormente con el mismo nombre). Después, desde la consola, lanazmos el comando ```php bin/console doctrine:migrations:migrate``` para importar toda la estructura de la base de datos desde la última migración.

Para lanzar el servidor de Symfony, desde la consola escribimos ```symfony server:start```. Finalmente, nos registramos en la aplicación, y desde el gestor de base de datos local ([XAMPP](https://www.apachefriends.org/es/index.html), [DBeaver](https://dbeaver.io/) o [HeidiSQL](https://www.heidisql.com/)) asignamos al usuario el rol "ROLE_ADMIN", para que permita acceder a la parte de EasyAdmin.

Para acabar, insertamos los datos desde la ruta del administrador (127.0.0.1/admin).



