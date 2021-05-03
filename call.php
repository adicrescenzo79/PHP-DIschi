<?php
  include __DIR__.'/./partials/data.php';
  // var_dump($database);
  header('Content-Type: application/json');
  echo json_encode($database);
?>
