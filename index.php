<?php
session_start(); // Iniciar la sesión

// Premios disponibles (simulación de base de datos)
if (!isset($_SESSION['premios'])) {
    $_SESSION['premios'] = [
        'auricular1' => 1, // Cambia el número según la disponibilidad
        'auricular2' => 1, // Cambia el número según la disponibilidad
        'funda_vidrio' => 2,
        'hidrogel_funda' => 1,
        'orden_compra' => 2
    ];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>¡Ganaste!</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="icon" href="logo.png" type="image/png">
</head>
<body>

<header>
    <img src="logo.png" alt="Logo" class="logo">
    <h1>¡Felicitaciones, ganaste!<br>Elegí tu premio:</h1>
</header>

<div class="premios">
    <!-- Primer Auricular -->
    <div class="premio">
        <div class="etiqueta"><?php echo $_SESSION['premios']['auricular1']; ?> disponibles</div>
        <img src="s489.png" alt="Auricular Soul S389">
        <?php if ($_SESSION['premios']['auricular1'] > 0): ?>
            <button onclick="seleccionarPremio('auricular1')">Auricular Soul S489</button>
        <?php endif; ?>
    </div>

    <!-- Segundo Auricular -->
    <div class="premio">
        <div class="etiqueta"><?php echo $_SESSION['premios']['auricular2']; ?> disponibles</div>
        <img src="maxell.png" alt="Auricular Maxell">
        <?php if ($_SESSION['premios']['auricular2'] > 0): ?>
            <button onclick="seleccionarPremio('auricular2')">Auricular Maxell</button>
        <?php endif; ?>
    </div>

    <!-- Funda alternativa + vidrio templado -->
    <div class="premio">
        <div class="etiqueta"><?php echo $_SESSION['premios']['funda_vidrio']; ?> disponibles</div>
        <img src="vidrioyfunda.png" alt="Funda alternativa + vidrio templado">
        <?php if ($_SESSION['premios']['funda_vidrio'] > 0): ?>
            <button onclick="seleccionarPremio('funda_vidrio')">Funda + Vidrio 9D</button>
        <?php endif; ?>
    </div>

    <!-- Hidrogel Matte + Funda -->
    <div class="premio">
        <div class="etiqueta"><?php echo $_SESSION['premios']['hidrogel_funda']; ?> disponibles</div>
        <img src="hidroyfunda.png" alt="Hidrogel Matte + Funda">
        <?php if ($_SESSION['premios']['hidrogel_funda'] > 0): ?>
            <button onclick="seleccionarPremio('hidrogel_funda')">Hidrogel Matte + Funda</button>
        <?php endif; ?>
    </div>

    <!-- Orden de compra $8000 -->
    <div class="premio">
        <div class="etiqueta"><?php echo $_SESSION['premios']['orden_compra']; ?> disponibles</div>
        <img src="8000.png" alt="Orden de compra $8.000">
        <?php if ($_SESSION['premios']['orden_compra'] > 0): ?>
            <button onclick="seleccionarPremio('orden_compra')">Orden de compra de $8.000</button>
        <?php endif; ?>
    </div>
</div>

<footer>
    <p>Desarrollado con <i class="fas fa-heart" style="color: #F14CAE;"></i> por <a href="https://www.instagram.com/marennadev" target="_blank">Marenna Dev</a> para VTK Accesorios.</p>
</footer>

<script src="script.js"></script>
</body>
</html>
