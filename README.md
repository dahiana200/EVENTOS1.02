
# 🌙 DREAMS EVENTOS
### Sistema para la gestión de eventos – Registro, Login y Panel Administrativo

## 📌 Descripción
Dreams Eventos es un sistema web diseñado para la gestión completa de eventos.
Incluye funciones de registro de usuarios, inicio de sesión, panel administrativo, y CRUD de eventos.

## 🚀 Características principales
- Registro y autenticación de usuarios  
- Dashboard administrativo  
- CRUD de eventos  
- Gestión de usuarios  
- Base de datos incluida  
- Docker para despliegue  

## 🛠 Tecnologías utilizadas
- Laravel
- PHP
- MySQL
- Docker / Docker Compose
- Blade
- CSS / JS / HTML

## ⚙️ Instalación
### 1. Clonar repositorio
```
git clone https://github.com/dahiana200/EVENTOS1.02.git
cd dreams-eventos
```

### 2. Instalar dependencias
```
composer install
```

### 3. Configurar .env y generar clave
```
cp .env.example .env
php artisan key:generate
```

### 4. Importar base de datos
Usar archivo: `crud.sql`

### 5. Levantar servidor
```
php artisan serve
```

## 🐳 Instalación con Docker
```
docker-compose build
docker-compose up -d
```

## 🖼 Capturas de pantalla
(Agrega aquí tus imágenes)

## ✨ Créditos
Proyecto desarrollado por **Dahiana Andrea Duarte Valle**
