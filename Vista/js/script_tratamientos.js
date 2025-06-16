$(document).ready(function () {
    $("#fmrTratemaientos").dialog({
        autoOpen: false, 
        height: 310,
        width: 400,
        modal: true,
        buttons: {
            "Registrar": ingresoTratamientosjs, 
            "Cancelar": cancelar
        }
    });
});   

function mostrar_tratamientos(){ 

    $("#fmrTratemaientos").dialog('open');
}  

function ingresoTratamientosjs(){

    formTrad= $("#IngMedico").serialize(); 
    linkd= "index.php?accion=insertarTratamiento&" + formTrad; 
    $("#Tratar1").load(linkd); 
    $("#fmrTratemaientos").dialog('close');
} 

function cancelar(){ 
    $(this).dialog('close');
}