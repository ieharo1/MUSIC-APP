# MusicApp - Plataforma de Streaming de Música

Proyecto desarrollado por **Isaac Esteban Haro Torres**.

---

## Descripción

Plataforma de streaming de música simulada con gestión de artistas, álbumes, canciones, playlists y reproductor web interactivo.

---

## Características

- Catálogo de artistas, álbumes y canciones
- Reproductor web con controles de reproducción
- Sistema de playlists personales
- Likes en canciones
- Seguimiento de artistas
- Contador de reproducciones
- Dashboard con estadísticas de popularidad
- Interfaz estilo Spotify moderna

---

## Stack Tecnológico

* PHP 8.2
* Laravel 11
* Livewire 3
* Bootstrap 5
* MySQL 8.0
* Docker
* Docker Compose

---

## Instalación desde cero

1. Clonar el repositorio
2. Ejecutar `docker compose up -d --build`
3. Esperar a que los contenedores estén levantados
4. Ejecutar migraciones: `docker compose exec app php artisan migrate`
5. Ejecutar seeders: `docker compose exec app php artisan db:seed`
6. Acceder al sistema en `http://localhost:8000`

### Configuración de Base de Datos

El sistema está configurado para usar MySQL con las siguientes credenciales:
- Host: mysql
- Database: music_app
- User: laravel
- Password: laravel

---

## Desarrollado por Isaac Esteban Haro Torres

Ingeniero en Sistemas · Full Stack · Automatización · Data

Email: [zackharo1@gmail.com](mailto:zackharo1@gmail.com)

WhatsApp: 098805517

GitHub: https://github.com/ieharo1

Portafolio: https://ieharo1.github.io/portafolio-isaac.haro/

---

## Licencia

© 2026 Isaac Esteban Haro Torres
