//*****************************************************************
//Inyección de eventos en el HTML
//*****************************************************************

$(function () { //para la creación de los controles
    //agrega los eventos las capas necesarias
    $("#enviar").click(function () {
        //alert("función: addOrUpdatePersonas()" 
        //    + "\n action: " + $("#typeAction").val());
        addOrUpdatePersonas();
    });
    //agrega los eventos las capas necesarias
    $("#cancelar").click(function () {
        cancelAction();
    });    //agrega los eventos las capas necesarias

    // $("#btMostarForm").click(function () {
    //      //muestra el fomurlaior
    //      clearFormPersonas();
    //      $("#typeAction").val("add_personas");
    //      $("#myModalFormulario").modal();
    //  });



});

//*********************************************************************
//cuando el documento esta cargado se procede a cargar la información
//*********************************************************************

$(document).ready(function () {
    cargarTablas();
    //showALLPersonas(true);
    
});

//*********************************************************************
//Agregar o modificar la información
//*********************************************************************

function addOrUpdatePersonas() {
    //Se envia la información por ajax

    if (validar()) {

            $.ajax({
            url: '../../backend/controller/usersController.php',
            data: {
                action:         $("#typeAction").val(),
                username:       $("#username").val(),
                name:           $("#name").val(),
                last_name1:     $("#last_name1").val(),
                last_name2:     $("#last_name2").val(),
                birth_date:     $("#birth_date").val(),
                email:          $("#email").val(),
                work_phone:     $("#work_phone").val(),
                personal_phone: $("#personal_phone").val(),
                password:       $("#password").val(),
                address:        $("#address").val()
            },
            error: function () { //si existe un error en la respuesta del ajax
                swal("Error", "Se presento un error al enviar la informacion", "error");
            },
            success: function (data) { //si todo esta correcto en la respuesta del ajax, la respuesta queda en el data
                var messageComplete = data.trim();
                var responseText = messageComplete.substring(2);
                var typeOfMessage = messageComplete.substring(0, 2);
                if (typeOfMessage === "M~") { //si todo esta corecto
                    swal("Confirmacion", responseText, "success");
                    clearFormPersonas();
                    $("#dt_personas").DataTable().ajax.reload();
                } else {//existe un error
                    swal("Error", responseText, "error");
                }
            },
            type: 'POST'
        });
    }else{
        swal("Error de validación", "Los datos del formulario no fueron digitados, por favor verificar", "error");
    }
    $("#typeAction").val("add_users");
}

//*****************************************************************
//*****************************************************************
function validar() {
    var validacion = true;

    
    
    //valida cada uno de los campos del formulario
    //Nota: Solo si fueron digitados
    if ($("#username").val() === "") {
        validacion = false;
    }

    if ($("#name").val() === "") {
        validacion = false;
    }

    if ($("#last_name1").val() === "") {
        validacion = false;
    }

    if ($("#last_name2").val() === "") {
        validacion = false;
    }

    if ($("#birth_date").val() === "") {
        validacion = false;
    }

    if ($("#email").val() === "") {
        validacion = false;
    }

    if ($("#work_phone").val() === "") {
        validacion = false;
    }

    if ($("#personal_phone").val() === "") {
        validacion = false;
    }

    if ($("#password").val() === "") {
        validacion = false;
    }

    if ($("#address").val() === "") {
        validacion = false;
    }

    


    return validacion;
}

//*****************************************************************
//*****************************************************************

function clearFormPersonas() {
    $('#formPersonas').trigger("reset");
}

//*****************************************************************
//*****************************************************************

function cancelAction() {
    //clean all fields of the form
    clearFormPersonas();
    
    //$("#myModalFormulario").modal("hide");
}



//*****************************************************************
//*****************************************************************

function showPersonasByID(username) {
    //Se envia la información por ajax
    $.ajax({
        url: '../../backend/controller/usersController.php',
        data: {
            action: "show_users",
            username: username
        },
        error: function () { //si existe un error en la respuesta del ajax
            swal("Error", "Se presento un error al consultar la informacion", "error");
        },
        success: function (data) { //si todo esta correcto en la respuesta del ajax, la respuesta queda en el data
            var objPersonasJSon = JSON.parse(data);
            $("#username").val(objPersonasJSon.username);
            $("#name").val(objPersonasJSon.name);
            $("#last_name1").val(objPersonasJSon.last_name1);
            $("#last_name2").val(objPersonasJSon.last_name2);
            $("#birth_date").val(objPersonasJSon.birth_date);
            $("#email").val(objPersonasJSon.email);
            $("#work_phone").val(objPersonasJSon.work_phone);
            $("#personal_phone").val(objPersonasJSon.personal_phone);
            $("#password").val(objPersonasJSon.password);
            $("#address").val(objPersonasJSon.address);
            $("#typeAction").val("update_users");


            
            swal("Confirmacion", "Los datos de la persona fueron cargados correctamente", "success");
        },
        type: 'POST'
    });
}

//*****************************************************************
//*****************************************************************

function deletePersonasByID(username) {
    //Se envia la información por ajax
    $.ajax({
        url: '../../backend/controller/usersController.php',
        data: {
            action: "delete_users",
            username: username
        },
        error: function () { //si existe un error en la respuesta del ajax
            swal("Error", "Se presento un error al eliminar la informacion", "error");
        },
        success: function (data) { //si todo esta correcto en la respuesta del ajax, la respuesta queda en el data
            var responseText = data.trim().substring(2);
            var typeOfMessage = data.trim().substring(0, 2);
            if (typeOfMessage === "M~") { //si todo esta corecto
                swal("Confirmacion", responseText, "success");
                clearFormPersonas();
                $("#dt_personas").DataTable().ajax.reload();
            } else {//existe un error
                swal("Error", responseText, "error");
            }
        },
        type: 'POST'
    });
}




//*******************************************************************************
//Metodo para cargar las tablas
//*******************************************************************************


function cargarTablas() {

    var dataTablePersonas_const = function () {
        if ($("#dt_personas").length) {
            $("#dt_personas").DataTable({
                dom: "Bfrtip",
                bFilter: false,
                ordering: false,
                buttons: [
                    {
                        extend: "copy",
                        className: "btn-sm text-decoration-none",
                        text: "Copiar"
                    },
                    {
                        extend: "csv",
                        className: "btn-sm text-decoration-none",
                        text: "Exportar a CSV"
                    },
                    {
                        extend: "print",
                        className: "btn-sm text-decoration-none",
                        text: "Imprimir"
                    }

                ],
                "columnDefs": [
                    {
                        targets: 11,
                        className: "dt-center",
                        render: function (data, type, row, meta) {
                            //var botones = '<button type="button" class="btn btn-default btn-xs" aria-label="Left Align" onclick="showPersonasByID(\''+row[0]+'\');">Cargar</button> ';
                            //botones += '<button type="button" class="btn btn-default btn-xs" aria-label="Left Align" onclick="deletePersonasByID(\''+row[0]+'\');">Eliminar</button>';
                            var botones = '<button type="button" class="btn btn-default btn-xs text-white" aria-label="Left Align" onclick="showPersonasByID(\''+row[1]+'\');">Cargar</button> ';
                            botones += '<button type="button" class="btn btn-default btn-xs text-white" aria-label="Left Align" onclick="deletePersonasByID(\''+row[1]+'\');">Eliminar</button>';
                            return botones;
                        }
                    }

                ],
                pageLength: 2,
                language: dt_lenguaje_espanol,
                 ajax: {
                     url: '../../backend/controller/usersController.php',
                     type: "POST",
                     data: function (d) {
                         return $.extend({}, d, {
                             action: "showAll_users"
                         });
                     }
                 },
                
                 drawCallback: function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                     $('#dt_personas').DataTable().columns.adjust().responsive.recalc();
                 }
            });
        }
    };



    TableManageButtons = function () {
        "use strict";
        return {
            init: function () {
                dataTablePersonas_const();
                $(".dataTables_filter input").addClass("form-control input-rounded ml-sm");
            }
        };
    }();

    TableManageButtons.init();
}

//*******************************************************************************
//evento que reajusta la tabla en el tamaño de la pantall
//*******************************************************************************

window.onresize = function () {
    $('#dt_personas').DataTable().columns.adjust().responsive.recalc();
};







function showALLPersonas(ocultarModalBool) {
    //Se envia la información por ajax
    $.ajax({
        url: '../../backend/controller/usersController.php',
        data: {
            action: "showAll_users"
        },
        error: function () { //si existe un error en la respuesta del ajax
            alert("Se presento un error a la hora de cargar la información de las personas en la base de datos");
            if (ocultarModalBool) {
                ocultarModal("myModal");
            }
        },
        success: function (data) { //si todo esta correcto en la respuesta del ajax, la respuesta queda en el data
            $("#divResult").html(data);
            // se oculta el modal esta funcion se encuentra en el utils.js
            
        },
        type: 'POST'
    });
}