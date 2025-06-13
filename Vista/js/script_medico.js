$(document).ready(function () {
    $("#fmrMedicos").dialog({
        autoOpen: false, 
        height: 310,
        width: 400,
        modal: true,
        buttons: {
            "Registrar": insertarMedico, 
            "Cancelar": cancelar
        }
    });
}); 

function mostrarFormulario() {
    
    $("#fmrMedicos").dialog('open'); 
}

function insertarMedico(){ 

    queryString = $("#agregarMedico").serialize();
    url = "index.php?accion=ingresarMedicos&" + queryString; 
    $("#Medicina").load(url);
    $("#fmrMedicos").dialog('close'); 

} 

function cancelar() {
    $(this).dialog('close');
}

