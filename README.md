# Template Web PHP

Template base para el desarrollo de sitios web y aplicaciones PHP, diseñado para mantener una estructura organizada, escalable y reutilizable entre proyectos.

La arquitectura separa claramente:

- Lógica de aplicación.
- Configuración.
- Rutas.
- Vistas.
- Recursos de desarrollo.
- Archivos públicos.
- Almacenamiento.
- Dependencias.

El proyecto utiliza **PHP + Composer + Vite + Sass + JavaScript**.

---

# 1. Estructura del proyecto

```text
template/
│
├── app/
│   ├── Controllers/
│   │   ├── HomeController.php
│   │   └── Admin/
│   │
│   ├── Models/
│   ├── Services/
│   ├── Repositories/
│   └── Helpers/
│
├── config/
│   ├── app.php
│   └── database.php
│
├── public/
│   ├── index.php
│   │
│   ├── assets/
│   │   ├── css/
│   │   ├── js/
│   │   └── img/
│   │
│   └── uploads/
│
├── resources/
│   ├── js/
│   │   └── app.js
│   │
│   ├── scss/
│   │   ├── abstracts/
│   │   │   ├── _variables.scss
│   │   │   ├── _mixins.scss
│   │   │   └── _functions.scss
│   │   │
│   │   ├── base/
│   │   │   ├── _reset.scss
│   │   │   ├── _typography.scss
│   │   │   └── _global.scss
│   │   │
│   │   ├── components/
│   │   │   ├── _buttons.scss
│   │   │   ├── _cards.scss
│   │   │   ├── _modal.scss
│   │   │   └── _forms.scss
│   │   │
│   │   ├── layout/
│   │   │   ├── _header.scss
│   │   │   ├── _footer.scss
│   │   │   ├── _sidebar.scss
│   │   │   └── _grid.scss
│   │   │
│   │   ├── pages/
│   │   │   ├── _home.scss
│   │   │   ├── _login.scss
│   │   │   └── _dashboard.scss
│   │   │
│   │   └── app.scss
│   │
│   ├── img/
│   │
│   └── views/
│       ├── layouts/
│       │   └── main.php
│       │
│       ├── components/
│       ├── partials/
│       │   ├── header.php
│       │   └── footer.php
│       │
│       ├── pages/
│       │   └── home.php
│       │
│       └── admin/
│
├── routes/
│   ├── web.php
│   └── admin.php
│
├── storage/
│   ├── cache/
│   └── logs/
│
├── tests/
│
├── vendor/
│
├── .env
├── .env.example
├── .gitignore
├── composer.json
├── composer.lock
├── package.json
├── package-lock.json
├── vite.config.js
└── README.md
```

---

# 2. Descripción de la arquitectura

## `app/`

Contiene la lógica principal de la aplicación.

El código PHP relacionado con el funcionamiento del sistema debe concentrarse aquí y organizarse según su responsabilidad.

### `Controllers/`

Recibe las solicitudes de las rutas y coordina la respuesta de la aplicación.

Los controladores pueden solicitar información a servicios, modelos o repositorios y posteriormente enviar los datos necesarios a una vista.

Ejemplo:

```text
app/Controllers/HomeController.php
```

Para funcionalidades administrativas se utiliza:

```text
app/Controllers/Admin/
```

---

### `Models/`

Contiene los modelos y entidades utilizadas por la aplicación.

Representan principalmente la información con la que trabaja el sistema.

Ejemplos:

```text
User.php
Product.php
Ticket.php
```

---

### `Services/`

Contiene la lógica de negocio.

Se utiliza cuando una operación requiere procesamiento adicional y no debería ejecutarse directamente dentro de un controlador.

Ejemplos:

```text
AuthService.php
ReportService.php
EmailService.php
```

---

### `Repositories/`

Contiene la lógica relacionada con el acceso y consulta de datos.

Permite mantener las consultas de base de datos separadas de los controladores y servicios.

Ejemplos:

```text
UserRepository.php
ProductRepository.php
TicketRepository.php
```

---

### `Helpers/`

Contiene herramientas y funciones reutilizables por distintas partes de la aplicación.

Ejemplos de responsabilidades:

```text
Views
Redirecciones
Sesiones
Assets
Validaciones
Formateo de datos
```

---

# 3. Configuración

## `config/`

Contiene los archivos generales de configuración.

### `config/app.php`

Configuración general de la aplicación.

Puede obtener información desde las variables definidas en `.env`, como:

```text
APP_NAME
APP_ENV
APP_DEBUG
APP_URL
```

---

### `config/database.php`

Contiene la configuración necesaria para establecer la conexión con la base de datos.

Las credenciales no deben escribirse directamente en este archivo.

Los valores deben obtenerse desde:

```text
.env
```

---

# 4. Directorio público

## `public/`

Es el único directorio que debería ser accesible directamente desde el navegador.

En producción, el **DocumentRoot** del servidor debe apuntar a esta carpeta.

```text
public/
```

Esto evita exponer archivos internos como:

```text
.env
config/
app/
vendor/
storage/
```

---

### `public/index.php`

Es el punto de entrada principal de la aplicación.

Todas las solicitudes web deben comenzar desde este archivo.

Flujo general:

```text
Navegador
    ↓
public/index.php
    ↓
Router
    ↓
Controller
    ↓
Service / Repository
    ↓
View
    ↓
HTML
```

---

### `public/assets/`

Contiene los archivos procesados para producción.

```text
public/assets/css/
public/assets/js/
public/assets/img/
```

Estos archivos son generados mediante Vite.

No deben editarse manualmente.

El código fuente se encuentra dentro de:

```text
resources/
```

---

### `public/uploads/`

Contiene archivos cargados por los usuarios cuando el proyecto requiere esta funcionalidad.

Ejemplos:

```text
Imágenes
Documentos
Adjuntos
Avatares
```

Nunca debe almacenarse aquí código PHP ejecutable proporcionado por usuarios.

---

# 5. Recursos de desarrollo

## `resources/`

Contiene los archivos fuente utilizados durante el desarrollo.

```text
resources/
├── js/
├── scss/
├── img/
└── views/
```

---

## JavaScript

```text
resources/js/
```

El archivo principal es:

```text
resources/js/app.js
```

Desde este archivo pueden importarse otros módulos JavaScript.

Ejemplo:

```javascript
import './modules/menu.js';
import './modules/modal.js';
```

También funciona como punto de entrada utilizado por Vite.

---

# 6. Sass / SCSS

Los estilos fuente se encuentran dentro de:

```text
resources/scss/
```

El archivo principal es:

```text
resources/scss/app.scss
```

Este archivo concentra las importaciones de los diferentes módulos de estilos.

---

### `abstracts/`

Contiene herramientas utilizadas por otros archivos SCSS.

```text
_variables.scss
_mixins.scss
_functions.scss
```

Aquí se definen elementos como:

- Colores.
- Tipografías.
- Breakpoints.
- Espaciados.
- Mixins.
- Funciones Sass.

---

### `base/`

Contiene los estilos globales del proyecto.

```text
_reset.scss
_typography.scss
_global.scss
```

Aquí se definen elementos como:

- Reset CSS.
- Estilos generales.
- Tipografía.
- Comportamiento base del documento.

---

### `components/`

Contiene componentes visuales reutilizables.

Ejemplos:

```text
_buttons.scss
_cards.scss
_modal.scss
_forms.scss
```

Cada componente debe mantener sus estilos de forma independiente.

---

### `layout/`

Contiene los estilos relacionados con la estructura general del sitio.

Ejemplos:

```text
_header.scss
_footer.scss
_sidebar.scss
_grid.scss
```

---

### `pages/`

Contiene estilos específicos para determinadas páginas.

Ejemplos:

```text
_home.scss
_login.scss
_dashboard.scss
```

Los estilos reutilizables no deben colocarse aquí; deben utilizarse `components/` o `layout/`.

---

# 7. Imágenes fuente

```text
resources/img/
```

Contiene las imágenes originales utilizadas durante el desarrollo.

Dependiendo de la configuración de Vite, estos recursos pueden procesarse o copiarse hacia:

```text
public/assets/img/
```

---

# 8. Vistas

## `resources/views/`

Contiene las plantillas PHP responsables de generar la interfaz HTML.

---

### `layouts/`

Contiene las estructuras generales de las páginas.

Ejemplo:

```text
layouts/main.php
```

Un layout puede contener la estructura HTML común del proyecto:

```text
<html>
<head>
<body>
header
contenido
footer
```

---

### `components/`

Contiene pequeños componentes visuales reutilizables.

Ejemplos:

```text
card.php
modal.php
alert.php
pagination.php
```

---

### `partials/`

Contiene fragmentos estructurales compartidos.

Actualmente:

```text
partials/header.php
partials/footer.php
```

---

### `pages/`

Contiene las vistas correspondientes a las páginas públicas.

Ejemplo:

```text
pages/home.php
```

---

### `admin/`

Contiene las vistas relacionadas con el panel administrativo.

---

# 9. Rutas

## `routes/`

Define las URL disponibles dentro de la aplicación y el controlador responsable de atenderlas.

```text
routes/
├── web.php
└── admin.php
```

### `web.php`

Contiene las rutas públicas del proyecto.

Ejemplos:

```text
/
/contacto
/nosotros
/productos
```

### `admin.php`

Contiene las rutas correspondientes al panel administrativo.

Ejemplos:

```text
/admin
/admin/usuarios
/admin/reportes
/admin/configuracion
```

---

# 10. Storage

## `storage/`

Contiene información generada internamente por la aplicación que no debe ser directamente accesible desde el navegador.

```text
storage/
├── cache/
└── logs/
```

### `cache/`

Archivos temporales y datos almacenados en caché.

### `logs/`

Registros generados por la aplicación.

Ejemplo:

```text
app.log
errors.log
```

---

# 11. Tests

```text
tests/
```

Contiene las pruebas automatizadas del proyecto.

La estructura puede crecer conforme aumente la complejidad de la aplicación.

---

# 12. Dependencias PHP

## `vendor/`

Es generada automáticamente por Composer.

Contiene las dependencias PHP instaladas en el proyecto.

No debe modificarse manualmente.

Esta carpeta no debe almacenarse en Git.

---

# 13. Variables de entorno

## `.env`

Contiene la configuración específica y privada del entorno donde se ejecuta el proyecto.

Ejemplo:

```env
APP_NAME="Mi Aplicación"
APP_ENV=development
APP_DEBUG=true
APP_URL=http://localhost

DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=
DB_USERNAME=root
DB_PASSWORD=
DB_CHARSET=utf8mb4
```

Este archivo puede contener credenciales.

**Nunca debe subirse al repositorio.**

---

## `.env.example`

Contiene la misma estructura de variables requeridas por `.env`, pero sin credenciales ni información sensible.

Sirve como referencia para configurar nuevas instalaciones.

---

# 14. Archivos principales del proyecto

### `.gitignore`

Define los archivos y carpetas que Git no debe almacenar.

Entre ellos:

```text
.env
vendor/
node_modules/
public/assets/
logs
cache
```

---

### `composer.json`

Define:

- Dependencias PHP.
- Configuración de Composer.
- Autoloading PSR-4.
- Namespace principal de la aplicación.

Las clases ubicadas en:

```text
app/
```

utilizan el namespace:

```php
App\
```

---

### `composer.lock`

Registra las versiones exactas de las dependencias PHP instaladas.

Debe mantenerse dentro del repositorio.

---

### `package.json`

Define:

- Dependencias frontend.
- Vite.
- Sass.
- Scripts de desarrollo.
- Scripts de compilación.

---

### `package-lock.json`

Registra las versiones exactas de las dependencias instaladas mediante npm.

Debe mantenerse dentro del repositorio.

---

### `vite.config.js`

Contiene la configuración de Vite.

Vite toma los archivos fuente desde:

```text
resources/
```

y genera los recursos compilados dentro de:

```text
public/assets/
```

---

# 15. Flujo general de desarrollo

La arquitectura del proyecto sigue aproximadamente el siguiente flujo:

```text
                    NAVEGADOR
                        │
                        ▼
                public/index.php
                        │
                        ▼
                     ROUTER
                        │
                        ▼
                   CONTROLLER
                        │
              ┌─────────┴─────────┐
              ▼                   ▼
           SERVICE            REPOSITORY
              │                   │
              │                   ▼
              │              BASE DE DATOS
              │                   │
              └─────────┬─────────┘
                        ▼
                      VIEW
                        │
                        ▼
                       HTML
                        │
                        ▼
                    NAVEGADOR
```

Para los recursos frontend:

```text
resources/js/
resources/scss/
resources/img/
        │
        ▼
       Vite
        │
        ▼
public/assets/
```

---

# Instalación y puesta en marcha

## 16. Requisitos

Antes de utilizar el template se debe tener instalado:

- PHP.
- Composer.
- Node.js.
- npm.
- Un servidor web o entorno de desarrollo compatible con PHP.
- MySQL o el motor de base de datos requerido por el proyecto.

Para comprobar las instalaciones:

```bash
php --version
```

```bash
composer --version
```

```bash
node --version
```

```bash
npm --version
```

---

# 17. Crear un nuevo proyecto

Copiar o clonar el template en una nueva carpeta.

Ejemplo:

```text
mi-proyecto/
```

Abrir una terminal dentro de la raíz del proyecto.

---

# 18. Instalar dependencias PHP

Ejecutar:

```bash
composer install
```

Composer instalará las dependencias definidas en:

```text
composer.json
```

y generará:

```text
vendor/
```

También utilizará:

```text
composer.lock
```

para conservar las versiones establecidas por el proyecto.

---

# 19. Instalar dependencias de Node.js

Ejecutar:

```bash
npm install
```

Esto instalará las dependencias definidas dentro de:

```text
package.json
```

y generará:

```text
node_modules/
```

---

# 20. Configurar variables de entorno

Crear el archivo:

```text
.env
```

utilizando como base:

```text
.env.example
```

En Windows CMD:

```bash
copy .env.example .env
```

En PowerShell:

```powershell
Copy-Item .env.example .env
```

En Linux/macOS:

```bash
cp .env.example .env
```

Posteriormente editar `.env` con la configuración correspondiente al proyecto.

Ejemplo:

```env
APP_NAME="Mi Proyecto"
APP_ENV=development
APP_DEBUG=true
APP_URL=http://localhost

DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=mi_proyecto
DB_USERNAME=root
DB_PASSWORD=
DB_CHARSET=utf8mb4
```

---

# 21. Generar el autoload de Composer

Normalmente `composer install` realiza este proceso automáticamente.

Si se modifica la configuración de autoload dentro de `composer.json`, ejecutar:

```bash
composer dump-autoload
```

---

# 22. Iniciar Vite en modo desarrollo

Ejecutar:

```bash
npm run dev
```

Vite permanecerá activo durante el desarrollo y procesará los cambios realizados en JavaScript y Sass.

Los archivos fuente deben modificarse dentro de:

```text
resources/
```

No deben editarse directamente los archivos generados dentro de:

```text
public/assets/
```

---

# 23. Iniciar PHP en desarrollo

Si no se utiliza Apache, Nginx, XAMPP, Laragon u otro servidor local, PHP permite iniciar un servidor de desarrollo.

Desde la raíz del proyecto ejecutar:

```bash
php -S localhost:8000 -t public
```

La aplicación estará disponible en:

```text
http://localhost:8000
```

La opción:

```text
-t public
```

establece `public/` como DocumentRoot.

---

# 24. Desarrollo local

Durante el desarrollo normalmente deberán mantenerse activos:

### Terminal 1 — PHP

```bash
php -S localhost:8000 -t public
```

### Terminal 2 — Vite

```bash
npm run dev
```

De esta forma:

```text
PHP
 ↓
Procesa la aplicación

Vite
 ↓
Procesa JavaScript + Sass
```

---

# 25. Compilar archivos para producción

Antes de publicar el proyecto ejecutar:

```bash
npm run build
```

Vite generará los archivos optimizados para producción dentro de:

```text
public/assets/
```

---

# 26. Instalación rápida

Para una nueva copia del template, el procedimiento básico es:

```bash
composer install
```

```bash
npm install
```

Crear:

```text
.env
```

a partir de:

```text
.env.example
```

Configurar las variables del proyecto y posteriormente ejecutar:

```bash
npm run dev
```

Para iniciar PHP localmente:

```bash
php -S localhost:8000 -t public
```

---

# 27. Resumen rápido

## Primera instalación

```text
1. Copiar/clonar el template
        ↓
2. composer install
        ↓
3. npm install
        ↓
4. Copiar .env.example → .env
        ↓
5. Configurar .env
        ↓
6. npm run dev
        ↓
7. Iniciar servidor PHP
```

Comandos principales:

```bash
composer install
npm install
npm run dev
```

Servidor PHP opcional:

```bash
php -S localhost:8000 -t public
```

Para producción:

```bash
npm run build
```

---

# 28. Reglas generales del template

Para mantener todos los proyectos consistentes:

1. No colocar credenciales directamente en archivos PHP.
2. Utilizar `.env` para configuraciones privadas.
3. No subir `.env` al repositorio.
4. No modificar manualmente `vendor/`.
5. No modificar manualmente `node_modules/`.
6. No modificar directamente los archivos compilados de `public/assets/`.
7. Mantener la lógica de negocio fuera de las vistas.
8. Mantener las consultas de base de datos fuera de las vistas.
9. Utilizar Controllers para coordinar las solicitudes.
10. Utilizar Services para lógica de negocio.
11. Utilizar Repositories para acceso a datos cuando sea necesario.
12. Utilizar `resources/` para los archivos fuente frontend.
13. Utilizar `public/` únicamente para recursos que puedan ser accesibles desde el navegador.
14. Mantener `composer.lock` y `package-lock.json` dentro del repositorio.

---

# Template Web

Flujo base:

```text
PHP + Composer
      │
      ├── Controllers
      ├── Models
      ├── Services
      ├── Repositories
      └── Views

Vite
 │
 ├── JavaScript
 ├── Sass
 └── Assets

.env
 │
 ├── Aplicación
 └── Base de datos

public/
 │
 └── Único directorio público
```

El objetivo del template es proporcionar una base común para iniciar nuevos proyectos sin tener que reconstruir en cada ocasión la configuración, estructura y herramientas fundamentales.