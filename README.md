🌙 DREAMS EVENTOS
Sistema para la gestión de eventos – Registro, Login y Panel Administrativo
📌 Descripción

Dreams Eventos es un sistema web diseñado para la gestión completa de eventos.
Incluye funciones de:

Registro de usuarios

Inicio de sesión

Panel administrativo

Gestión de eventos y usuarios

Base de datos integrada

Estructura modular para escalabilidad

Construido siguiendo buenas prácticas en Laravel, Docker y MySQL.

🚀 Características principales

✔ Registro y autenticación de usuarios
✔ Dashboard administrativo
✔ CRUD de eventos (Crear, Editar, Eliminar, Listar)
✔ Gestión de usuarios desde el panel
✔ Base de datos lista con el archivo crud.sql
✔ Interfaz responsiva
✔ Dockerfile y docker-compose para despliegue
✔ Integración de vistas Blade

🛠 Tecnologías utilizadas
Tecnología	Uso
Laravel	Framework principal del backend
PHP	Lenguaje del servidor
MySQL	Base de datos
Blade	Motor de plantillas
Composer	Gestión de dependencias
Docker & Docker Compose	Orquestación del entorno
CSS / HTML / JS	Frontend
Git	Control de versiones
📂 Estructura del proyecto
EVENTOS_Dreams/
│
├── app/
├── bootstrap/
├── config/
├── database/
│   ├── migrations/
│   └── crud.sql
├── public/
├── resources/
│   ├── views/
│   └── css/js
├── routes/
│   └── web.php
├── docker-compose.yml
├── dockerfile
└── composer.json

⚙️ Instalación (Modo desarrollador)
1️⃣ Clonar el repositorio
git clone https://github.com/tuusuario/dreams-eventos.git
cd dreams-eventos

2️⃣ Instalar dependencias
composer install

3️⃣ Crear el archivo .env
cp .env.example .env

4️⃣ Generar la clave de Laravel
php artisan key:generate

5️⃣ Importar la base de datos

Usa el archivo:

/EVENTOS_Dreams/EVENTOS/crud.sql

6️⃣ Configurar conexión en .env
DB_DATABASE=eventos
DB_USERNAME=root
DB_PASSWORD=

7️⃣ Levantar el servidor
php artisan serve

🐳 Instalación usando Docker
1️⃣ Construir contenedores
docker-compose build

2️⃣ Levantar el entorno
docker-compose up -d

3️⃣ Acceder al proyecto
http://localhost:8000

🔐 Autenticación

El sistema cuenta con:

Registro de usuarios

Inicio de sesión

Middleware de protección de rutas

Panel administrador

🖼 Capturas de pantalla

Agrega aquí tus capturas de pantalla cuando las tengas.
Ejemplo:

![Inicio](screenshots/inicio.png)
![Dashboard](screenshots/dashboard.png)
![Login](screenshots/login.png)

🧩 Funcionalidades del panel

Gestión de eventos

Gestión de usuarios

Estadísticas básicas

Control de roles (si lo implementas después)

📜 Licencia

Este proyecto fue creado por Dahiana Andrea Duarte Valle.
Puedes usarlo, modificarlo y adaptarlo libremente para tus proyectos educativos.

✨ Créditos

Desarrollado por: Dahiana Duarte
Diseño y código original realizado completamente por la autora.
