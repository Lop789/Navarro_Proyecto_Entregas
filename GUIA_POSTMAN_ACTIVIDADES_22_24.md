# Guia Postman Actividades 22, 23 y 24

Base URL:

```txt
http://127.0.0.1:8000/api
```

## 1. Iniciar servidor

```bash
php artisan serve
```

## 2. Obtener token Sanctum

Metodo: `POST`

URL:

```txt
http://127.0.0.1:8000/api/admin/login
```

Body: `raw` -> `JSON`

```json
{
  "correo": "correo_del_admin",
  "contrasena": "contrasena_del_admin"
}
```

Copiar el valor de `token`.

## 3. Usar token en Postman

En cada endpoint protegido:

Authorization:

```txt
Type: Bearer Token
Token: pegar_el_token
```

## 4. CRUD de administradores

Listar:

```txt
GET /api/administradores
```

Mostrar:

```txt
GET /api/administradores/1
```

Crear con imagen:

```txt
POST /api/administradores
```

Body: `form-data`

Campos:

```txt
nombre
apellido
telefono
correo
estado
rol
contrasena
pic    tipo File
```

Actualizar:

```txt
PUT /api/administradores/1
```

Eliminar:

```txt
DELETE /api/administradores/1
```

## 5. CRUD de clientes

Endpoints:

```txt
GET    /api/clientes
POST   /api/clientes
GET    /api/clientes/1
PUT    /api/clientes/1
DELETE /api/clientes/1
```

Crear con imagen usa `form-data`:

```txt
nombres
apellido_paterno
apellido_materno
direccion
correo
estado
contrasena
pic    tipo File
```

## 6. CRUD de productos

Endpoints:

```txt
GET    /api/productos
POST   /api/productos
GET    /api/productos/1
PUT    /api/productos/1
DELETE /api/productos/1
```

Crear con imagenes usa `form-data`:

```txt
nombre
categoria
descripcion
ahorro_kgco2e
ahorro_agua_litros
precio
stock
estado
pic1    tipo File
pic2    tipo File
pic3    tipo File
```

## 7. CRUD de pedidos

Endpoints:

```txt
GET    /api/pedidos
POST   /api/pedidos
GET    /api/pedidos/1
PUT    /api/pedidos/1
DELETE /api/pedidos/1
```

Body JSON para crear o actualizar:

```json
{
  "cliente_id": 1,
  "total": 250,
  "estado": "pendiente"
}
```

## 8. CRUD de carrito

Endpoints:

```txt
GET    /api/carrito
POST   /api/carrito
GET    /api/carrito/1
PUT    /api/carrito/1
DELETE /api/carrito/1
```

Body JSON:

```json
{
  "session_id": "demo-postman"
}
```

## 9. Cerrar sesion

Metodo: `POST`

URL:

```txt
POST /api/admin/logout
```

Debe enviarse con Bearer Token.

## Orden recomendado para el video

1. Mostrar login y copiar token.
2. Mostrar que sin token un endpoint protegido no permite acceso.
3. Pegar el Bearer Token.
4. Hacer GET, POST, GET por ID, PUT y DELETE en productos.
5. Repetir rapido GET y POST en administradores/clientes.
6. Mostrar que las imagenes se guardan en `public/imagenes`.
7. Cerrar sesion con logout.
