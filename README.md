<a name="top"></a>
# Evaluación perfil Backend PHP/MySQL
 
## Test 3: API REST
* [Introducción](#item1)
* [Métodos](#item2)
* [Construido con 🛠️](#item3)
* [Instalación 🔧](#item4)
 
Lorem ipsum dolor
 
<a name="item1"></a>
### Introducción
 
Crear las bases de un API REST simple.
- La codificación, y eventuales comentarios, deben realizarse en inglés.
- Puede desarrollarse en PHP 7+ puro o utilizando algún framework o librería de forma libre.
- Debe basarse en la definición de tablas (SQL ejemplo) mencionado en el punto 2.
Los productos están almacenados en la tabla ‘products’.
Puede simplificarse el esquema para eliminar tablas o campos no utilizados.
- No es necesaria autenticación pero se puede agregar o sugerir.
- Debe contener los métodos solicitados
 
[Subir](#top)
 
<a name="item2"></a>
### Métodos
```
GET /products 
``` 
Devuelve el listado de productos existentes, cada uno con la siguiente estructura:
 ```
{
    "id": <id>,
    "name": <name>,
    "description": <short_description>,
    "media": <array de strings product_media.url>,
    "status": <status>,
    "createdAt": <created_at>
    "updatedAt": <updated_at>
}
``` 
Adicionalmente, puede recibir por URL un parámetro opcional “supplierId” (numérico) que
filtrará los resultados por columna “supplier_id”:

```
GET /products?supplierId=2
``` 
 
[Subir](#top)
 
<a name="item3"></a>
### Construido con 🛠️

* [Symfony](https://symfony.com/) - a PHP frameworkt
* [Doctrine](https://www.doctrine-project.org/) - Object Relational Mapper
* [API Platform](https://api-platform.com/) - API Platform Framework.
* [Mariadb](https://mariadb.org/) - The open source relational database
* [Docker](https://www.docker.com/) - Docker is an operating system (or runtime) for containers.
 
 
[Subir](#top)
 
<a name="item4"></a>
### Instalación 🔧 
 
- Nota: Se uso el siguiente Scaffold construido con Docker: https://github.com/csena72/symfony_docker


_Clonar el proyecto y configurar la db en el archivo .env_  
```
DATABASE_URL="mysql://<user_name>:<pass>@<host>:<port>/<database_name>?serverVersion=11.1.2-MariaDB&charset=utf8mb4"
```
_Correr los comandos para instalar las dependencias, crear la db, migraciones y la data fake._

```
composer install
symfony console doctrine:database:create
symfony console doctrine:migrations:migrate
symfony console doctrine:fixtures:load

```

La API se levanta en:

```
ej.: http://localhost:8080/api
```
 
[Subir](#top)