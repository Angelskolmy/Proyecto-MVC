$(document).ready(function () {
    $("#fmrpacientes3").dialog({
        autoOpen: false, 
        height: 310,
        width: 400,
        modal: true,
        buttons: {
         "Actualizar": actualizarpaciente, 
         "Cancelar": cancelarPacientes2,
        }
    });
});     

function mostraractualizacionpac(btn){  

    var cedulapaciente= $(btn).data('cedulapaciente'); 
    var clavepaciente= $(btn).data('clavepaciente'); 
    var nombrepaciente= $(btn).data('nombrepaciente'); 
    var apellidopaciente= $(btn).data('apellidopaciente');
    var fechabornpaciente=$(btn).data('fechabornpaciente');
    var sexopaceinte=$(btn).data('sexopaceinte'); 
    var tratamientopaciente=$(btn).data('tratamientopaciente'); 

    $("#fmrpacientes3 input[name='idPac2']").val(cedulapaciente); 
    $("#fmrpacientes3 input[name='clavePac']").val(clavepaciente); 
    $("#fmrpacientes3 input[name='nomPac2']").val(nombrepaciente);
    $("#fmrpacientes3 input[name='apePac2']").val(apellidopaciente);
    $("#fmrpacientes3 input[name='bornPac2']").val(fechabornpaciente);
    $("#fmrpacientes3 select[name='sexPac2']").val(sexopaceinte); 
    $("#fmrpacientes3 select[name='tratPac2']").val(tratamientopaciente);

    $("#fmrpacientes3").dialog('open');
}  

function actualizarpaciente (){ 
    informacion= $("#actuPac").serialize(); 
    envio= "index.php?accion=uptacker&"+ informacion;  
    $("#inguppacker").load(envio, function(){ 
        location.reload();}); 
    $("#fmrpacientes3").dialog('close');

}

function cancelarPacientes2(){ 
    $(this).dialog('close');
}