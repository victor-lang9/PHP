<?php

$retangulos = [
  ["base" => 10, "altura" => 5],
  ["base" => 7,  "altura" => 3],
  ["base" => 4,  "altura" => 6]
];

foreach ($retangulos as $retangulo) {
  $area = $retangulo["base"] * $retangulo["altura"];
  echo "Área do retângulo: $area <br>";
}

?>
