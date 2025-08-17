<?php

class Carta
{
    private $numero;
    private $nome;

    public function __toString()
    {
        return "Numero: $this->numero, Nome: $this->nome \n";
    }

    public function getNumero()
    {
        return $this->numero;
    }

    public function setNumero($numero)
    {
        $this->numero = $numero;
        return $this;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }
}

$carta1 = (new Carta())->setNumero(1)->setNome("As de Espadas");
$carta2 = (new Carta())->setNumero(2)->setNome("Dois de Copas");
$carta3 = (new Carta())->setNumero(3)->setNome("Tres de Ouros");
$carta4 = (new Carta())->setNumero(4)->setNome("Quatro de Paus");
$carta5 = (new Carta())->setNumero(5)->setNome("Cinco de Espadas");
$carta6 = (new Carta())->setNumero(6)->setNome("Seis de Copas");
$carta7 = (new Carta())->setNumero(7)->setNome("Sete de Ouros");

$cartas = [$carta1, $carta2, $carta3, $carta4, $carta5, $carta6, $carta7];

$cartaSorteada = $cartas[array_rand($cartas)];

echo "----- Jogo de Adivinhação de Cartas -----\n\n";
echo "Cartas disponiveis:\n";

foreach ($cartas as $carta) {
    echo $carta;
}

$tentativas = 0;
$pontos = 100;

do {
    $palpite = readline("\n Digite o numero da carta que voce acha que foi sorteada (ou 0 para desistir): ");
    $tentativas++;

    if ((int)$palpite === 0) {
        echo "\n Voce desistiu! A carta era: " . $cartaSorteada;
        break;
    }

    if ((int)$palpite === $cartaSorteada->getNumero()) {
        echo "\n Parabens, voce acertou!\n";
        echo "Carta sorteada: $cartaSorteada";
        echo "Tentativas: $tentativas\n";
        echo "Pontuação final: $pontos\n";
        break;
    } else {
        $pontos -= 10;
        echo " Errou! Tente novamente. \n";
        echo "Pontuação atual: $pontos \n";

        if ($palpite < $cartaSorteada->getNumero()) {
            echo " Dica: a carta sorteada tem numero MAIOR que $palpite.\n";
        } else {
            echo " Dica: a carta sorteada tem numero MENOR que $palpite.\n";
        }
    }
} while (true);

