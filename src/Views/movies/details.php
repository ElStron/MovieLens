<?php
$mainContent = function() use($title, $description, $movie) { ?>
    <h1><?php echo $title; ?></h1>
    <p><?php echo $description; ?></p>
    <h2>Detalles de la Película</h2>
    <ul>

    </ul>
<?php };
include __DIR__ . '/../../ui/Layouts/HomeLayout.php';