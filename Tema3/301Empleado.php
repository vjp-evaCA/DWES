<?php
class Empleado
{
    // Atributos
    public string $nombre;
    public string $apellidos;
    public float $sueldo;

    //Constructor
    public function __constructor(string $nombre, string $apellidos, float $sueldo)
    {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->sueldo = $sueldo;
    }

    // Getters y Setters
    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function setNombre(int $nombre)
    {
        $this->nombre = $nombre;
    }

    public function getApellidos(): string
    {
        return $this->apellidos;
    }

    public function setApellidos(int $apellidos)
    {
        $this->apellidos = $apellidos;
    }

    public function getSueldo(): float
    {
        return $this->sueldo;
    }

    public function setSueldo(int $sueldo)
    {
        $this->sueldo = $sueldo;
    }

    // Métodos
    public function getNombreCompleto(): string
    {
        return $this->nombre . ' ' . $this->apellidos;
    }

    public function debePagarImpuestos(): bool
    {
        return $this->sueldo > 3333;
    }
}

