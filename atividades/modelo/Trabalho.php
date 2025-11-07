<?php
require_once('Instrumento.php');

class Trabalho extends Instrumento {

    public function getNotaFinal() {
        $notaFinal = $this->getNota() + ($this->getNota() * 0.2);
        if ($notaFinal > 10.00) {
            return 10;
        } else {
            return $notaFinal;
        }
    }

    public function getTipo() {
        return 'trabalho';
    }
}
?>
