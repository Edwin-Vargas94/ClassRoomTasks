# 🗂️ Gestión de Tareas

**Gestión de Tareas** es una aplicación web desarrollada con Laravel y Livewire que permite organizar, asignar y administrar tareas de manera eficiente, dependiendo del rol del usuario. La plataforma cuenta con un sistema de autenticación que ofrece una experiencia dinámica e intuitiva tanto para usuarios como para administradores.

## ✨ Características principales

- Inicio de sesión con control de roles (Administrador / Usuario)
- Creación, edición y eliminación de tareas
- Asignación de tareas a usuarios (solo para administradores)
- Gestión de catálogos: estados y categorías
- Interfaz responsive con Blade y Livewire
- Filtros automáticos por usuario y permisos
- Vista diferenciada por rol

## 🛠️ Tecnologías utilizadas

- **Laravel**
- **Livewire**
- **Blade components**
- **TailwindCSS**
- **MySQL**
- **PHP**
- **Visual Studio Code**

## ⚙️ Requisitos

- PHP >= 8.1
- Composer
- MySQL o MariaDB
- Node.js y NPM

## 🚀 Instalación

1. Clonar el repositorio:
   ```bash
   git clone https://github.com/Edwin-Vargas94/ClassRoomTasks.git
   cd ClassRoomTasks

## 📝 Caso de uso de la aplicación
Este proyecto tiene como objetivo ofrecer una solución escalable para la gestión de tareas con control de acceso por roles. El sistema permite a un administrador asignar tareas a su equipo de trabajo, quienes podrán gestionarlas de manera controlada, considerando:
•	Fecha de vencimiento
•	Prioridad de la tarea
•	Categoría asignada
•	Estado actual de la tarea
Además, el administrador tiene la posibilidad de crear otras cuentas administrativas y gestionar opciones dentro de los catálogos del sistema.
________________________________________
## 💾 Base de datos
Se incluye un respaldo de la base de datos MySQL, que ya contiene:
•	Los catálogos predefinidos
•	Un usuario administrador:
Correo: admin@hotmail.com
Contraseña: admin
Este usuario es el único con permisos de administrador en esta etapa inicial.
•	Un usuario:
Correo: edwin_glz94@hotmail.com
Contraseña: egvg
________________________________________
## 👤 Roles del sistema
🛠 Administrador:
•	Gestiona todas las tareas (propias y de otros usuarios)
•	Asigna tareas a usuarios
•	Administra catálogos de categorías y estados
•	Crea nuevos administradores
•	Tiene acceso a funcionalidades avanzadas
👤 Usuario:
•	Crea, edita, elimina y visualiza solo sus propias tareas
•	No tiene acceso a catálogos
•	No puede asignar tareas

## 📚 Estructura del proyecto
- app/Http/Livewire: Componentes Livewire
- resources/views/livewire: Vistas dinámicas
- app/Models: Modelos de la aplicación
- routes/web.php: Rutas principales

**IMPORTANTE**
En la carpeta DocumentacionTareas se adjunta los siguientes documentos.
- Diagrama ER de base de datos utilizada.
- Respaldo de la base de datos.
- Manuales de usuario.
- Matriz de pruebas.

- 🧑‍💻 Autor
- Desarrollado por Edwin Gibran Vargas González
- 📌 GitHub: Edwin-Vargas94

## 📝 Licencia
Este proyecto es de uso público. Puedes usarlo, modificarlo y compartirlo libremente.