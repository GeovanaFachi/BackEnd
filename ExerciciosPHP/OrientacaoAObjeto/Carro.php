<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Carro</title>
</head>
<body>
    
    <h2>Exercicio Carro</h2>

    <?php
    
    class Carro {
        public $modelo;
        public $cor;
        public $ano;

        public function ligar() {
            echo "O carro " . $this->modelo . " está ligado!<br>";
        }
    }

            $carro1 = new Carro();
            $carro1->modelo = "Polo";
            $carro1->cor = "Preto";
            $carro1->ano = "2020";

            $carro1->ligar();

            $carro2 = new Carro();
            $carro2->modelo = "KA";
            $carro2->cor = "Vermelho";
            $carro2->ano = "2015";

            $carro2->ligar();

    ?>

</body>
</html>
