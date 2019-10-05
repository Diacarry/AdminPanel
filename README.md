# AdminPanel
Aplicativo realizado haciendo uso del framework de PHP de laravel en su version 6.0

La autenticacion genera unos formularios muy planos, por lo para añadir los estilos instalar los paquetes, al clonar el proyecto es recomendable instalarlas antes de iniciar el proyecto
- Use cualquiera de los siguentes dos comandos
npm i
npm install

- Seguidos del comando
npm run dev

- Se debe crear una base de datos con las siguientes caracteristicas, dicha información se encuentra en el archivo '.env.example' y debe ser incluida en el archivo '.env'
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=management
DB_USERNAME=adminpanel
DB_PASSWORD=AdminPanel123*

- El sistema posee un seed para agregar un usuario administrador en la tabla users para implementar el sistema de autenticacion en el sistema, para que el unico usuario (email = 'admin@admin.com', password = 'password') aparezca registrado en el sistema debe ejecutar el seed con el siguiente comando
php artisn db:seed