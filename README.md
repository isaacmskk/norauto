# Página Web de Restauración Norauto

## Descripción del Proyecto
Esta es una página web de restauración basada en Norauto, desarrollada con tecnologías web como JavaScript, PHP, CSS y HTML. La aplicación tiene como objetivo proporcionar información sobre restauración de vehículos y servicios ofrecidos por Norauto.

## Funcionalidades Principales
- **Catálogo de Servicios:** Muestra una lista de servicios de restauración ofrecidos por Norauto.
- **Galería de Antes y Después:** Presenta imágenes de vehículos antes y después de la restauración.
- **Formulario de Contacto:** Permite a los usuarios ponerse en contacto con Norauto para solicitar más información o servicios.

## Tecnologías Utilizadas
- **JavaScript:** Para la interactividad del lado del cliente.
- **PHP:** Para el desarrollo del lado del servidor.
- **CSS:** Para el diseño y estilo de la página.
- **HTML:** Para la estructura y contenido de la página.

# JAVASCRIPTS

## Codigo Reseñas/Filtro/Insertar Reseñas
En este archivo js se han trabajado las reseñas de la pagina, para empezar tenemos el fetch que hara la busqueda de las reseñas a traves de la funcion buscar_reseña ubicada en el archivo ApiController. esta hace un foreach con gets a partir de la funcion allcomentarios que basicamente es un select de la tabla reseñas.
Luego tenemos la parte del filtro de reseñas que ordenara por checkbox dependiendo la valoracion y por valor ascendente o descendente.
![image](https://github.com/isaacmskk/norauto/assets/145151333/64ab26f5-f4bc-4b8f-b722-c8aad7c3b2a3)
![image](https://github.com/isaacmskk/norauto/assets/145151333/d9df0e05-97b8-4531-af68-d80fbee87269)
![image](https://github.com/isaacmskk/norauto/assets/145151333/8415a436-dca7-43f4-a356-2725aaed034e)
![image](https://github.com/isaacmskk/norauto/assets/145151333/48b4bf72-2a71-4d3b-a65e-4cb60bf6ca45)

Esta parte hará que cuando el usuario rellene el formulario para añadir la reseña, estos datos se recojan y con la función de insertarComentario se envien a la tabla de reseñas y con la función buscar_reseña se muestren.

![image](https://github.com/isaacmskk/norauto/assets/145151333/4786dc0d-3389-4461-a04a-1dacfdde13a8)

![image](https://github.com/isaacmskk/norauto/assets/145151333/be9ec123-f8f2-4c7c-92d4-86647eaba1d8)

![image](https://github.com/isaacmskk/norauto/assets/145151333/a3bb1f8e-8f68-4628-bef3-fce6dfbb9890)

## Codigo Filtro productos con LocalStorage
Este js funciona parecido al filtro de reseñas, la diferencia principal que este funciona con locastorage y el filtro es permanente hasta que se cambie.
- Selecciona todos los elementos con la clase 'category-checkbox'.
- Al cargar la página, verifica si hay categorías previamente seleccionadas almacenadas en localStorage. Si es así, marca las checkboxes correspondientes y -actualiza los productos.
- Asigna un evento de clic a cada checkbox. Al hacer clic, se actualizan los productos y se almacenan las categorías seleccionadas en localStorage.
- La función updateProducts() filtra y muestra los productos según las categorías seleccionadas o muestra todos si no hay selecciones.
- La función resetFilters() desmarca todas las checkboxes, actualiza los productos y elimina las categorías seleccionadas almacenadas en localStorage.
![image](https://github.com/isaacmskk/norauto/assets/145151333/9051d40b-d2ad-469c-aecc-a2db588d82fd)


## Codigo Puntos y Propinas
Este código realiza lo siguiente:

- Al cargar la página, envía una solicitud POST a una API para buscar puntos asociados a un cliente. Luego, actualiza el contenido HTML para mostrar la cantidad de puntos del cliente.
-  Obtiene referencias a elementos del DOM como el precio total, un checkbox y un campo de entrada de propina.
- Asigna eventos a cambios en el checkbox y la entrada de propina para actualizar el precio total en consecuencia.
- La función `actualizarPrecioTotal` calcula el nuevo precio total basándose en el precio original, el descuento de puntos (si el checkbox está marcado) y la propina ingresada.
- La función `AllPuntos` actualiza el contenido HTML para mostrar la cantidad de puntos del cliente.
![image](https://github.com/isaacmskk/norauto/assets/145151333/a100ad16-df7e-4db1-9445-1f24ad03a6fa)

En resumen, este código interactúa con una API para obtener puntos de un cliente, actualiza dinámicamente la interfaz de usuario según las interacciones del usuario (marcar el checkbox o ingresar propina), y muestra la cantidad de puntos del cliente en la página.
![image](https://github.com/isaacmskk/norauto/assets/145151333/c4e1f921-5f68-4576-90a7-9e9905102ae5)
Esta es la pagina de carrito y en la foto se muestra el form donde se aplican puntos y propinas:
![image](https://github.com/isaacmskk/norauto/assets/145151333/9a8a930b-e482-4d23-99f2-5917e51f44f7)
Esta es la clase donde se recuperan todos los puntos y se calculan los acumulados y las tasas:
![image](https://github.com/isaacmskk/norauto/assets/145151333/52fd0f4b-40d1-47d0-8e29-09c69e1e2c5b)

## Codigo generador qr

![image](https://github.com/isaacmskk/norauto/assets/145151333/8e9f94ff-592b-4264-b014-01e993d99369)


# PHP

## Codigo Nuevo PlatoDAO
![image](https://github.com/isaacmskk/norauto/assets/145151333/f097a854-9e44-4ef0-8c63-4509da8de886)

![image](https://github.com/isaacmskk/norauto/assets/145151333/6ddb58ed-4ed2-4a9d-a229-abfc979b0469)


## Codigo PuntosDAO
![image](https://github.com/isaacmskk/norauto/assets/145151333/4d72db0e-f4a3-4ece-aea0-2744be05c329)
![image](https://github.com/isaacmskk/norauto/assets/145151333/c2fbfb73-cb8f-425e-b218-ce744a7845d7)


## Codigo ComentariDAO
![image](https://github.com/isaacmskk/norauto/assets/145151333/264cb6cc-039c-42f0-876d-73f1ac2a5f40)

![image](https://github.com/isaacmskk/norauto/assets/145151333/b4997aef-2cf3-4c15-aabf-e8e13e856f11)

## Codigo generador qr

## Codigo generador qr



