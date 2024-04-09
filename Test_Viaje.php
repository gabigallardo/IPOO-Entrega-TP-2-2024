<?php
include_once 'Pasajero.php';
include_once 'ResponsableV.php';
include_once 'Viaje.php';
$responsable = new ResponsableV("12345", "ABC123", "Juan", "Perez");
$viaje = new Viaje("V001", "Ciudad X", 50, $responsable);
$viajes = [$viaje];
function buscarViaje($viajes, $codigoViaje)
{
    $viajeEncontrado = false;
    foreach ($viajes as $viaje) {
        if ($viaje->getCodigo() == $codigoViaje) {
            $viajeEncontrado = $viaje;
        }
    }
    return $viajeEncontrado;
}
while (true) {
    echo "\nMenú:\n";
    echo "1. Cargar informacion del viaje\n";
    echo "2. Modificar informacion del viaje\n";
    echo "3. Ver datos del viaje\n";
    echo "4. Modificar Pasajero\n";
    echo "5. Agregar Pasajero\n";
    echo "6. Salir\n";
    $opcion = readline("Ingrese la opción deseada: ");

    switch ($opcion) {
        case '1':
            $codigo = readline("Ingrese el codigo del nuevo viaje: ");
            $destino = readline("Ingrese el destino del nuevo viaje: ");
            $maxPasajeros = readline("Ingrese la cantidad maxima de pasajeros del nuevo viaje: ");
            $numEmpleado = readline("Ingrese el numero de empleado del responsable del nuevo viaje: ");
            $numLicencia = readline("Ingrese el numero de licencia del responsable del nuevo viaje: ");
            $nombreResponsableV = readline("Ingrese el Nombre del responsable del nuevo viaje: ");
            $apellidoResponsableV  = readline("Ingrese el apellido del responsable del nuevo viaje: ");
            $nuevoResponsable = new ResponsableV($numEmpleado, $numLicencia, $nombreResponsableV, $apellidoResponsableV);
            $nuevoViaje = new Viaje($codigo, $destino, $maxPasajeros, $nuevoResponsable);
            $viajes[] = $nuevoViaje;
            break;
        case '2':
            $viajeEncontrado = buscarViaje($viajes, readline("Ingrese el codigo del viaje a buscar: "));
            if ($viajeEncontrado) {
                while (true) {
                    echo "\nDesea modificar:\n";
                    echo "1. Modificar codigo del viaje\n";
                    echo "2. Modificar destino del viaje\n";
                    echo "3. Modificar maximo de pasajeros del viaje\n";
                    echo "4. Modificar responsable del viaje\n";
                    echo "5. Volver al menu anterior\n";
                    $opcion = readline("Ingrese la opción deseada: ");
                    switch ($opcion) {
                        case '1':
                            $viajeEncontrado->setCodigo(readline("Ingrese el codigo del nuevo viaje: "));
                            break;
                        case '2':
                            $viajeEncontrado->setDestino(readline("Ingrese el destino del viaje: "));
                            break;
                        case '3':
                            $viajeEncontrado->setMaxPasajeros(readline("Ingrese la cantidad maxima de pasajeros del viaje: "));
                            break;
                        case '4':
                            $nombreResponsableV = readline("Ingrese el Nombre del responsable del viaje: ");
                            $apellidoResponsableV  = readline("Ingrese el apellido del responsable del viaje: ");
                            $nuevoResponsable = new ResponsableV($numEmpleado, $numLicencia, $nombreResponsableV, $apellidoResponsableV);
                            $viajeEncontrado->setResponsable($nuevoResponsable);
                            break;
                        case '5':
                            echo "Regresando al menú principal...\n";
                            break 2;
                        default:
                            echo "Opción inválida. Por favor, seleccione una opción válida.\n";
                            break;
                    }
                }
            } else {
                echo "El codigo del viaje no existe. ";
            }
            break;
        case '3':
            $viajeEncontrado = buscarViaje($viajes, readline("Ingrese el codigo del viaje a buscar: "));
            if ($viajeEncontrado) {
                echo $viajeEncontrado;
            } else {
                echo "El codigo del viaje no existe. ";
            }
            break;

        case '4':
            $documento = readline("Ingrese el número de documento del pasajero a modificar: ");
            $nombre = readline("Nuevo nombre del pasajero: ");
            $apellido = readline("Nuevo apellido del pasajero: ");
            $telefono = readline("Nuevo teléfono del pasajero: ");
            if ($viaje->modificarPasajero($documento, $nombre, $apellido, $telefono)) {
                echo "Datos del pasajero modificados con exito.\n ";
            } else {
                echo "El pasajero no existe en este viaje. \n";
            }
            break;
        case '5':
            $nombre = readline("Nombre del pasajero: ");
            $apellido = readline("Apellido del pasajero: ");
            $documento = readline("Número de documento del pasajero: ");
            $telefono = readline("Teléfono del pasajero: ");
            $pasajero = new Pasajero($nombre, $apellido, $documento, $telefono);
            if ($viaje->agregarPasajero($pasajero)) {
                echo "Pasajero agregado al viaje con exito.\n";
            } else {
                echo "El pasajero ya existe en este viaje.\n";
            }
            break;
        case '6':
            echo "Saliendo del programa...\n";
            exit;
        default:
            echo "Opción inválida. Por favor, seleccione una opción válida.\n";
            break;
    }
}
