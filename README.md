# ⚙️ Funcionalidades Incorporadas

## Insertar.php

Funcionalidad
  * Inserta un nuevo registro en la base de datos `eventos`.

Proceso
  1. Recibe `id`, `tipo`, `publicación`, `titulo` y `descripción` a través de una solicitud `POST`.

  2. Construye un nodo XML con los datos proporcionados e inserta este nodo en `/temas` de la base de datos utilizando XQuery.

  3. Cierra la sesión de la base de datos después de la ejecución.

Formulario
  * Un formulario recopila los datos necesarios para el nuevo registro.

---
## Borrar.php

Funcionalidad
  * Elimina un registro de la base de datos `eventos`.

Proceso
  1. Recibe un `id` a través de una solicitud `POST`.

  2. Ejecuta una consulta XQuery para localizar y eliminar el nodo XML que coincide con el `id`.

  3. Cierra la sesión de la base de datos después de la ejecución.

Formulario
  * Un formulario simple permite al usuario ingresar el `id` del registro a eliminar.

---
## Filtrar.php

Funcionalidad
  * Filtra y muestra un registro específico de la base de datos `eventos` basado en el `id` proporcionado.

Proceso
  1. Recibe un `id` a través de una solicitud `POST`.

  2. Abre la base de datos `eventos`.

  3. Ejecuta una consulta XQuery para buscar el nodo XML que coincide con el `id`.

  4. Muestra el resultado del nodo encontrado en formato XML, escapando caracteres especiales con `htmlentities` para evitar
     problemas de visualización.

  5. Cierra la consulta y la sesión de la base de datos después de la ejecución.

Formulario
  * Permite al usuario ingresar el `id` del registro que desea buscar.

---
## Resaltadoseconomicos.php

Funcionalidad:
 * Permite crear o eliminar la base de datos resultadoseconomicos en el servidor BaseX.

Proceso:

 1. Verifica si la solicitud es de tipo `POST`.
   
 2. Recoge la acción seleccionada (crear o eliminar) desde el formulario.
  
 3. Según la acción:
    - Crear: Ejecuta el comando `create db resultadoseconomicos` para crear la base de datos.
    - Eliminar: Ejecuta el comando `drop db resultadoseconomicos` para eliminar la base de datos.
    - Muestra un mensaje de éxito o error según el resultado de la operación.
    
Formulario:
 - Ofrece un menú desplegable para seleccionar la acción (crear o eliminar) y un botón para ejecutar la operación.
