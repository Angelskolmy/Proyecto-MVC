<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestión Odontológica</title>
    <link rel="stylesheet" type="text/css" href="Vista/css/estilo.css">
    <script src="Vista/jquery/jquery.js"></script>
    <script src="Vista/jquery/jquery-ui-1.14.1.custom/jquery-ui.js" type="text/javascript"></script>
    <script src="Vista/js/script.js"></script>
</head>

<body>
    <div id="contenedor">
        <div id="encabezado">
            <h1>Sistema de Gestión Odontológica</h1>
        </div>
        <ul id="menu">
            <li><a href="index.php">inicio</a> </li>
            <li><a href="index.php?accion=asignar">Asignar</a> </li>
            <li><a href="index.php?accion=consultar">Consultar Cita</a> </li>
            <li><a href="index.php?accion=cancelar">Cancelar Cita</a> </li>
            <li><a href="index.php?accion=Medicos">Medicos</a> </li> 
            <li><a href="index.php?accion=Tratamientos">Tratamientos</a> </li> 
        </ul>
        <div id="contenido">
            <h2>Cancelar citas</h2>
            <form action="" method="post" id="frmconsultar">
                <table>
                    <tr>
                        <td>Documento del Paciente</td>
                        <td><input type="text" name="cancelarDocumento" required
                                id="cancelarDocumento"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="button" value="Consultar"
                                onclick="cancelarCita()"></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div id="paciente3"></div>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</body>

</html>