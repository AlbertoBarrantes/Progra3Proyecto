




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
            url: '../controller/airplanesController.php',
            data: {
                action:         $("#typeAction").val(),
                airplane_id:    $("#airplane_id").val(),
                model:          $("#model").val(),
                yearx:           $("#yearx").val(),
                brand:          $("#brand").val(),
                passengers:     $("#passengers").val(),
                rowsx:           $("#rowsx").val(),
                sits_row:       $("#sits_row").val()
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
    
    if ($("#airplane_id").val() === "") {
        validacion = false;
    }

    if ($("#model").val() === "") {
        validacion = false;
    }

    if ($("#yearx").val() === "") {
        validacion = false;
    }

    if ($("#brand").val() === "") {
        validacion = false;
    }

    if ($("#passengers").val() === "") {
        validacion = false;
    }

    if ($("#rowsx").val() === "") {
        validacion = false;
    }

    if ($("#sits_row").val() === "") {
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
        url: '../controller/airplanesController.php',
        data: {
            action: "show",
            airplane_id: PK
        },
        error: function () {
            swal("Error", "Se presento un error al consultar la informacion", "error");
        },
        success: function (data) {
            var objJSon = JSON.parse(data);
            $("#airplane_id").val(objJSon.airplane_id);
            $("#model").val(objJSon.model);
            $("#yearx").val(objJSon.yearx);
            $("#brand").val(objJSon.brand);
            $("#passengers").val(objJSon.passengers);
            $("#rowsx").val(objJSon.rowsx);
            $("#sits_row").val(objJSon.sits_row);
            $("#typeAction").val("update");
            
            swal("Confirmacion", "Los datos de la persona fueron cargados correctamente", "success");
        },
        type: 'POST'
    });

}





function deleteByID(PK) {


    $.ajax({
        url: '../controller/airplanesController.php',
        data: {
            action: "delete",
            airplane_id: PK
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
                    url: '../controller/airplanesController.php',
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
