$(document).ready(function () {
    $("#fmrMedicos2").dialog({
        autoOpen: false, 
        height: 310,
        width: 400,
        modal: true,
        buttons: {
            "Actualizar": Actualizar, 
            "Cancelar": cancelar
        }
    });
});  

function mostrarFormulario2(btn){ 
       
    var id_2= $(btn).data('id_2'); 
    var clave_2= $(btn).data('clave_2'); 
    var nombre_2= $(btn).data('nombre_2');  
    var apellido_2= $(btn).data('apellido_2'); 
    var lic_2= $(btn).data('lic_2');

    $("#cambiarMedico input[name='actMedCed']").val(id_2); 
    $("#cambiarMedico input[name='MedCedclave']").val(clave_2);
    $("#cambiarMedico input[name='actMedNom']").val(nombre_2);
    $("#cambiarMedico input[name='actMedApe']").val(apellido_2);
    $("#cambiarMedico input[name='actMedLic']").val(lic_2);

    $("#fmrMedicos2").dialog('open');
     
} 



function Actualizar(){ 

    queryString = $("#cambiarMedico").serialize();
    url = "index.php?accion=Medupdate&" + queryString;  
    $("#Medicina2").load(url, function(){ 
        location.reload();});

    $("#fmrMedicos2").dialog('close'); 

}  

function cancelar() {
    $(this).dialog('close');
} 