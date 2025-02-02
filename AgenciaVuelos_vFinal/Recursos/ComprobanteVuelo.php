<?php
    require_once("../Modelo/TablasBD.php");

    $IDUsuario = $_POST["USUARIO"];

    $Obj_Tabla = new TablasBD();
    $CONSULTA = $Obj_Tabla->ObtenerViajes_Usuario("viaje", "origen_viaje", "destino_viaje", "usuario", "paquete_turistico", "ID_Viaje", "ID_OrigenViaje", "ID_DestinoViaje", "ID_Usuario", "ID_PaqueteTuristico", $IDUsuario);

    //echo var_dump($CONSULTA);
    $viaje = end($CONSULTA);

    $NOMBREPASAJERO = $viaje['Nombre_Usuario']." ".$viaje['Apellido_Usuario'];
    $IDENTIFICACION = $viaje['Correo_Usuario'];
    $BILLETE = rand(1, 100);
    $EXPEDICION = "#Cristian, #Martin, #Cristopher"." - Versión:".rand(1000, 3000);
    $CIUDADORIGEN = $viaje['Ciudad_Origen'];
    $AEROPUERTOORIGEN = $viaje['Aeropuerto_Origen'];
    $CIUDADDESTINO = $viaje['Ciudad_Destino'];
    $AEROPUERTODESTINO = $viaje['Aeropuerto_Destino'];
    $PAQUETE = $viaje['Nombre_Paquete'];
    $ESTADO = "APROBADO";
    $DESCRIPCIONPAQUETE = $viaje['Actividades'];
    $FECHAINICIO = $viaje['FechaInicio_Viaje'];
    $FECHAFIN = $viaje['FechaFin_Viaje'];

    echo '<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Comprobante de Vuelo</title>
            <script type = "text/javascript" src = "../../JavaScript/JQuery.js"></script>
            <style>
                body{
                    font-family: "Courier New", Courier, monospace;
                }
                table.border{
                    border-collapse : collapse;
                }
                table.border th{
                    padding : 5px;
                    border : 1px solid black;
                }
                table.border td{
                    padding : 5px;
                    border : 1px solid black;
                }
            </style>
    
        </head>
    
        <body>
            <!--Tabla 1: Encabezado - Datos Generales-->
            <table border = "0" style = "width:100%">
            <!--Columna 1: Generalidades-->
            <tr>
                <!--Columna 1: Datos Informativos-->
                <td style = "width:30%; text-align:center;">
                    <table>
                        <tr><td><b>NIT1544220029</b></td></tr>
                        <tr><td><b>EMITIDO/ISSUED: </b>AUGUST 2023</td></tr>
                        <tr><td>IATA 123456789</td></tr>
                        <tr><td><b>ECOTEC</b></td></tr>
                    </table>
                </td>

                <!--Columna 2: En Blanco-->
                <td style = "width:50%"></td>

                <!--Columna 3: Código QR-->
                <td style = "width:20%"></td>
            </tr>
    
                <!--Columna 2: Títulos-->
                <tr><td colspan="3" height = "10" style = "text-align:center; line-height: 1;">
                    <h3 style = "margin-bottom: -5px;">BILLETE ELECTRÓNICO - ELECTRONIC TICKET</h3>
                    <h4 style = "margin-top: 10px;">RECIBO DEL PASAJERO - PASSENGER RECEIPT</h4>
                </td></tr>
            </table>
    
            <br>
    
            <!--Tabla 2: Datos del Pasajero-->
            <table border = "0" style = "width:100%">
                <tr>
                    <!--Información-->
                    <td style = "width:30%; text-align:center; display:block; margin:auto; border: 0px;">
                        <table>
                            <tr><td><b>NOMBRE DEL PASAJERO</b></td></tr>
                            <tr><td>IDENTIFICACIÓN</td></tr>
                            <tr><td>No DE BILLETE</td></tr>
                            <tr><td><b>EXPEDICIÓN</b></td></tr>
                        </table>
                    </td>
    
                    <!--Datos del Pasajero-->
                    <td style = "width:60%; border: 0px;">
                        <table>
                            <tr><td style = "width: 10%; border-bottom: 1px solid black;">'.$NOMBREPASAJERO.'</td></tr>
                            <tr><td style = "width: 10%; border-bottom: 1px solid black;">'.$IDENTIFICACION.'</td></tr>
                            <tr><td style = "width: 10%; border-bottom: 1px solid black;">'.$BILLETE.'</td></tr>
                            <tr><td style = "width: 10%; border-bottom: 1px solid black;">'.$EXPEDICION.'</td></tr>

                        </table>
                    </td>
                </tr>
            </table>
    
            <br>
    
            <!--Tabla 3: Datos del Viaje-->
            <table border = "0" style = "width:100%; text-align:center; border-collapse: collapse; border-spacing: 0;">
                <tr style="border-bottom: 1px solid black;">
                    <td><b>CIUDAD ORIGEN - DEPARTURE CITY</b></td>
                    <td><b>AEROPUERTO ORIGEN - DEPARTURE AIRPORT</b></td>
                    <td><b>CIUDAD DESTINO - ARRIVAL CITY</b></td>
                    <td><b>AEROPUERTO DESTINO - ARRIVAL AIRPORT</b></td>
                    <td><b>PAQUETE TURÍSTICO - TOUR PACKAGE</b></td>
                    <td><b>ESTADO - STATUS</b></td>
                </tr>
                <tr>
                    <td>'.$CIUDADORIGEN.'</td>
                    <td>'.$AEROPUERTOORIGEN.'</td>
                    <td>'.$CIUDADDESTINO.'</td>
                    <td>'.$AEROPUERTODESTINO.'</td>
                    <td>'.$PAQUETE.'</td>
                    <td>'.$ESTADO.'</td>
                </tr>
            </table>
    
            <br> <br>
        
        <!--Tabla 4: Fechas del Viaje-->
        <h3 style="text-align: center;"> FECHAS DEL VIAJE</h3>
        <table border = "0" style = "width:100%; text-align:center; border-collapse: collapse; border-spacing: 0;">
            <tr style="border-bottom: 1px solid black;">
                <td><b>FECHA DE SALIDA</b></td>
                <td><b>FECHA DE LLEGADA</b></td>
            </tr>
            <tr>
                <td>'.$FECHAINICIO.'</td>
                <td>'.$FECHAFIN.'</td>
            </tr>
        </table>

        <br> <br>

        <section>
            <article>
                <h3 style="text-align: center;"> DESCRIPCIÓN DEL PAQUETE TURÍSTICO</h3>
                <p style="text-align: justify; margin: 20px;">'.$DESCRIPCIONPAQUETE.'</p>
            </article>
        </section>

        <br> <br>

        <section>
            <article>
                <h3 style="text-align: center;">NOTA PARA EL USUARIO</h3>
                <p style="text-align: justify; margin: 20px;">La agencia de viajes <b>HORIZONTRAVEL</b> no se hace responsable de retrasos en los vuelos o en la llegada al aeropuerto que puedan afectar la puntualidad del viaje. Es responsabilidad del pasajero presentarse en el aeropuerto con suficiente antelación para cumplir con los requisitos de documentación y seguridad. Asimismo, <b>HORIZONTRAVEL</b> no se hace responsable de pérdidas o daños en el equipaje, ni de cualquier gasto adicional que pueda derivarse de situaciones imprevistas o fuera de nuestro control.</p>
            </article>
        </section>
        </body>
    </html>'
?>