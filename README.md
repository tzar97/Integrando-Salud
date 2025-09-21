- Instalar dependencias de Laravel
    composer install

- Instalar dependencias de Vue
     npm install

- Copiar el .env.example y generar la key:
    cp .env.example .env
    php artisan key:generate

- Editar credenciales de bd en el .env
    DB_DATABASE=integrando_salud
    DB_USERNAME=root
    DB_PASSWORD=

- Importar la BD
    mysql -u root -p integrando_salud < "integrando bd.sql"

- Levantar server
    php artisan serve
    npm run dev

- en el Navegador
    http://127.0.0.1:8000
 
