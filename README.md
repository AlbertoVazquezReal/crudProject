## CRUD API-REST

### REQUISITOS PARA LA INSTALACIÓN

-Ubuntu 22.04.3 LTS
-PHP 8.1.2
-mariadb Ver 15.1
    -Datos de configuración incluídos en el .env
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=laravel
        DB_USERNAME=root
        DB_PASSWORD=123
-Composer 2.2.6
-Laravel Framework 10.25.1
### INSTRUCCIONES PARA LA INSTALACIÓN

-Clonar el proyecto mediante el siguiente comando: 

"git clone https://github.com/AlbertoVazquezReal/crudProject.git"

-Cambiar a la rama CRUD_API-REST

-Desde la raíz del proyecto, ejecutar el comando "composer install".

-Dar permisos recursivos "777" a la carpeta del proyecto (crudProject).

-Desde la raíz del proyecto, ejecutar el comando "php artisan migrate".

-Desde la raíz del proyecto, ejecutar el comando "php artisan serve".

### INSTRUCCIONES PARA EJECUTAR TEST UNITARIOS

-Desde la raíz del proyecto, ejecutar el comando "sh execTest.sh", esto realizará un "migrate:rollback" para limpiar la BBDD, posteriormente realizará un "migrate" para generar el esquema necesario. A continuación, ejecutará los test unitarios reflejados en el fichero "tests/Unit/TestCase.php"

### EXPLICACIONES

Para este ejercicio he codificado un CRUD API-REST en Laravel que permite listar, mostrar, actualizar o eliminar leads de la tabla de base de datos "leads". 

Para ello, a nivel BBDD, he generado mediante los Migrations de Laravel un esquema en el que al modificar/eliminar un "email" de la tabla "leads", se ejecute en cascada la misma acción en la tabla "clients".

He refactorizado el controlador LeadController.php adaptándolo a los principios SOLID, de forma que las validaciones previas a la inserción no se realicen en el mismo controlador, si no en las request con sus propias rules.

Las respuestas y códigos HTML están contempladas en el propio controlador, de forma que se obtenga una respuesta apropiada a la hora de realizar una interacción con los métodos expuestos.

A nivel Routing, he generado las siguientes rutas para que sea posible consumir los endpoints expuestos:

''GET    - http://127.0.0.1:8000/api/leads      - LISTAR LOS LEADS EXISTENTES.''
''GET    - http://127.0.0.1:8000/api/leads/{id} - MOSTRAR INFORMACIÓN DEL LEAD SELECCIONADO.''
''POST   - http://127.0.0.1:8000/api/leads      - CREACIÓN DE UN NUEVO LEAD (PASAR UN OBJETO JSON CON LOS DATOS "name","email", "phone").''
''PUT    - http://127.0.0.1:8000/api/leads/{id} - EDITARINFORMACIÓN DE UN LEAD (SE TRASLADA EN CASCADA A LOS CLIENTS, PASAR UN OBJETO JSON CON LOS DATOS "name","email", "phone").''
''DELETE - http://127.0.0.1:8000/api/leads/{id} - ELIMINACIÓN DEL LEAD SELECCIONADO.''













