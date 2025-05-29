# ⚡ Porfolio Web - Usina Creativa  
Sitio web de porfolio, desarrollado por **Agustín E. Senestrari (Senestrari Dev)** para la agencia **Usina Creativa**, con el objetivo de reemplazar su antigua plataforma WordPress por una solución más moderna, veloz, escalable y mantenible.

Este proyecto combina un frontend con React + Vite y un backend PHP liviano para administrar novedades dinámicamente, siguiendo buenas prácticas de desarrollo web profesional.

---

## 🎯 Objetivo del Proyecto

- Modernizar el sitio web de **Usina Creativa** reemplazando la tecnología WordPress.
- Lograr una **SPA** (Single Page Application) eficiente, rápida y responsive.
- Integrar un **panel de administración propio** para novedades sin usar base de datos.
- Mantener un código **escalable, ordenado y modular**, con énfasis en buenas prácticas y rendimiento.

---

## 🚀 Tecnologías utilizadas

| Tecnología | Uso |
|-----------|-----|
| React 19 + Vite | Frontend SPA |
| PHP (sin base de datos) | Backend de administración de novedades |
| Bootstrap 5 + Bootstrap Icons | Estilos y diseño responsive |
| React-Router-Dom | Navegación |
| React-Helmet-Async | SEO dinámico |
| React-Toastify | Notificaciones |
| Swiper.js | Sliders y carruseles |
| Animate.css + AOS | Animaciones visuales |
| dotenv (PHP) | Variables seguras para credenciales |

---

## 🌐 Frontend (📁 `porfolio`)

### 🔧 Librerías instaladas

| Librería | Propósito |
|----------|-----------|
| react-router-dom | Navegación SPA |
| react-helmet-async | SEO por vista |
| bootstrap / react-bootstrap | Componentes y estilos |
| swiper | Carruseles responsive |
| react-toastify | Alertas y notificaciones |
| animate.css / AOS | Animaciones |
| react-countup | Conteo animado |
| typewriter-effect | Efecto de máquina de escribir |
| react-modal | Modales accesibles |

### 📁 Estructura del frontend

```plaintext
porfolio/
├── public/
│   ├── img/
│   ├── robots.txt
│   └── sitemap.xml
├── src/
│   ├── assets/                  # Imágenes, fuentes
│   │   └── image/
│   ├── components/
│   │   ├── partials/            # Header, Footer, Sidebar
│   │   ├── reutilizables/       # Reutilizables: banners, sliders, etc.
│   │   └── views/               # Vistas: home, quienesSomos, contacto, etc.
│   ├── data/clients.js          # Datos mock de clientes
│   ├── hooks/                   # Custom hooks
│   ├── seo/SEO.jsx              # SEO dinámico
│   ├── styles/                  # global.css y variables.css
│   ├── App.jsx                  # Config. de rutas
│   └── main.jsx
├── .gitignore
├── vite.config.js
├── README.md
```

---

## 🔐 Backend PHP (📁 `admin-novedades`)

### 🧩 Funcionalidades

- Login con usuario y contraseña usando `.env` (sin base de datos).
- Agregar, editar o eliminar novedades con título, bajada y una imagen.
- Seguridad mediante sesiones y protección de archivos sensibles.
- Novedades guardadas en `novedades.json` para ser consumidas por el frontend vía `fetch`.

### 🔐 Seguridad

- `.env` ignorado por Git.
- `.htaccess` que protege `novedades.json` y bloquea ejecución de scripts en `/imagenes`.
- Validación de extensiones de imagen.
- Control de sesión y cierre seguro.

### 📁 Estructura del backend

```plaintext
admin-novedades/
├── auth.php                # Verificación de login
├── config.php              # Lectura de credenciales desde .env
├── index.php               # Formulario de login
├── dashboard.php           # Panel de administración de novedades
├── logout.php              # Logout de sesión
├── novedades/
│   ├── novedades.json      # Archivo de almacenamiento
│   ├── .htaccess           # Protección del JSON
│   └── imagenes/           # Carpeta para imágenes subidas
│       └── .htaccess       # Evita ejecución de scripts
├── .env                    # (IGNORADO) Usuario y contraseña
```


## 📌 Notas finales

- Este proyecto es ideal para instituciones pequeñas o agencias que deseen tener **un sitio autoadministrable sin depender de CMS pesados**.
- Cumple con principios de desarrollo limpio, código desacoplado, y escalabilidad.
- Se puede desplegar tanto en servidores clásicos como en servidores modernos (Ej: cPanel, Vercel + backend separado, etc).

---

## 💻 Desarrollado por
**Agustín E. Senestrari**  
[senestraridev.com](https://senestraridev.com)  
**Usina Creativa**, Córdoba - Argentina
