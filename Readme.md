# Algunas notas

## Lanzar el sitio en local

Usando el Makefile hacer en la carpeta del proyecto 
```bash
make run-php
```
esto levantará el sitio que podrá ser visitado en `localhost:8081`. 
El puerto `8080` ya estaba ocupado por otro servicio. 

### Algunas notas

El sitio está usando la base datos en un docker. El contenedor se llama `my-postgres`. 
En la conexiones se puede ver el modo de acceder al mismo. 
El contenedor debe estar funcionando para poder lanzar el sitio web. 
Esto se puede hacer desde el VSCode. 

## Debuguear

Con el sitio corriendo, lanzar el debuguer en VScode usando la configuration `Listen for Xdebug`.


## Creación de la tabla users

Para que `user_id` sea primary key y autoincremental podemos usar el pseudo tipo de `SERIAL`.
Primeramente eliminamos la tabla, si existe, para reconstruirla.

```sql
DROP TABLE IF EXISTS users;

CREATE TABLE users
(
  user_id      serial  NOT NULL,
  name         varchar NOT NULL,
  email        VARCHAR NOT NULL,
  password     varchar,
  address      varchar NOT NULL,
  city         varchar NOT NULL,
  postal_code  varchar NOT NULL,
  phone_number integer NOT NULL,
  PRIMARY KEY (user_id)
);
```

Luego vamos a importar nuevos datos que incluyen los `user_id`. 
Esto es necesario para que los usuarios mantengan el mismo `user_id` y los test
en producción y local sean  los mismo. Como importamos los datos con `user_id`
debemos mover el valor del `user_id` autoincremental. Esto lo conseguimos con 

```sql
SELECT setval('users_user_id_seq', (SELECT MAX(user_id) FROM users));
```

## Acerca del Carrito

Este viaja en la variable `$_SESSION['cart]` y tiene la forma
```json
{
  <book_id>:<quantity>
}
```

## Ideas acerca del proceso de pago

```gerkhin
feature: Pagar el carrito

Scenario:
  Given: Usuario en la página del carrito
  And: usuario logueado
  And: tienen libros en el carrito
  When: click en pagar
  And: usuario es redireccionado a "Resumen de compra"
  And: usuario click en botón "Confirmar compra"
  Then: Página de "Compra confirmada" se muestra


Scenario:
  Given: Usuario en la página del carrito
  And: usuario no logueado
  And: usuario existe
  And: tienen libros en el carrito
  When: click en pagar
  And: usuario es redireccionado a "Login"
  And: usuario inicia session
  And: usuario es redireccionado a "Resumen de compra"
  And: usuario click en botón "Confirmar compra"
  Then: Página de "Compra confirmada" se muestra  

Scenario:
  Given: Usuario en la página del carrito
  And: usuario no logueado
  And: usuario no existe
  .......... 

```

### Ideas del primer escenario

```
c_resumen_de_compra
  prepara el resumen esto es
  cada por línea con cantidades y totales.
  actualiza la session

v_resumen_de_compra
  muestra el listado
  bóton de cancelar
  notón confirmar compra

c_confirmar_compra
  llama a modelo m_insertar_order_lines
  llama a modelo m_insertar_order
  unset $_sessio['cart'] //vacía el carrito

v_confirmar_compra
  muestra "compra exitosa"
  bóton de "continuar comprando"
  

  (js: redirige a indíce)
```





## POR HACER

* Unificar check email con el password.
* Hay un BUG cuando se introduce la contraseña incorrecta (creemos)
* En el carrito hay que manejar las cantidades de libros. En particular un libro repetido no debe aparecer dos veces. 
* En login no se puede ir al carrito.
* verificar que todos los controladores cierren la conexión a la BD. (pg_close)
* desde la página de compra realizada y login la navbar no funciona
* ponerle fecha a los pedidos en el historial
* añadir las cantidades
* Cuando se aumenta la cantidad en el carrito no se actualiza en el footer de compra ni en la cesta superior
* Ocultar resumen de la compra cuando no hay objetos


