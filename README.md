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


## Codigo Reseñas/Filtro/Insertar ReseñasEste código realiza lo siguiente:

1. **Evento de Carga de la Página:**
   - Al cargar la página, se realiza una solicitud a una API para obtener las reseñas.
   - Se procesa la respuesta JSON y se llama a la función `AllComentarios` para mostrar las reseñas en la página.

2. **Función `AllComentarios`:**
   - Recibe un arreglo de reseñas y crea elementos HTML para mostrar cada reseña.
   - Las reseñas se organizan en divs con clases específicas basadas en su valoración (`VALORACION`).
   - Las reseñas se añaden al contenedor con el ID 'reseñadas' en la página.

3. **Funciones de Manipulación de Estrellas (`estrellas`):**
   - Genera un string de estrellas doradas y círculos grises para representar la valoración.

4. **Manejo de Checkboxes de Categoría (`categoryCheckboxes`):**
   - Asigna eventos de cambio a los checkboxes de categoría para filtrar las reseñas por valoración.

5. **Función `updateReviews`:**
   - Filtra y muestra las reseñas según las categorías de valoración seleccionadas.
   - Ordena las reseñas según la opción seleccionada en el elemento con el ID 'orden'.
   - Actualiza el contenido en el contenedor 'reseñadas' de acuerdo con las filtraciones y el orden.

6. **Evento de Cambio en el Selector de Orden (`ordenSelector`):**
   - Asigna un evento de cambio al selector de orden para actualizar las reseñas cuando cambia la opción de orden.

7. **PHP (Servidor):**
   - En el lado del servidor, la función `AllComentarios` realiza una consulta a la base de datos para obtener información de reseñas y usuarios, luego devuelve un arreglo de objetos `Reseña`.

En resumen, este código implementa un sistema dinámico en el que se cargan reseñas desde una API al cargar la página, permite filtrar y ordenar las reseñas según las preferencias del usuario y utiliza PHP en el servidor para obtener datos de la base de datos.
![image](https://github.com/isaacmskk/norauto/assets/145151333/64ab26f5-f4bc-4b8f-b722-c8aad7c3b2a3)

![image](https://github.com/isaacmskk/norauto/assets/145151333/8415a436-dca7-43f4-a356-2725aaed034e)

![image](https://github.com/isaacmskk/norauto/assets/145151333/48b4bf72-2a71-4d3b-a65e-4cb60bf6ca45)

![image](https://github.com/isaacmskk/norauto/assets/145151333/d9df0e05-97b8-4531-af68-d80fbee87269)

Este código implementa la funcionalidad de enviar un comentario y valoración mediante un formulario en una página web. Aquí tienes un resumen:

1. **Evento de Envío del Formulario:**
   - Cuando se envía el formulario con el ID 'comentarioForm', se ejecuta una función de manejo de eventos.
   - Se obtienen los valores de ID_CLIENTE, ID_PEDIDO, COMENTARIO y VALORACION del formulario.
   - Se construye un objeto de datos (`data`) con estos valores.
   - Se realiza una solicitud POST a una API remota utilizando la función `fetch` para enviar los datos.

2. **PHP (Servidor):**
   - En el lado del servidor, se verifica si la acción es 'insertar' a través de `$_GET`.
   - Se lee el flujo de entrada JSON para obtener los datos enviados desde el formulario.
   - Se asegura de que los datos requeridos estén presentes y luego llama a la función `insertarComentario` en `ComentarioDAO` para insertar el comentario y la valoración en la base de datos.
   - Devuelve una respuesta JSON indicando si la operación fue exitosa.

3. **Clase ComentarioDAO:**
   - La clase `ComentarioDAO` tiene un método estático `insertarComentario` que realiza la conexión a la base de datos, prepara la consulta SQL para insertar un comentario en la tabla 'reseñas' y ejecuta la consulta.

En resumen, este código implementa una funcionalidad completa de envío de comentarios y valoraciones desde el cliente a través de un formulario web y lo procesa en el servidor PHP para almacenarlo en la base de datos.

![image](https://github.com/isaacmskk/norauto/assets/145151333/24a6f295-4006-4bd6-9040-acd778459310)


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


Este código define una clase llamada `PuntosDAO` que proporciona funciones para interactuar con la base de datos en relación con los puntos de los clientes. Aquí está un resumen:

- `AllPuntos($id_cliente)`: Devuelve la cantidad de puntos actuales de un cliente específico consultando la base de datos.

- `actualizarPuntos($id_cliente, $nuevosPuntos)`: Actualiza la cantidad de puntos de un cliente en la base de datos con un nuevo valor proporcionado.

- `acumularPuntosPorCompra($id_cliente, $total)`: Calcula la cantidad de puntos a acumular basándose en el total de la compra, luego actualiza la base de datos sumando estos puntos a los puntos existentes del cliente.

- `calcularPuntosAcumulados($total, $id_cliente)`: Calcula la cantidad de puntos que un cliente acumularía basándose en el total de una compra, sin realizar ninguna actualización en la base de datos.

En resumen, esta clase proporciona funciones para obtener, actualizar y calcular puntos de clientes en la base de datos, así como para calcular puntos acumulados sin realizar actualizaciones.

![image](https://github.com/isaacmskk/norauto/assets/145151333/52fd0f4b-40d1-47d0-8e29-09c69e1e2c5b)

## Codigo generador qr
Evento de Carga de la Página:

Al cargar la página, se asigna un evento a la función anónima que se ejecutará cuando el contenido DOM esté completamente cargado.
Evento de Envío de Formulario ('qr'):

Cuando se envía el formulario con el ID 'qr', se ejecuta una función de manejo de eventos.
La función utiliza event.preventDefault() para evitar que el formulario se envíe normalmente y recargue la página.
Generación de Código QR:

Se define una URL que se utilizará como contenido para el código QR (en este caso, la URL de la página asociada al controlador 'plato' y la acción 'qrpage').
Se crea un contenedor div para el código QR.
Se utiliza la librería QRCode para generar un código QR con la URL especificada y se coloca dentro del contenedor.
Ventana Emergente con Código QR:

Se utiliza SweetAlert (una librería para ventanas emergentes personalizadas) para mostrar una ventana emergente con el código QR generado.
La ventana emergente incluye un título, un icono de éxito y el contenido del código QR en un contenedor.
Botón de Confirmación en la Ventana Emergente:

Se agrega un botón de confirmación a la ventana emergente con el texto "Aceptar".
Cuando el botón se presiona, se envía el formulario al backend para finalizar la compra.
Evento de Confirmación (then):

Se utiliza el método then para realizar acciones después de que el usuario haya interactuado con la ventana emergente.
Si el valor (que representa la acción del botón "Aceptar") es verdadero, se envía el formulario al backend para finalizar la compra.
En resumen, este código genera un código QR basado en una URL específica, lo muestra al usuario en una ventana emergente utilizando SweetAlert, y luego permite al usuario finalizar la compra al confirmar la ventana emergente.

![image](https://github.com/isaacmskk/norauto/assets/145151333/7fca8cba-b7d2-412f-bdfb-a870425f7bcc)

Este código representa una página HTML que muestra detalles sobre el último pedido. Aquí hay una explicación:

 **Cabecera del Documento (`head`):**
   - Define el título de la página como "Último Pedido".
   - Establece la codificación de caracteres a UTF-8.
   - Incluye enlaces a hojas de estilo (`bootstrap.min.css`, `cssconjunto.css` y `cssqr.css`).

 **Cuerpo del Documento (`body`):**
   - Inicia una sesión PHP (`session_start()`) para gestionar variables de sesión.
   - Muestra un título `<h2>` que dice "Último Pedido".

 **Bloque PHP dentro del Cuerpo:**
   - Comienza un bloque PHP (`<?php ... ?>`) que verifica si la variable `$resultado` no es `null`. Si hay información en `$resultado`, muestra los detalles del pedido en un contenedor `<div class="pedido row">`. Si no hay información, muestra un mensaje indicando que no se encontró información del pedido.

 **Detalles del Pedido (`<div class="pedido row">`):**
   - Muestra los detalles del pedido dentro de un párrafo (`<p>`), incluyendo el ID del pedido, la fecha, el ID del cliente, el ID del plato, el total del pedido, los puntos asociados al pedido y la propina aplicada.

 **Script JavaScript (`<script src="../javascript/qrgenerator.js"></script>`):**
   - Incluye un archivo JavaScript (`qrgenerator.js`) que se encuentra en la ruta '../javascript/'.

En resumen, esta página HTML utiliza PHP para mostrar los detalles del último pedido, y también incluye un script JavaScript que parece estar relacionado con la generación de códigos QR (`qrgenerator.js`).

![image](https://github.com/isaacmskk/norauto/assets/145151333/a6b44c36-d560-41a6-8f46-6f5599639be7)

Esta es la funcion del controller de qrpage, esta llama a las vista y a la funcion de platoDAO de ultimopedido

![image](https://github.com/isaacmskk/norauto/assets/145151333/35458565-92e5-41a1-b9fb-fad74edb208d)

Aqui las funciones que se llaman y que serviran para :

![image](https://github.com/isaacmskk/norauto/assets/145151333/8b12b851-6144-4b9a-8ec7-3ec2a0112497)

![image](https://github.com/isaacmskk/norauto/assets/145151333/e675e324-3044-4076-9a7d-6082b6083c8b)




