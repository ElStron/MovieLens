<?php
$mainContent = function() use ($title) { ?>
  <p><?php echo htmlspecialchars($title ?? 'Sin título'); ?></p>
<?php };
include __DIR__ . '/../ui/Layouts/HomeLayout.php';