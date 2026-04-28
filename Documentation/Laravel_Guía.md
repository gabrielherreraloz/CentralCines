# Guia de uso e instalación de laravel

## Entorno
1. Instalar composer para gestionar las dependencias de php con laravel: **composer install**
2. Copiar el .env ejemplo en local:  **cp .env.example .env**
3. Generar la clave de la aplicación: **php artisan key:generate**

## Base de datos
4. Crear una base de datos vacía: **touch database/database.sqlite**
5. Editar el .env para que los datos coincidan con los personales.
6. Migrar los datos a la base de datos: **php artisan migrate:fresh --seed**
7. Lanzar el servidor: **php artisan serve**
8. Entrar en **http://127.0.0.1:8000** en el navegador.