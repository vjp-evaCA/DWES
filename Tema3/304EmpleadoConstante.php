<?php
class Empleado
{
    const SUELDO_TOPE = 3333;

    // Atributos
    public string $nombre;
    public string $apellidos;
    public float $sueldo;
    public array $arrayTelefonos;


    //Constructor
    public function __constructor(string $nombre, string $apellidos, float $sueldo = 1000)
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

    public function getApellidos(): string
    {
        return $this->apellidos;
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
        return $this->sueldo > self::SUELDO_TOPE;
    }

    public function anyadirTelefono(int $telefono): void
    {
        $this->arrayTelefonos[] = $telefono;
    }

    public function listarTelefonos(): string
    {
        return implode(', ', $this->arrayTelefonos);
    }

    public function vaciarTelefonos(): void
    {
        $this->arrayTelefonos[] = null;
    }
}
