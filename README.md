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

- Si los archivos cargados por un usuario no son visibles, debe crer un enlace simbólico para que dichos archivos sean visibles, se recomienda usar el comando para mantener estos archivo en acceso publico
php artisan storege:link

- Ya que los archivos binarios estan restringidos por github, para una correcta visualización del sistema, se recomienda descargar un logo por defecto (en este enlace se encuentra el que se utilizo para las pruebas del aplicativo => http://www.nashikproperty.com/uploads/builder-logo/default-logo.png) o puede ser uno de su elección, lo importante es llamar a este archivo default y que este tenga la extención png y almacenarlo en la carperta 'storage/app/public'
default.png