# Supel-Discos

Tienda online de música en formato físico desarollada en PHP utilizando el framework Symfony 5.

Además, se han utilizado las siguientes librerías:

+ Twig Templates
+ Doctrine 
+ Mailer
+ Notifier

Para el diseño de las interfaces se ha usado Bootstrap 5

## Iniciar el desarrollo

Para iniciar el desarollo al hacer ```git clone```, escribir en la consola ```composer install``` para instalar todas las librerias especificadas en el archivo [composer.json](composer.json)

#### Configurar la base de datos

Para configiurar la base de datos, en el archivo [.env](.env) hay que editar entre las líneas 26 y 29 para personalizar la conexión a la base de datos que tengamos instalada.

La estructura se encuentra en el archivo [structure.sql](/sql/structure.sql). Simplemente la importamos y empezamos a crear elementos.

