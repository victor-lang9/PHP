<?php

$somaPares = 0;
$somaImpares = 0;

for ($i = 20; $i <= 70; $i++) {
  if ($i % 2 == 0) {
    $somaPares += $i;
  } else {
    $somaImpares += $i;
  }
}

echo "Soma dos pares: $somaPares <br>";
echo "Soma dos ímpares: $somaImpares";

?>
