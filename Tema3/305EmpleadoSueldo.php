<?php
class Empleado
{
    static float $sueldoTope = 3333;

    // Atributos
    public string $nombre;
    public string $apellidos;
    public float $sueldo;
    public array $arrayTelefonos;


    //Constructor
    public function __constructor(string $nombre, string $apellidos, float $sueldo = 1000, array $arrayTelefonos = [])
    {}

    // Getters y Setters
    public function getSueldoTope() : float{
        return self::$sueldoTope;
    }

    public function setSueldoTope(float $nuevoTope) : void {
        self::$sueldoTope = $nuevoTope;
    }

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
        return $this->sueldo > self::$sueldoTope;
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
        $this->arrayTelefonos[] = [];
    }
}
