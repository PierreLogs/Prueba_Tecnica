# Consultor de Posts - Laravel + React

Proyecto que consume la API externa **JSONPlaceholder**, procesa la información y la muestra a través de una interfaz simple en React.

## 📋 Requisitos del Proyecto

- Consumir API externa: `https://jsonplaceholder.typicode.com/posts/{id}`
- Manejo de errores (404 y 422)
- Interfaz en React con input, botón, estado de carga y mensajes de error

---

## 🛠 Tecnologías Utilizadas

### Backend
- **Laravel 13**
- PHP 8.5+
- Laravel HTTP Client

### Frontend
- **React + Vite**: Crea aplicaciones web modernas con una configuración de desarrollo rápida y un enfoque en el rendimiento.
- Axios: Cliente HTTP para conectar interfaz con servidores o API Rest externas.
- JavaScript (ES6+): Estándar moderno del lenguaje de programación. Permite escribir códigos de manera declarativa y concisa.

---

## 🚀 Instalación y Ejecución

### 1. Clonar el proyecto

git clone https://github.com/PierreLogs/Prueba_Tecnica.git

### 2. Ejecutar Backend (laravel)
cd mini-buscador-posts

# Instalar dependencias
composer install

# Configurar archivo de entorno
copy .env.example .env

# Generar clave de aplicación
php artisan key:generate

# Iniciar servidor Laravel
php artisan serve


### 3. Frontend (React + Vite + Axios)
cd frontend

# Instalar dependencias
npm install

# Iniciar frontend
npm run dev


## Creado por: [PierreLogs](https://github.com/PierreLogs)
