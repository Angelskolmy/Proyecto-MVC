$(document).ready(function () { 
    $("#fmrpacientes2").dialog({
        autoOpen: false, 
        height: 310, 
        width: 400,  
        modal: true, 
        buttons:{

            "Ingresar": insertarPaciente, 
            "Cancelar": cancelar,

        } 
    })
}) 

function mostrarPacdialog(){ 
    $("#fmrpacientes2").dialog('open')
} 
 
function insertarPaciente(){ 

    Alininputs= $("#datospac2").serialize(); 
    direcindex= "index.php?accion=ingresarPacientes22&"+  Alininputs; 
    $("#ingpacker").load(direcindex); 
    $("#fmrpacientes2").dialog('close');
}

function cancelar(){ 
    $(this).dialog('close');
}