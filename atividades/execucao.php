<?php
require_once('modelo/Instrumento.php');
require_once('modelo/Prova.php');
require_once('modelo/Trabalho.php');
require_once('modelo/Participacao.php');

$instrumentos = array();
$media = 0;

for ($i = 0; $i < 3; $i++) {
    $opcao = readline("Qual instrumento de avaliação você deseja criar? 1-Prova 2-Trabalho 3-Participação: ");

    if ($opcao == 1) {
        $instrumento = new Prova();
        $instrumento->setNota(readline("Informe a nota da sua prova (0 a 10): "));
    } elseif ($opcao == 2) {
        $instrumento = new Trabalho();
        $instrumento->setNota(readline("Informe a nota do seu trabalho (0 a 10): "));
    } elseif ($opcao == 3) {
        $instrumento = new Participacao();
        $instrumento->setNota(readline("Informe a nota da sua participação (0 a 10): "));
    } else {
        echo "Opção inválida. Tente novamente.\n";
        $i--;
        continue;
    }

    array_push($instrumentos, $instrumento);
    $media += $instrumento->getNotaFinal();
}

foreach ($instrumentos as $inst) {
    echo "A nota final do instrumento " . $inst->getTipo() . " é: " . $inst->getNotaFinal() . "\n";
}

$media = $media / 3;
echo "A média do estudante foi: $media\n";
?>
