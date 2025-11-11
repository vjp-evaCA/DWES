<?php
namespace Dwes\Monologos;

use Monolog\Logger;
use Monolog\Level;
use Monolog\Handler\RotatingFileHandler;

class HolaMonolog
{
    // Propiedad privada para guardar la instancia del logger
    private $miLog;

    // Constructor
    public function __construct()
    {
        // Crear el logger con el nombre 'mi-logger'
        $this->miLog = new Logger('mi-logger');
        
        // Configurar el RotatingFileHandler
        $this->miLog->pushHandler(
            new RotatingFileHandler(
                'logs/mi_app.log', // Ruta del archivo de log
                0,                // Número máximo de archivos (0 = ilimitado)
                Level::Debug     // Nivel mínimo: DEBUG (captura todos los niveles)
            )
        );
    }

    public function saludar()
    {
        // Log de tipo INFO con mensaje de saludo
        $this->miLog->info('El usuario ha saludado');
    }

    public function despedir()
    {
        // Log de tipo INFO con mensaje de despedida
        $this->miLog->info('El usuario se ha despedido');
    }
}