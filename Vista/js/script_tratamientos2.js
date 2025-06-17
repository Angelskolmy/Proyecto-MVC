$(document).ready(function () {
    $("#fmrTratamientos2").dialog({
        autoOpen: false, 
        height: 310,
        width: 400,
        modal: true,
        buttons: {
           "Actualizar": ActualizarTratamiento, 
           "Cancelar": cancelarTratamientos
        }
    });
});    

function mostrarModalupdate(btn){ 

    var idtrat=$(btn).data('idtrat'); 
    var Creacion=$(btn).data('creacion'); 
    var Descripcion=$(btn).data('descripcion'); 
    var Fechinicio=$(btn).data('fechinicio'); 
    var Fechcierre=$(btn).data('fechcierre'); 
    var observar=$(btn).data('observar'); 

    $("#fmrTratamientos2  input[name='ClaveTratamiento']").val(idtrat); 
    $("#fmrTratamientos2  input[name='TratAsignado2']").val(Creacion);
    $("#fmrTratamientos2  textarea[name='TratDescripcion2']").val(Descripcion);
    $("#fmrTratamientos2  input[name='TratInicio2']").val(Fechinicio); 
    $("#fmrTratamientos2  input[name='TratFin2']").val(Fechcierre);  
    $("#fmrTratamientos2  textarea[name='TratObservacion2']").val(observar);

    $("#fmrTratamientos2").dialog('open');  


}  

function ActualizarTratamiento(){ 

    datos= $("#cambioTratamiento").serialize();
    linkindex= "index.php?accion=actualizetratamiento&" + datos; 
    $("#Tratar2").load(linkindex,function(){ 
        location.reload();}); 
    $("#fmrTratamientos2").dialog('close');
}

function cancelarTratamientos() {
    $(this).dialog('close');
} 