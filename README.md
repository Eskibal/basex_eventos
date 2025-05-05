# ⚙️ Funcionalidades Incorporadas

## Insertar.php

Funcionalidad:
> Inserta un nuevo registro en la base de datos eventos.

Proceso:
> 1. Recibe id, tipo, publicación, titulo y descripción a través de una solicitud POST.
> 2. Construye un nodo XML con los datos proporcionados e inserta este nodo en /temas de la base de datos utilizando XQuery.
> 3. Cierra la sesión de la base de datos después de la ejecución.

Formulario:
> Un formulario recopila los datos necesarios para el nuevo registro.

