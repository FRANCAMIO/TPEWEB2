
WEB2-PARTE3 - API para E-Commerce de Zapatillas
Alumno: Francisco Camio

Descripción
Este proyecto implementa una API para gestionar productos de zapatillas en un E-commerce. La API permite obtener, insertar, modificar y listar zapatillas, con la posibilidad de ordenarlas por diferentes criterios y realizar consultas paginadas.

Endpoints
1. Obtener Zapatillas Ordenadas
Endpoint: http://localhost/WEBTP3/api/zapatillas
Método: GET
Descripción: Retorna todas las zapatillas ordenadas según el parámetro especificado.

Parámetros de Consulta:
sort_by:
Puede ser uno de los siguientes:
"ID"
"id_marca"
"diseño"
"talle"
"material"
order:
Puede ser uno de los siguientes:
"ASC" (ascendente)
"DESC" (descendente)
Ejemplos de Uso:
Ordenar por ID de manera descendente:
http://localhost/TPEWEB2/PARTE3/api/zapatillas?sort_by=ID&order=DESC

Ordenar por marca de manera ascendente:
http://localhost/TPEWEB2/PARTE3/api/zapatillas?sort_by=id_marca&order=ASC

Ordenar por tamaño de manera ascendente:
http://localhost/TPEWEB2/PARTE3/api/zapatillas?sort_by=talle&order=ASC

Paginación:
Puedes elegir cuántas páginas quieres y cuántas zapatillas por página.

Parámetros adicionales:

page: Número de la página (tipo int)
per_page: Número de zapatillas por página (tipo int)
Ejemplo de Paginación:

http://localhost/TPEWEB2/PARTE3/api/zapatillas?sort_by=ID&order=DESC&page=1&per_page=2
Este ejemplo traerá 2 zapatillas por página en la primera página.
2. Modificar una Zapatilla
Endpoint: http://localhost/TPEWEB2/PARTE3/api/zapatilla/:id
Método: PUT
Descripción: Modifica una zapatilla existente.

Formato JSON de Solicitud:
json
Copiar código
{
    "id_marca": "1",
    "diseño": "Air Max 2024",
    "talle": "43",
    "material": "Cuero sintético"
}
