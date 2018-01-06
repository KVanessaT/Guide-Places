var urlWS = "";
$(document).ready(function () {
    urlWS = "http://infguide.byethost7.com/server/";
    crearTablaKendo();
});

function crearPDF() {
    kendo.drawing.drawDOM($("#contenido")).then(function (group) {
        kendo.drawing.pdf.saveAs(group, "Converted PDF.pdf");
    });
}

function crearTablaKendo() {
    $("#tablaKendo").kendoGrid({
        dataSource: {
            pageSize: 5,
            transport: {
                read: {
                    url: urlWS + "lugares/leer",
                    dataType: "json"
                }
            }
        },
        columns: [{
                field: "idLugar",
                title: "ID"
            },
            {
                field: "nombreLugar",
                title: "NOMBRE"
            },
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
    alert('El ID' + selectedItem.idLugar + ' corresponde a: ' + selectedItem.nombreLugar);
}

function limpiar() {
    document.getElementById("idLugar").value = "";
    document.getElementById("nombreLugar").value = "";
}

function leer() {
    crearTablaKendo();
}


function leerfiltrado() {
    filtro = document.getElementById("nombreLugarBuscar").value;
    urltorequest = urlWS + "lugares/leer_filtrado";
    $.ajax({
        type: "get",
        url: urltorequest + "?columna=nombreLugar&tipo_filtro=contiene&filtro=" + filtro,
        async: true,
        success: function (respuesta) {
            toshow = JSON.parse(respuesta);
            cabeceraTabla = "<table class=\"table table-condensed\"><thead><tr><th>id</th><th>nombre</th></tr></thead><tbody>";
            pieTabla = "</tbody></table>";
            contenidoTabla = "";
            $(toshow).each(function (key, value) {
                contenidoTabla = contenidoTabla + "<tr><td>" + value.idLugar + "</td><td>" + value.nombreLugar + "</td></tr>";
            });
            document.getElementById("respuesta").innerHTML = cabeceraTabla + contenidoTabla + pieTabla;
        }
    });
}

// function leer(id) {
//     if (id == 0) {
//         urltorequest = urlWS + "lugares/leer";
//     } else {
//         urltorequest = urlWS + "lugares/leer?id=" + id;
//     }
//     $.ajax({
//         type: "get",
//         url: urltorequest,
//         async: true,
//         success: function (respuesta) {
//             toshow = JSON.parse(respuesta);
//             cabeceraTabla = "<table class=\"table table-condensed\"><thead><tr><th>idLugar</th><th>NombreLugar</th></tr></thead><tbody>";
//             pieTabla = "</tbody></table>";
//             contenidoTabla = "";
//             $(toshow).each(function (key, value) {
//                 contenidoTabla = contenidoTabla + "<tr><td>" + value.idLugar + "</td><td>" + value.nombreLugar + "</td></tr>";
//             });
//             document.getElementById("respuesta").innerHTML = cabeceraTabla + contenidoTabla + pieTabla;
//         }
//     });
//     limpiar();

// }


function borrar() {
    idLugar = document.getElementById("idLugar").value;
    urltorequest = urlWS + "lugares/borrar?id=" + idLugar;
    $.ajax({
        type: "get",
        url: urltorequest,
        async: false,
        success: function (respuesta) {
            if (respuesta == "false") {
                alert("Error al borrar el registro " + idLugar + ".");
            } else {
                alert("Registro borrado: " + idLugar + ".");
            }
        }
    });
    leer();
}

function crear() {
    idLugar = document.getElementById("idLugar").value;
    nombreLugar = document.getElementById("nombreLugar").value;
    urltorequest = urlWS + "lugares/crear";
    $.ajax({
        type: "post",
        url: urltorequest,
        data: JSON.stringify({
            idLugar: idLugar,
            nombreLugar: nombreLugar
        }),
        async: false,
        success: function (respuesta) {
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
    idLugar = document.getElementById("idLugar").value;
    nombreLugar = document.getElementById("nombreLugar").value;
    urltorequest = urlWS + "lugares/actualizar";
    $.ajax({
        type: "post",
        url: urltorequest,
        data: JSON.stringify({
            idLugar: idLugar,
            nombreLugar: nombreLugar
        }),
        async: false,
        success: function (respuesta) {
            if (respuesta == "false") {
                swal("Error al actualizar el registro");
            } else {
                swal("Registro actualizado.");
            }
        }
    });
    leer();
}

function myMap() {
    var mapProp = {
        center: new google.maps.LatLng(51.508742, -0.120850),
        zoom: 5,
    };
    var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
}

function insertVideo(e) {
    var editor = $(this).data("kendoEditor");

    var dialog = $($("#insertVideo-template").html())
        .find(".insertVideo-insert")
        .click(function () {

            var media = testUrlForMedia(dialog.element.find("input").val());
            if (media) {
                var template = kendo.template($("#youTube-template").html());

                editor.exec("insertHtml", {
                    value: template({
                        source: media.id
                    })
                });
            }

            dialog.close();
        })
        .end()
        .find(".insertVideo-cancel")
        .click(function () {
            dialog.close();
        })
        .end()
        .kendoWindow({
            modal: true,
            title: "Insert Video",
            animation: false,
            deactivate: function () {
                dialog.destroy();
            }
        }).data("kendoWindow");

    dialog.center().open();
}

// Check inserted URL for valid Media Link
function testUrlForMedia(pastedData) {
    var success = false;
    var media = {};
    if (pastedData.match('http://(www.)?youtube|youtu\.be')) {
        if (pastedData.match('embed')) {
            youtube_id = pastedData.split(/embed\//)[1].split('"')[0];
        } else {
            youtube_id = pastedData.split(/v\/|v=|youtu\.be\//)[1].split(/[?&]/)[0];
        }
        media.type = "youtube";
        media.id = youtube_id;
        success = true;
    }

    if (success) {
        return media;
    } else {
        alert("No valid media id detected.\nBe sure to use the \"Share\" url, located in the menu under the video on the youtube page.");
    }
    return false;
}
