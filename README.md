# API REST Base en PHP + MySQL  
**Repositorio para la Actividad 3 — DAW2**

## ¿Qué es una API REST?
Una **API REST** (Representational State Transfer) es una interfaz que permite que dos aplicaciones se comuniquen a través de Internet utilizando peticiones HTTP estándar.

En lugar de enviar páginas web completas, una API REST expone **recursos** mediante **endpoints**:

| Método HTTP | Uso típico |
|-------------|-----------|
| **GET**     | Consultar datos |
| **POST**    | Crear un nuevo recurso |
| **PUT**     | Actualizar datos |
| **DELETE**  | Eliminar datos |

Las respuestas suelen enviarse en **JSON**.

---

## ¿Para qué se usa una API REST?
Una API REST permite:

- Centralizar la lógica del sistema  
- Integrar aplicaciones  
- Separar frontend y backend  
- Automatizar procesos  
- Facilitar integraciones de terceros  

---

## 🔧 ¿Qué contiene este repositorio?
```
api-rest-base/
├── config/
│ └── config.php
├── db/
│ └── schema.sql
├── public/
│ └── api/
│ └── products.php
├── src/
│ ├── Database.php
│ └── ProductRepository.php
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

## 🚀 Cómo poner en marcha la API

### 1️⃣ Clonar el repositorio
```
git clone https://github.com/TU-USUARIO/api-rest-base.git
```

### 2️⃣ Crear la base de datos
Importa el archivo: `db/schema.sql`

### 3️⃣ Configurar la conexión
Edita `config/config.php` con tus credenciales locales.

### 4️⃣ Ejecutar la API
Ejemplo de endpoint:
```
http://localhost/api-rest-base/public/api/products
```

---

## 🧪 ¿Qué es Postman?
**Postman** es una herramienta profesional para probar APIs REST.

Permite:

- Enviar peticiones HTTP  
- Probar respuestas JSON  
- Añadir cabeceras, parámetros, tokens  
- Organizar colecciones de pruebas  

Guía oficial recomendada:  
🔗 https://learning.postman.com/docs/getting-started/introduction/

Ejemplo de GET:

GET http://localhost/api-rest-base/public/api/products?id=1

Content-Type: application/json
```yaml
{
   "id": 1
   "name": "Teclado",
   "price": 19.90
}
```

---

## 🔐 Seguridad básica en APIs REST

### ✔ Tokens simétricos (nivel adecuado DAW2)
El cliente envía un token compartido con el servidor:

```
Authorization: Bearer MI-CLAVE-SECRETA
```

El servidor valida si la clave es correcta.

### ✔ JWT (JSON Web Tokens) — ampliación
Token firmado criptográficamente  
(más seguro, más profesional, opcional para alumnos avanzados).

Recurso externo recomendado:  
🔗 https://developer.mozilla.org/es/docs/Web/Security/API_security

---

## 📚 Importancia de documentar una API
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

## 📝 Generar documentación con apidoc

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

## Próximos pasos (Actividad 3)

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
