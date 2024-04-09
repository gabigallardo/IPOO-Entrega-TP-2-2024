<?php
class ResponsableV
{
    private $numeroEmpleado;
    private $numeroLicencia;
    private $nombre;
    private $apellido;

    public function __construct($numeroEmpleado, $numeroLicencia, $nombre, $apellido)
    {
        $this->numeroEmpleado = $numeroEmpleado;
        $this->numeroLicencia = $numeroLicencia;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
    }


    public function getNumeroEmpleado()
    {
        return $this->numeroEmpleado;
    }

    public function setNumeroEmpleado($numeroE)
    {
        $this->numeroEmpleado = $numeroE;
    }

    public function getNumeroLicencia()
    {
        return $this->numeroLicencia;
    }

    public function setNumeroLicencia($numeroL)
    {
        $this->numeroLicencia = $numeroL;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nuevoNombre)
    {
        $this->nombre = $nuevoNombre;
    }

    public function getApellido()
    {
        return $this->apellido;
    }

    public function setApellido($nuevoApellido)
    {
        $this->apellido = $nuevoApellido;
    }
    public function __toString()
    {
        return "Responsable: {$this->getNombre()} {$this->getApellido()} (Empleado: {$this->getNumeroEmpleado()}, Licencia: {$this->getNumeroLicencia()})";
    }
}
