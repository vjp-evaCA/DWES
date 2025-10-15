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
    public function __construct(string $nombre, string $apellidos, float $sueldo = 1000, array $arrayTelefonos = []
    ) {}

    // Getters y Setters
    public static function getSueldoTope(): float
    {
        return self::$sueldoTope;
    }

    public static function setSueldoTope(float $nuevoTope): void
    {
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

    public function getTelefonos(): array
    {
        return $this->arrayTelefonos;
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

    public static function toHTML(Empleado $emp): string
    {
        $html = "<p>";
        $html .= "Nombre completo: " . htmlspecialchars($emp->getNombreCompleto()) . "<br>";
        $html .= "Sueldo: " . htmlspecialchars((string)$emp->getSueldo()) . "<br>";
        $html .= "Debe pagar impuestos: " . ($emp->debePagarImpuestos() ? "Sí" : "No");
        $html .= "</p>";

        // Lista ordenada de teléfonos
        $html .= "<ol>";
        foreach ($emp->getTelefonos() as $telefono) {
            $html .= "<li>" . htmlspecialchars((string)$telefono) . "</li>";
        }
        $html .= "</ol>";

        return $html;
    }
}
