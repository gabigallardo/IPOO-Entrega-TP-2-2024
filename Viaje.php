<?php
// // Realice la implementación de la clase Viaje e implemente los métodos necesarios para modificar los atributos
//  de dicha clase (incluso los datos de los pasajeros). Utilice clases y arreglos  para   almacenar la informa
//  ción correspondiente a los pasajeros. Cada pasajero guarda  su “nombre”, “apellido” y “numero de documento”.
// // Implementar un script testViaje.php que cree una instancia de la clase Viaje y presente un menú que permi
// ta cargar la información del viaje, modificar y ver sus datos.
// // Modificar la clase Viaje para que ahora los pasajeros sean un objeto que tenga los atributos nombre, ap
// ellido, numero de documento y teléfono. El viaje ahora contiene una referencia a una colección de objetos 
// de la clase Pasajero. También se desea guardar la información de la persona responsable de realizar el
//  viaje, para ello cree una clase ResponsableV que registre el número de empleado, número de licencia, nombre y apellido.
//   La clase Viaje debe hacer referencia al responsable de realizar el viaje.
// // Implementar las operaciones que permiten modificar el nombre, apellido y teléfono de un pasajero. Lueg
// o implementar la operación que agrega los pasajeros al viaje, solicitando por consola la información de 
// los mismos. Se debe verificar que el pasajero no este cargado mas de una vez en el viaje. De la misma forma cargue la información del responsable del viaje.

class Viaje
{
    private $codigo;
    private $destino;
    private $maxPasajeros;
    private $pasajeros = [];
    private $responsable;

    public function __construct($codigo, $destino, $maxPasajeros, ResponsableV $responsable)
    {
        $this->codigo = $codigo;
        $this->destino = $destino;
        $this->maxPasajeros = $maxPasajeros;
        $this->responsable = $responsable;
    }

    // Métodos de acceso (getters)
    public function getCodigo()
    {
        return $this->codigo;
    }

    public function getDestino()
    {
        return $this->destino;
    }

    public function getMaxPasajeros()
    {
        return $this->maxPasajeros;
    }

    public function getPasajeros()
    {
        return $this->pasajeros;
    }

    public function getResponsable()
    {
        return $this->responsable;
    }

    // Métodos de modificación (setters)
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    }

    public function setDestino($destino)
    {
        $this->destino = $destino;
    }

    public function setMaxPasajeros($maxPasajeros)
    {
        $this->maxPasajeros = $maxPasajeros;
    }

    public function setPasajeros($pasajeros)
    {
        $this->pasajeros = $pasajeros;
    }

    public function setResponsable(ResponsableV $responsable)
    {
        $this->responsable = $responsable;
    }

    public function agregarPasajero(Pasajero $pasajero)
    {
        $retorno = false;
        if (!$this->existePasajero($pasajero)) {
            $this->pasajeros[] = $pasajero;
            $retorno = true;
        }
        return $retorno;
    }

    public function modificarPasajero($documento, $nombre, $apellido, $telefono)
    {
        $retorno = false;
        foreach ($this->pasajeros as $pasajero) {
            if ($pasajero->getDocumento() == $documento) {
                $pasajero->setNombre($nombre);
                $pasajero->setApellido($apellido);
                $pasajero->setTelefono($telefono);
                $retorno = true;
            }
        }
        return $retorno;
    }

    private function existePasajero(Pasajero $pasajero)
    {
        $retorno = false;
        foreach ($this->pasajeros as $p) {
            if ($p->getDocumento() == $pasajero->getDocumento()) {
                $retorno = true;
            }
        }
        return $retorno;
    }

    public function __toString()
    {
        $info = "Código de Viaje: {$this->codigo}\n";
        $info .= "Destino: {$this->destino}\n";
        $info .= "Cantidad Máxima de Pasajeros: {$this->maxPasajeros}\n";
        $info .= $this->responsable . "\n";
        $info .= "Pasajeros:\n";
        foreach ($this->pasajeros as $pasajero) {
            $info .= "- " . $pasajero . "\n";
        }
        return $info;
    }
}
