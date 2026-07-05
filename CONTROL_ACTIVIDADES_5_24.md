# Control de actividades 5 a 24

Este archivo sirve como checklist del avance del repositorio de entregas.

## Actividades 5 a 21

El avance de estas actividades queda en el proyecto actual:

- Actividad 5: Base de datos relacional y respaldo SQL en `database/backups`.
- Actividad 6: Actividad teorica externa, sin cambios obligatorios en codigo.
- Actividad 7: CSS/Tailwind/Flowbite configurado.
- Actividad 8: Plantilla administrativa, formularios y listados.
- Actividad 9: Modelos y relaciones principales.
- Actividad 10: Controladores y rutas manuales.
- Actividad 11: CRUD listar.
- Actividad 12: CRUD insertar con validaciones.
- Actividad 13: CRUD editar y actualizar.
- Actividad 14: CRUD mostrar y borrar.
- Actividad 15: Actividad teorica externa sobre API, servicio, REST y RESTful.
- Actividad 16: API de geolocalizacion en vista `geo`.
- Actividad 17: CRUD con imagenes en administradores, clientes y productos.
- Actividad 18: Login manual con guard `admin`.
- Actividad 19: Autenticacion con red social queda como actividad dependiente de credenciales externas.
- Actividad 20: Roles `master` y `base` para autorizacion.
- Actividad 21: Documento teorico externo sobre APIs.

## Actividad 22: API REST Admin Datos

Implementado en:

- `routes/api.php`
- `app/Http/Controllers/Api/AdministradorApiController.php`
- `app/Http/Controllers/Api/ClienteApiController.php`
- `app/Http/Controllers/Api/ProductoApiController.php`
- `app/Http/Controllers/Api/PedidoApiController.php`
- `app/Http/Controllers/Api/CarritoApiController.php`

Incluye metodos:

- `index`
- `store`
- `show`
- `update`
- `destroy`

## Actividad 23: API REST Admin Imagenes

Implementado en:

- Administradores: campo `pic`.
- Clientes: campo `pic`.
- Productos: campos `pic1`, `pic2`, `pic3`.

Las imagenes se reciben con `form-data` desde Postman y se guardan en:

- `public/imagenes/administradores`
- `public/imagenes/clientes`
- `public/imagenes/productos`

## Actividad 24: API REST Admin Token Sanctum

Implementado en:

- `app/Models/Administrador.php`
- `app/Http/Controllers/Api/AdministradorAuthController.php`
- `routes/api.php`

Endpoints:

- `POST /api/admin/login`
- `GET /api/admin/perfil`
- `POST /api/admin/logout`

Todas las rutas CRUD estan protegidas con:

```php
Route::middleware('auth:sanctum')
```

## Guia para video

Usar el archivo:

```txt
GUIA_POSTMAN_ACTIVIDADES_22_24.md
```

para probar los endpoints con Postman.
