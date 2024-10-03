<?php
session_start(); // Iniciar la sesión para mantener el estado

// Verificar si la sesión de premios existe, si no, inicializarla
if (!isset($_SESSION['premios'])) {
    $_SESSION['premios'] = [
        'auricular1' => 1,
        'auricular2' => 1,
        'funda_vidrio' => 2,
        'hidrogel_funda' => 1,
        'orden_compra' => 2
    ];
}

// Manejar la selección del premio
if (isset($_GET['premio']) && array_key_exists($_GET['premio'], $_SESSION['premios'])) {
    $premio = $_GET['premio'];

    // Verificar la disponibilidad del premio
    if ($_SESSION['premios'][$premio] > 0) {
        $_SESSION['premios'][$premio]--; // Reducir la cantidad disponible del premio

        // Devolver la cantidad restante en formato JSON
        echo json_encode(['cantidadRestante' => $_SESSION['premios'][$premio]]);
    } else {
        // Devolver error en caso de que el premio no esté disponible
        echo json_encode(['error' => 'Lo sentimos, el premio ya no está disponible.']);
    }
} else {
    echo json_encode(['error' => 'Premio no válido.']);
}
?>
