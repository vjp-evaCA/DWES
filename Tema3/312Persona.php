<?php
abstract class Persona
{

    // Atributos
    public string $nombre;
    public string $apellidos;
    public int $edad;


    //Constructor
    public function __construct(string $nombre, string $apellidos, int $edad) 
    {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->edad = $edad;
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

    public function getEdad(): int
    {
        return $this->edad;
    }

    public function setEdad(int $edad)
    {
        $this->edad = $edad;
    }
    
    // Métodos
    public function getNombreCompleto(): string
    {
        return $this->nombre . ' ' . $this->apellidos;
    }

    abstract public static function toHTML(Persona $p);

}
  