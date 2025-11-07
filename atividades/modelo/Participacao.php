<?php
require_once('Instrumento.php');

class Participacao extends Instrumento {

    public function getNotaFinal() {
        $notaFinal = $this->getNota();
        if ($notaFinal > 10.00) {
            return 10;
        } else {
            return $notaFinal;
        }
    }

    public function getTipo() {
        return 'participação';
    }
}
?>
