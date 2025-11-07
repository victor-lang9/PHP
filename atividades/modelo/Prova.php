<?php
require_once('Instrumento.php');

class Prova extends Instrumento {

    public function getNotaFinal() {
        $notaFinal = $this->getNota() + $this->getNota() * 0.3;
        if ($notaFinal > 10.00) {
            return 10;
        } else {
            return $notaFinal;
        }
    }

    public function getTipo() {
        return 'prova';
    }
}
?>
