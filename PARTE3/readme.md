WEB2-PARTE3 - API para E-Commerce de Zapatillas
Alumno: Francisco Camio

Descripción
Este proyecto implementa una API para gestionar productos de zapatillas en un E-commerce. La API permite obtener, insertar, modificar y listar zapatillas, con la posibilidad de ordenarlas por diferentes criterios y realizar consultas paginadas.


1. Obtener zapatillas ordenadas
Endpoint: http://localhost/WEBTP3/api/zapatillas
Método: GET
Descripción: Retorna todas las zapatillas ordenadas según el parámetro especificado.
Parámetros de consulta:

sort_by: Puede ser "ID", "id_marca", "diseño", "talle" o "material".
order: Puede ser "ASC" (ascendente) o "DESC" (descendente).
Ejemplos de uso:

Ordenar por ID de manera descendente: http://localhost/TPEWEB2/PARTE3/api/zapatillas?sort_by=ID&order=DESC
Ordenar por marca de manera ascendente: http://localhost/TPEWEB2/PARTE3/api/zapatillas?sort_by=brand&order=ASC
Ordenar por tamaño de manera ascendente: http://localhost/TPEWEB2/PARTE3/api/zapatillas?sort_by=size&order=ASC
Además, puedes elegir cuántas páginas quieres y cuántas zapatillas por página:

Parámetros adicionales:

page (int).
per_page (int).
Ejemplo:

http://localhost/TPEWEB2/PARTE3/api/zapatillas?sort_by=ID&order=DESC&page=1&per_page=2
Este endpoint traerá 2 zapatillas por página en la primera página.

2. Modificar una zapatilla
Endpoint: http://localhost/TPEWEB2/PARTE3/api/zapatilla/:id
Método: PUT
Descripción: Modifica una zapatilla existente.
Formato JSON de solicitud:

json
{
    "id_marca": "1",
    "diseño": "Air Max 2024",
    "talle": "43",
    "material": "Cuero sintético"
}
