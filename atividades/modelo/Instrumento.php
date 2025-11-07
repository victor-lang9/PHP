<?php
class Instrumento {
    protected float $nota;

    public function getNotaFinal() {
        $notaFinal = $this->getNota();
        if ($notaFinal > 10) {
            return 10;
        } else {
            return $notaFinal;
        }
    }

    // Getter da nota
    public function getNota(): float {
        return $this->nota;
    }

    // Setter da nota
    public function setNota(float $nota): self {
        $this->nota = $nota;
        return $this;
    }
}
?>
