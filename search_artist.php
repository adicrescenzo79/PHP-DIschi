<?php
  include __DIR__.'/./partials/data.php';
  $artist = $_GET["artist"];
  // $artistDisk = [],
  header('Content-Type: application/json');

  for ($i=0; $i < count($database) ; $i++) {
    if ($artist == $database[$i]['author']) {
      // var_dump($database[$i]);
      $artistDisk[] = $database[$i];
    }
  }
  // var_dump($artistDisk);
  echo json_encode($artistDisk);
?>
