<?php 

include 'viajeFeliz.php';

function seleccionarOpcion()
{
    do {
        echo "--------------------------------------------------------------------------------\n";
        echo "||                              MENÚ PRINCIPAL                                ||\n";
        echo "||                                                                            ||\n";
        echo "|| Ingrese el número que corresponda a la opción elegida:         ||\n";
        echo "||                                                                            ||\n";
        echo "|| [1] Para cargar informacion del viaje.                                     ||\n";
        echo "|| [2] Para modificar la informacion.                                         ||\n";
        echo "|| [3] Para ver los datos sobre el viaje.                                     ||\n";
        echo "|| [4] Finalizar menu.                                                        ||\n";
        echo "--------------------------------------------------------------------------------\n";
        echo "\n";
        echo "Opción: ";
        $opcion = trim(fgets(STDIN));
        echo "\n";
        if ($opcion < 1 || $opcion > 4) {
            echo "Opción no válida, volverá a ser dirigido al menú principal \n";
            echo "Recuerde ingresar un valor entre 1 y 4. Presione cualquier tecla para continuar: \n";
            $stop = trim(fgets(STDIN)); 
            echo "\n";
        }
    } while ($opcion < 1 || $opcion > 4);

    return $opcion;
}

           

do {
    $opcion = seleccionarOpcion();

    switch ($opcion) {
        case 1:

            echo "Guardar informacion  \n";
            echo "Ingrese el codigo de viaje: ";
            $codigoViaje = trim(fgets(STDIN));
            echo "Ingrese el destino del viaje: ";
            $destinoViaje = trim(fgets(STDIN));
            echo "Ingrese la cantidad maxima de pasajeros: \n";
            $cantMaxPasajeros = trim(fgets(STDIN));

            $viaje = new Viaje($codigoViaje, $destinoViaje, $cantMaxPasajeros);

            $viaj = $viaje -> viajes($codigoViaje, $destinoViaje, $cantMaxPasajeros);

            function viajeArray($codigoViaje, $destinoViaje, $cantMaxPasajeros, $viaje) {

                $i = count($viaje);
                return $viajeArray[$i] = $viaje -> viajes($codigoViaje, $destinoViaje, $cantMaxPasajeros); ;
            }
           
            $pas = $viaje -> pasajeros($cantMaxPasajeros);

            function pasArray($cantMaxPasajeros, $viaje, $pas) {

                $i = count($pas);
                return $pas[$i] = $viaje -> pasajeros($cantMaxPasajeros);
            }
           
            echo "Ingrese cualquier valor para volver al menú principal o 4 para finalizar: ";
            // Mensaje de parada 
            $opcion = trim(fgets(STDIN));
            break;

        case 2:

            echo "Ingrese el codigo del viaje que desea modificar: ";
            $cod = trim(fgets(STDIN));      

            $viaje -> modificar($cod, $vi, $pas);
            
            echo "Ingrese cualquier valor para volver al menú principal o 4 para finalizar: ";
            // Mensaje de parada 
            $opcion = trim(fgets(STDIN));
            break;

        case 3:

            echo "Ingrese el codigo de viaje que desea ver: ";
            $codViaje = trim(fgets(STDIN));

            /*$viajeDatos = $viaje -> viajes($codigoViaje, $destinoViaje, $cantMaxPasajeros);
            $pas = $viaje -> pasajeros($cantMaxPasajeros);*/


            $viaje -> datos($codViaje, $viaj, $pas);

            echo "Ingrese cualquier valor para volver al menú principal o 4 para finalizar: ";
            // Mensaje de parada 
            $opcion = trim(fgets(STDIN));
            break;

        case 4:

            // Finaliza el menu
            break;
            default:
            // Mensaje de error
            echo "\n";
            echo "Usted ha ingresado una opción no válida.\n";
            echo "Ingrese cualquier valor para volver al menú principal o 4 para finalizar: ";
            // Mensaje de parada 
            $opcion = trim(fgets(STDIN));
            break;

       
    }
} while ($opcion != 4);
