<?php
abstract class Trabajador extends Persona
{

    // Atributos
    public array $telefonos;


    //Constructor
    public function __construct(string $nombre, string $apellidos, int $edad) 
    {
        parent::__construct($nombre, $apellidos, $edad);
        $this->telefonos = [];
    }

    // Getters y Setters
    
    
    // Métodos
    
    abstract public function calcularSueldo();

}
  