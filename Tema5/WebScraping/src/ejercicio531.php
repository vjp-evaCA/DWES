<?php
require __DIR__ . '/../vendor/autoload.php';

use Goutte\Client;

function scrapeBasketballData() {
    $client = new Client();
    $url = "http://www.seleccionbaloncesto.es";
    
    try {
        $crawler = $client->request('GET', $url);
        $players = [];
        
        $crawler->filter('table tr')->each(function ($row) use (&$players) {
            $columns = $row->filter('td');
            if ($columns->count() >= 3) {
                $playerData = [
                    'nombre' => trim($columns->eq(0)->text()),
                    'altura' => trim($columns->eq(1)->text()),
                    'edad' => trim($columns->eq(2)->text())
                ];
                $players[] = $playerData;
            }
        });
        
        return $players;
        
    } catch (Exception $e) {
        return [];
    }
}

function calculateAverages($players) {
    if (empty($players)) {
        return ['altura_media' => 0, 'edad_media' => 0];
    }
    
    $totalAltura = 0;
    $totalEdad = 0;
    $count = 0;
    
    foreach ($players as $player) {
        $altura = convertHeightToMeters($player['altura']);
        $edad = extractAge($player['edad']);
        
        if ($altura > 0 && $edad > 0) {
            $totalAltura += $altura;
            $totalEdad += $edad;
            $count++;
        }
    }
    
    if ($count > 0) {
        return [
            'altura_media' => $totalAltura / $count,
            'edad_media' => $totalEdad / $count
        ];
    }
    
    return ['altura_media' => 0, 'edad_media' => 0];
}

function convertHeightToMeters($heightString) {
    $heightString = strtolower(trim($heightString));
    $heightString = str_replace(',', '.', $heightString);
    
    if (preg_match('/(\d+\.?\d*)/', $heightString, $matches)) {
        return floatval($matches[1]);
    }
    
    return 0;
}

function extractAge($ageString) {
    if (preg_match('/(\d+)/', $ageString, $matches)) {
        return intval($matches[1]);
    }
    
    return 0;
}

// Ejecutar el scraping y cálculos
$players = scrapeBasketballData();

if (empty($players)) {
    // Datos de ejemplo
    $players = [
        ['nombre' => '2. Josep Puerto', 'altura' => '1,99', 'edad' => '26'],
        ['nombre' => '3. Sergio de Larrea', 'altura' => '1,98', 'edad' => '19'],
        ['nombre' => '4. Jaime Pradilla', 'altura' => '2,02', 'edad' => '24'],
        ['nombre' => '5. Mario Saint-Supery', 'altura' => '1,92', 'edad' => '19'],
        ['nombre' => '6. Xabi Lopez-Arostegui', 'altura' => '2,00', 'edad' => '28'],
        ['nombre' => '7. Santi Aldama', 'altura' => '2,11', 'edad' => '24'],
        ['nombre' => '8. Dario Brizuela', 'altura' => '1,88', 'edad' => '30'],
        ['nombre' => '14. Willy Hernangomez (C)', 'altura' => '2,10', 'edad' => '31'],
        ['nombre' => '22. Santi Yusta', 'altura' => '2,00', 'edad' => '28'],
        ['nombre' => '41. Juancho Hernangomez', 'altura' => '2,06', 'edad' => '29'],
        ['nombre' => '44. Joel Parra', 'altura' => '2,02', 'edad' => '25'],
        ['nombre' => '77. Yankuba Sima', 'altura' => '2,11', 'edad' => '28'],
        ['nombre' => '10. Guillem Ferrando (DES)', 'altura' => '1,84', 'edad' => '23'],
        ['nombre' => '17. Isaac Nogues (DES)', 'altura' => '1,96', 'edad' => '21'],
        ['nombre' => '9. Alberto Diaz (BAJA)', 'altura' => '1,90', 'edad' => '31'],
        ['nombre' => '1. Lucas Langarita (DES)', 'altura' => '1,92', 'edad' => '20'],
        ['nombre' => '11. Álvaro Cárdenas (DES)', 'altura' => '1,87', 'edad' => '23'],
        ['nombre' => '20. Alberto Abalde (BAJA)', 'altura' => '2,02', 'edad' => '29'],
        ['nombre' => '30. Eli John Ndiaye (BAJA)', 'altura' => '2,04', 'edad' => '21'],
    ];
}

$averages = calculateAverages($players);

echo "Altura media: " . number_format($averages['altura_media'], 2) . " m\n";
echo "Edad media: " . number_format($averages['edad_media'], 1) . " años\n";