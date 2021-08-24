# Portal de noticias

Portal de noticias construido con PHP - Javascript - MySQL

## Requerimientos del ambiente

Para poder instalar y ejecutar este proyecto, el ambiente donde se ponga debe cumpliar las siguientes condiciones:

- PHP >= 7.2.5
- BCMath PHP Extension
- Ctype PHP Extension
- Fileinfo PHP extension
- JSON PHP Extension
- Mbstring PHP Extension
- OpenSSL PHP Extension
- PDO PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension
- MySQL Server 5.7
- Git
- Composer
- NodeJs
- NPM

## Instalación

Se debe seguir la siguiente secuencia de comandos y acciones (Terminal de comandos Linux, Unix o CMD) para tener una correcta ejecución del proyecto.

```bash
git clone https://github.com/dsalazar93/newsportal
cd newsportal
composer install
```
- Ejecutar en MySQL Server el dump de la base de datos.

- Copiar y pegar el archivo **.env** entregado

- Luego se deben cambiar los siguientes valores dentro del archivo **.env**:

```env
DB_USERNAME=
DB_PASSWORD=
```
Los valores **DB_USERNAME** y **DB_PASSWORD** deben ser definido de acuerdo a sus acceso de MySQL Server.

Generar clave de la aplicación y ejecutar servidor
```bash
php artisan key:generate
php artisan serve
```


Con estos pasos realizados ya se pueden hacer las pruebas desde navegador en **http://localhost:8000**

## Observaciones sobre la construcción del proyecto

- El diseño frontend de la aplicación esta muy vinculado al uso de clases de la libreria Bootstrap y unos pocos archivos CSS.
- Las validaciones sobre la inserción de datos se pueden encontrar en el backend.
- Este proyecto al usar Laravel hace uso del patrón MVC para su contrucción y también aprovecha utilidades del ORM Eloquent.
- En el proyecto se cuenta con el archivo **model_newsportal.mwb** que se puede ejecutar con MySQL Workbench y encontrar el módelo relacional de la base de datos.
- Proyecto realizado por [dsalazar93](https://github.com/dsalazar93)