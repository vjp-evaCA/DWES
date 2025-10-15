<?php
class Persona
{

    // Atributos
    public string $nombre;
    public string $apellidos;


    //Constructor
    public function __construct(string $nombre, string $apellidos
    ) {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
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

    
    // Métodos
    public function getNombreCompleto(): string
    {
        return $this->nombre . ' ' . $this->apellidos;
    }

}
