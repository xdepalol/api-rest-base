# API REST Base en PHP + MySQL  

## Contenidos

- [API REST Base en PHP + MySQL](#api-rest-base-en-php--mysql)
  - [Contenidos](#contenidos)
  - [Contexto](#contexto)
  - [Objetivos de aprendizaje](#objetivos-de-aprendizaje)
  - [¿Qué es una API REST?](#qué-es-una-api-rest)
    - [CRUD del recurso `products`](#crud-del-recurso-products)
    - [Esquema general del funcionamiento de la API REST](#esquema-general-del-funcionamiento-de-la-api-rest)
  - [¿Para qué se usa una API REST?](#para-qué-se-usa-una-api-rest)
  - [Estructura del proyecto](#estructura-del-proyecto)
  - [Requisitos previos](#requisitos-previos)
  - [Cómo poner en marcha la API](#cómo-poner-en-marcha-la-api)
    - [1️⃣ Clonar el repositorio](#1️⃣-clonar-el-repositorio)
    - [2️⃣ Crear la base de datos](#2️⃣-crear-la-base-de-datos)
    - [3️⃣ Configurar la conexión](#3️⃣-configurar-la-conexión)
    - [4️⃣ Ejecutar la API](#4️⃣-ejecutar-la-api)
  - [¿Qué es Postman?](#qué-es-postman)
  - [Seguridad básica en APIs REST (opcional)](#seguridad-básica-en-apis-rest-opcional)
    - [✔ Tokens simétricos (nivel adecuado DAW2)](#-tokens-simétricos-nivel-adecuado-daw2)
    - [✔ JWT (JSON Web Tokens) — ampliación opcional](#-jwt-json-web-tokens--ampliación-opcional)
  - [Importancia de documentar una API](#importancia-de-documentar-una-api)
  - [Generar documentación con apidoc](#generar-documentación-con-apidoc)
    - [Instalar:](#instalar)
    - [Generar la documentación:](#generar-la-documentación)
  - [Instrucciones para completar la actividad](#instrucciones-para-completar-la-actividad)
  - [Créditos y licencia](#créditos-y-licencia)

## Contexto ##

Este repositorio se utiliza como soporte para una actividad práctica del módulo M0613 de DAW2. Permite trabajar de forma progresiva conceptos clave del desarrollo web en entorno servidor y sirve como punto de partida para aprender cómo se estructura, desarrolla y documenta una API REST mediante un proyecto base en PHP. A partir de este recurso podrás completar operaciones CRUD, probar endpoints con Postman y generar documentación técnica con apidoc siguiendo buenas prácticas profesionales.

## Objetivos de aprendizaje
Con este recurso podrás:
- Comprender el funcionamiento básico de una API REST.
- Implementar operaciones CRUD sobre el recurso `products`.
- Probar y depurar endpoints utilizando Postman.
- Generar documentación técnica con apidoc.
- Organizar tu trabajo siguiendo buenas prácticas de desarrollo backend.

## ¿Qué es una API REST?
Una **API REST** (Representational State Transfer) es una interfaz que permite que dos aplicaciones se comuniquen a través de Internet utilizando peticiones HTTP estándar.

En lugar de enviar páginas web completas, una API REST expone **recursos** mediante **endpoints**:

| Método HTTP | Uso típico              |
|-------------|-------------------------|
| **GET**     | Lectura de recursos     |
| **POST**    | Creación de recursos    |
| **PUT**     | Actualizar datos        |
| **DELETE**  | Eliminación de recursos |

Las respuestas suelen enviarse en **JSON**.

### CRUD del recurso `products`

| Método    | Endpoint               | Acción                          |
|-----------|------------------------|---------------------------------|
| **GET**   | `/products`            | Listar todos los productos      |
| **GET**   | `/products?id=:id`     | Obtener un producto concreto    |
| **POST**  | `/products`            | Crear un nuevo producto         |
| **PUT**   | `/products?id=:id`     | Actualizar un producto existente|
| **DELETE**| `/products?id=:id`     | Eliminar un producto            |

### Esquema general del funcionamiento de la API REST

![Lógica del servidor (PHP + MySQL)](/public/assets/images/API-REST-Esquema.png "Lógica del servidor")

La API recibe peticiones HTTP, procesa la lógica y accede a la base de datos, devolviendo respuestas en formato JSON.

---

## ¿Para qué se usa una API REST?
Una API REST permite:

- Centralizar la lógica del sistema  
- Integrar aplicaciones  
- Separar frontend y backend  
- Automatizar procesos  
- Facilitar integraciones de terceros  

---

## Estructura del proyecto
```
api-rest-base/
├── config/
│   └── config.php
├── database/
│   └── create.sql
├── public/
|   └── api/
|       ├── helloworld/
|       │   └── index.php
|       └── products/
|           └── index.php
├── src/
│   ├── bootstrap.php
│   ├── Database.php
│   └── ProductRepository.php
├── docs/
├── apidoc.json
└── README.md
```

Incluye:

- Conexión con base de datos mediante PDO  
- Endpoints GET y POST  
- Estructura lista para completar PUT y DELETE  
- Comentarios DocBlock preparados para *apidoc*  
- Plantilla para documentación automática  

---

## Requisitos previos

* PHP 8+
* MySQL o MariaDB
* Servidor web local (Apache, XAMPP, WAMP, Laragon…)
* Node.js + npm (para apidoc)
* Postman

## Cómo poner en marcha la API

### 1️⃣ Clonar el repositorio

Antes de empezar, realiza un fork de este repositorio en tu cuenta de GitHub.

```
git clone https://github.com/TU-USUARIO/api-rest-base.git
```

### 2️⃣ Crear la base de datos
Importa el archivo: `database/create.sql`

### 3️⃣ Configurar la conexión
Edita `config/config.php` con tus credenciales locales.

### 4️⃣ Ejecutar la API
Ejemplo de endpoint:
```
http://localhost/<carpeta-del-proyecto>/public/api/products
```

**Consejo:** si no ves respuesta o aparece un error 404, asegúrate de que el servidor local apunta correctamente al directorio `public/`.

---

## ¿Qué es Postman?
**Postman** es una herramienta profesional para probar APIs REST.

Permite:

- Enviar peticiones HTTP  
- Probar respuestas JSON  
- Añadir cabeceras, parámetros, tokens  
- Organizar colecciones de pruebas  

Guía oficial recomendada:  
🔗 https://learning.postman.com/docs/getting-started/introduction/

Ejemplo de GET:


```yaml
GET http://localhost/api-rest-base/public/api/helloworld
```
Y la respuesta:
```yaml
HTTP/1.1 200 OK
{
   "message": "Hello World!"
}
```

Ejemplo de POST:


```yaml
POST http://localhost/api-rest-base/public/api/products
{
  "name": "USB Keyboard",
  "price": 19.90
}
```
Respuesta esperada:
```yaml
HTTP/1.1 201 Created
{
  "id": 11,
  "name": "USB Keyboard",
  "price": 19.90
}
```

---

## Seguridad básica en APIs REST (opcional)

### ✔ Tokens simétricos (nivel adecuado DAW2)
El cliente envía un token compartido con el servidor:

```
Authorization: Bearer MI-CLAVE-SECRETA
```

El servidor valida si la clave es correcta.

**Nota.** En Postman, puedes añadir el token en la pestaña “Headers”:

Recurso externo:  
🔗 https://www.rfc-editor.org/rfc/rfc6750

### ✔ JWT (JSON Web Tokens) — ampliación opcional
Token firmado criptográficamente  
(más seguro, más profesional, opcional para alumnos avanzados).

Recurso externo recomendado:  
🔗 https://www.jwt.io/introduction#what-is-json-web-token

---

## Importancia de documentar una API
Una API sin documentación es:

- difícil de mantener,  
- casi imposible de integrar,  
- poco útil en proyectos reales.

Documentar:

- explica parámetros,  
- muestra ejemplos,  
- define respuestas esperadas,  
- acelera la integración de otras aplicaciones.

Por eso este proyecto utiliza **apidoc**, que permite generar documentación HTML automáticamente a partir de comentarios estructurados.

---

## Generar documentación con apidoc

### Instalar:

```
npm install -g apidoc
```

### Generar la documentación:
```
apidoc -i public/api -o docs
```

Esto creará la documentación dentro de `docs/`.

---

Guía oficial recomendada:  
🔗 https://apidocjs.com/

## Instrucciones para completar la actividad

1. Completar el CRUD del recurso `products`  
2. Añadir comentarios DocBlock a cada endpoint  
3. Regenerar la documentación con apidoc  
4. Probar todos los endpoints en Postman  
5. Completar este README con:  
   - Nombre del alumno  
   - Descripción técnica de las mejoras  
   - Capturas de Postman  
   - Capturas de la documentación generada  
   - Reflexión final

## Créditos y licencia

Recurso creado por Javier de Palol para uso académico en DAW2. Licencia MIT.

![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)
![Status: Educational](https://img.shields.io/badge/Status-Educational-blue)
