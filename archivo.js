var urlWS = "";
$(document).ready(function() {
    urlWS = "//infguide.byethost7.com/server/";
    leer(1);
    crearTablaKendo();
});

function crearTablaKendo() {
    $("#tablaKendo").kendoGrid({
        dataSource: {
            pageSize: 5,
            transport: {
                read: {
                    url: urlWS + "lugares/put",
                    dataType: "json"
                }
            }
        },
        columns: [
            { field: "identification", title: "Id" },
            { field: "nombreLugar", title: "Lugares" },
            { field: "nombreProvincia", title: "Provincias" },
            { field: "descripcion", title: "Detalles" }
        ],
        pageable: true,
        selectable: true,
        filterable: {
            mode: "row",
            extra: false,
            operators: {
                String: {
                    contains: "Contains"
                }
            }
        },
        change: itemSeleccionado
    });
}

function itemSeleccionado() {
    var datos = $("#tablaKendo").data("kendoGrid");
    var selectedItem = datos.dataItem(datos.select());
    alert('El nombre de la provincia en donde se encuentra  ' + selectedItem.nombreLugar + ' esta en la provincia de' + selectedItem.nombreProvincia + ' y tiene la siguiente descripcion' + selectedItem.descripcion + '  es: ' + selectedItem.identificacion);
}


function leer(id) {
    if (id == 0) {
        urltorequest = urlWS + "nombreLugar/leer";
    } else {
        urltorequest = urlWS + "nombreLugar/leer?id=" + id;
    }
    $.ajax({
        type: "get",
        url: urltorequest,
        async: true,
        success: function(respuesta) {
            toshow = JSON.parse(respuesta);
            cabeceraTabla = "<table class=\"table table-condensed\"><thead><tr><th>id</th><th>nombreLugar</th></tr></thead><tbody>";
            pieTabla = "</tbody></table>";
            contenidoTabla = "";
            $(toshow).each(function(key, value) {
                contenidoTabla = contenidoTabla + "<tr><td>" + value.id + "</td><td>" + value.nombreLugar + "</td></tr>";
            });
            document.getElementById("respuesta").innerHTML = cabeceraTabla + contenidoTabla + pieTabla;
        }
    });
    limpiar();
}

function borrar() {
    id = document.getElementById("id").value;
    urltorequest = urlWS + "nombreLugar/borrar?id=" + id;
    $.ajax({
        type: "get",
        url: urltorequest,
        async: false,
        success: function(respuesta) {
            if (respuesta == "false") {
                alert("Error al borrar el registro " + id + ".");
            } else {
                alert("Registro borrado: " + id + ".");
            }
        }
    });
    leer(1);
}

function crear(id) {
    id = document.getElementById("id").value;
    descripcion = document.getElementById("nombreLugar").value;
    urltorequest = urlWS + "nombreLugar/crear";
    $.ajax({
        type: "post",
        url: urltorequest,
        data: JSON.stringify({ id: id, nombreLugar: nombreLugar }),
        async: false,
        success: function(respuesta) {
            if (respuesta == "false") {
                alert("Error al crear el registro");
            } else {
                alert("Registro creado.");
            }
        }
    });
    leer();
}

function actualizar() {
    id = document.getElementById("id").value;
    descripcion = document.getElementById("nombreLugar").value;
    urltorequest = urlWS + "nombreLugar/actualizar";
    $.ajax({
        type: "post",
        url: urltorequest,
        data: JSON.stringify({ id: id, nombreLugar: nombreLugar }),
        async: false,
        success: function(respuesta) {
            if (respuesta == "false") {
                alert("Error al actualizar el registro");
            } else {
                alert("Registro actualizado.");
            }
        }
    });
    leer(1);
}