<?php

// Script para crear imágenes placeholder para los paquetes

$paquetes = [
    'machu-picchu.jpg' => [
        'texto' => 'Machu Picchu',
        'color' => [65, 105, 225] // Azul
    ],
    'valle-sagrado.jpg' => [
        'texto' => 'Valle Sagrado',
        'color' => [34, 139, 34] // Verde
    ],
    'camino-inca.jpg' => [
        'texto' => 'Camino Inca',
        'color' => [184, 134, 11] // Dorado
    ],
    'lago-titicaca.jpg' => [
        'texto' => 'Lago Titicaca',
        'color' => [30, 144, 255] // Azul claro
    ],
    'canon-colca.jpg' => [
        'texto' => 'Cañón del Colca',
        'color' => [205, 92, 92] // Rojo indio
    ]
];

$directorio = __DIR__ . '/storage/app/public/paquetes/';

// Crear directorio si no existe
if (!file_exists($directorio)) {
    mkdir($directorio, 0777, true);
}

foreach ($paquetes as $nombreArchivo => $datos) {
    // Crear imagen de 800x600
    $imagen = imagecreatetruecolor(800, 600);
    
    // Colores
    $colorFondo = imagecolorallocate($imagen, $datos['color'][0], $datos['color'][1], $datos['color'][2]);
    $colorTexto = imagecolorallocate($imagen, 255, 255, 255);
    $colorSombra = imagecolorallocate($imagen, 0, 0, 0);
    
    // Llenar fondo
    imagefilledrectangle($imagen, 0, 0, 800, 600, $colorFondo);
    
    // Agregar gradiente (opcional - crear efecto degradado)
    for ($y = 0; $y < 600; $y++) {
        $alpha = ($y / 600) * 50;
        $colorGradiente = imagecolorallocatealpha(
            $imagen,
            0, 0, 0,
            (int)$alpha
        );
        imageline($imagen, 0, $y, 800, $y, $colorGradiente);
    }
    
    // Agregar texto
    $texto = strtoupper($datos['texto']);
    $tamanioFuente = 5; // Tamaño de fuente integrado
    
    // Calcular posición centrada
    $anchoTexto = imagefontwidth($tamanioFuente) * strlen($texto);
    $altoTexto = imagefontheight($tamanioFuente);
    $x = (800 - $anchoTexto) / 2;
    $y = (600 - $altoTexto) / 2;
    
    // Sombra del texto
    imagestring($imagen, $tamanioFuente, $x + 2, $y + 2, $texto, $colorSombra);
    
    // Texto principal
    imagestring($imagen, $tamanioFuente, $x, $y, $texto, $colorTexto);
    
    // Agregar subtítulo
    $subtitulo = 'PAQUETE TURISTICO';
    $anchoSubtitulo = imagefontwidth(3) * strlen($subtitulo);
    $xSub = (800 - $anchoSubtitulo) / 2;
    $ySub = $y + 40;
    
    imagestring($imagen, 3, $xSub + 1, $ySub + 1, $subtitulo, $colorSombra);
    imagestring($imagen, 3, $xSub, $ySub, $subtitulo, $colorTexto);
    
    // Guardar imagen
    $rutaCompleta = $directorio . $nombreArchivo;
    imagejpeg($imagen, $rutaCompleta, 85);
    imagedestroy($imagen);
    
    echo "✓ Creada: {$nombreArchivo}\n";
}

echo "\n✅ Todas las imágenes placeholder han sido creadas exitosamente en:\n";
echo "   {$directorio}\n";
