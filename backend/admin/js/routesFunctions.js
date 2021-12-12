




$(function () { 
    

    $("#enviar").click(function () {
        addOrUpdate();
    });
    

    $("#cancelar").click(function () {
        cancelAction();
    });
    
});





$(document).ready(function () {


    cargarTablas();
    
});





function addOrUpdate() {
    
    
    if (validar()) {
        $.ajax({
            url: '../controller/routesController.php',
            data: {
                action:           $("#typeAction").val(),
                id:               $("#id").val(),
                city_o_id:        $("#city_o_id").val(),
                city_d_id:        $("#city_d_id").val(),
                route_name:       $("#route_name").val(),
                route_time:       $("#route_time").val(),
                airplane_id:      $("#airplane_id").val(),
                discount_id:      $("#discount_id").val()
            },
            error: function () { 
                swal("Error", "Se presento un error al enviar la informacion", "error");
            },
            success: function (data) { 
                var messageComplete = data.trim();
                var responseText = messageComplete.substring(2);
                var typeOfMessage = messageComplete.substring(0, 2);
                if (typeOfMessage === "M~") { //si todo esta corecto
                    clearForm();
                    $("#dt").DataTable().ajax.reload();
                    //alert(responseText);
                    swal("Confirmacion", responseText, "success");
                    
                    
                } else {//existe un error
                    swal("Error", responseText, "error");
                }
            },
            type: 'POST'
        });
    } else {
        swal("Error de validación", "Los datos del formulario no fueron digitados, por favor verificar", "error");
    }

}





function validar() {


    var validacion = true;
    
    if ($("#id").val() === "") {
        validacion = false;
    }

    if ($("#city_o_id").val() === "") {
        validacion = false;
    }

    if ($("#city_d_id").val() === "") {
        validacion = false;
    }

    if ($("#route_name").val() === "") {
        validacion = false;
    }

    if ($("#route_time").val() === "") {
        validacion = false;
    }

    if ($("#airplane_id").val() === "") {
        validacion = false;
    }

    if ($("#discount_id").val() === "") {
        validacion = false;
    }

    return validacion;

}





function clearForm() {


    $('#formX').trigger("reset");

}





function cancelAction() {


    clearForm();
    $("#typeAction").val("add");

}





function showByID(PK) {
    
    
    $.ajax({
        url: '../controller/routesController.php',
        data: {
            action: "show",
            id: PK
        },
        error: function () {
            swal("Error", "Se presento un error al consultar la informacion", "error");
        },
        success: function (data) {
            var objJSon = JSON.parse(data);
            $("#id").val(objJSon.id);
            $("#city_o_id").val(objJSon.city_o_id);
            $("#city_d_id").val(objJSon.city_d_id);
            $("#route_name").val(objJSon.route_name);
            $("#route_time").val(objJSon.route_time);
            $("#airplane_id").val(objJSon.airplane_id);
            $("#discount_id").val(objJSon.discount_id);
            $("#typeAction").val("update");
            
            swal("Confirmacion", "Los datos de la persona fueron cargados correctamente", "success");
        },
        type: 'POST'
    });

}





function deleteByID(PK) {


    $.ajax({
        url: '../controller/routesController.php',
        data: {
            action: "delete",
            id: PK
        },
        error: function () {
            swal("Error", "Se presento un error al eliminar la informacion", "error");
        },
        success: function (data) {
            var responseText = data.trim().substring(2);
            var typeOfMessage = data.trim().substring(0, 2);
            if (typeOfMessage === "M~") { //si todo esta corecto
                swal("Confirmacion", responseText, "success");
                clearForm();
                $("#dt").DataTable().ajax.reload();
            } else {//existe un error
                swal("Error", responseText, "error");
            }
        },
        type: 'POST'
    });

}





function cargarTablas() {


    var dataTable_const = function () {
        if ($("#dt").length) {
            $("#dt").DataTable({
                dom: "Bfrtip",
                bFilter: false,
                ordering: false,
                buttons: [
                    {
                        extend: "copy",
                        className: "btn-sm",
                        text: "Copiar"
                    },
                    {
                        extend: "csv",
                        className: "btn-sm",
                        text: "Exportar a CSV"
                    },
                    {
                        extend: "print",
                        className: "btn-sm",
                        text: "Imprimir"
                    }

                ],
                "columnDefs": [
                    {
                        targets: 7,
                        className: "dt-center",
                        render: function (data, type, row, meta) {
                            var botones =  '<button type="button" class="btn btn-default btn-xs text-white" aria-label="Left Align" onclick="showByID(\''+row[0]+'\');">Cargar</button> ';
                                botones += '<button type="button" class="btn btn-default btn-xs text-white" aria-label="Left Align" onclick="deleteByID(\''+row[0]+'\');">Eliminar</button>';
                            return botones;
                        }
                    }

                ],
                pageLength: 2,
                language: dt_lenguaje_espanol,
                ajax: {
                    url: '../controller/routesController.php',
                    type: "POST",
                    data: function (d) {
                        return $.extend({}, d, {
                            action: "showAll"
                        });
                    }
                },
                drawCallback: function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                    $('#dt').DataTable().columns.adjust().responsive.recalc();
                }
            });
        }
    };



    TableManageButtons = function () {
        "use strict";
        return {
            init: function () {
                dataTable_const();
                $(".dataTables_filter input").addClass("form-control input-rounded ml-sm");
            }
        };
    }();

    TableManageButtons.init();

}





window.onresize = function () {
    $('#dt').DataTable().columns.adjust().responsive.recalc();
};
