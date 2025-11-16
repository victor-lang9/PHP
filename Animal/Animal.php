<?php


class Animal {
    public $especie;
    public $numeroDePatas;
    public $cor;
    public $tipoDePele;
 

    function definirAtributos($especie) {
        $this->especie = $especie;

        if ($especie == "Porco") {
            $this->numeroDePatas = 4;
            $this->cor = "rosinha";
            $this->tipoDePele = "lisa";
        } elseif ($especie == "Cachorro") {
            $this->numeroDePatas = 4;
            $this->cor = "marrom";
            $this->tipoDePele = "peluda";
        } elseif ($especie == "Galinha") {
            $this->numeroDePatas = 2;
            $this->cor = "branca";
            $this->tipoDePele = "penugenta";
        } elseif ($especie == "Pássaro") {
            $this->numeroDePatas = 2;
            $this->cor = "amarelo";
            $this->tipoDePele = "penugenta";
        } elseif ($especie == "Tartaruga") {
            $this->numeroDePatas = 4;
            $this->cor = "verde";
            $this->tipoDePele = "casca dura";
        } else {
            $this->numeroDePatas = 0;
            $this->cor = "desconhecida";
            $this->tipoDePele = "desconhecida";
        }
    }

    function fazerSom() {
        if ($this->especie == "Porco") {
            return "Oink Oink";
        } elseif ($this->especie == "Cachorro") {
            return "Au Au";
        } elseif ($this->especie == "Galinha") {
            return "Pó pó";
        } elseif ($this->especie == "Pássaro") {
            return "Fiu fiu";
        } elseif ($this->especie == "Tartaruga") {
            return "Aawwwwoouuugh";
        } else {
            return "Som desconhecido";
        }
    }


    function movimentoAnimal() {
        if ($this->especie == "Porco" || $this->especie == "Cachorro" || $this->especie == "Galinha") {
            return "anda no chão";
        } elseif ($this->especie == "Pássaro") {
            return "voa";
        } elseif ($this->especie == "Tartaruga") {
            return "nada na água e anda no chão";
        } else {
            return "movimento desconhecido";
        }
    }
}

$animal1 = new Animal();
$animal1->definirAtributos("Porco");

$animal2 = new Animal();
$animal2->definirAtributos("Cachorro");

$animal3 = new Animal();
$animal3->definirAtributos("Galinha");

$animal4 = new Animal();
$animal4->definirAtributos("Pássaro");

$animal5 = new Animal();
$animal5->definirAtributos("Tartaruga");


echo "O animal 1 é um " . $animal1->especie . ", tem " . $animal1->numeroDePatas . " patas, possui a cor " . $animal1->cor . ", tem a pele " . $animal1->tipoDePele . ", emite o som " . $animal1->fazerSom() . ", e " . $animal1->movimentoAnimal() . "\n\n";

echo "O animal 2 é um " . $animal2->especie . ", tem " . $animal2->numeroDePatas . " patas, possui a cor " . $animal2->cor . ", tem a pele " . $animal2->tipoDePele . ", emite o som " . $animal2->fazerSom() . ", e " . $animal2->movimentoAnimal() . "\n\n";

echo "O animal 3 é um " . $animal3->especie . ", tem " . $animal3->numeroDePatas . " patas, possui a cor " . $animal3->cor . ", tem a pele " . $animal3->tipoDePele . ", emite o som " . $animal3->fazerSom() . ", e " . $animal3->movimentoAnimal() . "\n\n";

echo "O animal 4 é um " . $animal4->especie . ", tem " . $animal4->numeroDePatas . " patas, possui a cor " . $animal4->cor . ", tem a pele " . $animal4->tipoDePele . ", emite o som " . $animal4->fazerSom() . ", e " . $animal4->movimentoAnimal() . "\n\n";

echo "O animal 5 é um " . $animal5->especie . ", tem " . $animal5->numeroDePatas . " patas, possui a cor " . $animal5->cor . ", tem a pele " . $animal5->tipoDePele . ", emite o som " . $animal5->fazerSom() . ", e " . $animal5->movimentoAnimal() . "\n\n";

