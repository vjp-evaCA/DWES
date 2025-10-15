<?php
class Empleado extends Persona
{
    static float $sueldoTope = 3333;

    // Atributos
    public float $sueldo;
    public array $arrayTelefonos;


    //Constructor
    public function __construct(string $nombre, string $apellidos, int $edad, float $sueldo)
    {
        parent::__construct($nombre, $apellidos, $edad);
        $this->sueldo = $sueldo;
        $this->arrayTelefonos = [];
    }

    // Getters y Setters
    public static function getSueldoTope(): float
    {
        return self::$sueldoTope;
    }

    public static function setSueldoTope(float $nuevoTope): void
    {
        self::$sueldoTope = $nuevoTope;
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
    public function debePagarImpuestos(): bool
    {
        return $this->getEdad() > 21 && $this->sueldo > self::$sueldoTope;
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
        $this->arrayTelefonos = [];
    }

    public static function toHTML(Persona $p): string
    {
        if ($p instanceof Empleado) {
            $html = "<p>";
            $html .= "Nombre completo: " . htmlspecialchars($p->getNombreCompleto()) . "<br>";
            $html = "Edad: " . htmlspecialchars((string)$p->getEdad()) . "<br>";
            $html .= "Sueldo: " . htmlspecialchars((string)$p->getSueldo()) . "<br>";
            $html .= "Debe pagar impuestos: " . ($p->debePagarImpuestos() ? "Sí" : "No");
            $html .= "</p>";

            if (!empty($p->getTelefonos())) {
                $html .= "<ol>";
                foreach ($p->getTelefonos() as $telefono) {
                    $html .= "<li>" . htmlspecialchars((string)$telefono) . "</li>";
                }
                $html .= "</ol>";
            }

            return $html;
        }

        // Si no es un empleado, usamos la versión básica de Persona
        return Persona::toHTML($p);
    }
}
