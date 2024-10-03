<?php
session_start(); // Iniciar la sesión para mantener el estado

// Simular la reposición de premios a sus cantidades originales
$premios_originales = [
    'auricular1' => 1,
    'auricular2' => 1,
    'funda_vidrio' => 2,
    'hidrogel_funda' => 1,
    'orden_compra' => 2
];

// Restablecer la sesión de premios a sus cantidades originales
$_SESSION['premios'] = $premios_originales;

// Mostrar un mensaje de éxito
echo "Premios restablecidos a su cantidad original.";
?>
