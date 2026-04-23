<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recibo da reversa</title>
    <link rel="stylesheet" href="processa.css">
</head>
<body>
    <?php

$nome = $_POST['nome'];
$valor = $_POST['valor'];
$peso = $_POST['peso'];
$distancia = $_POST['distancia'];
$produto = $_POST['produto'];
$entrega = $_POST['entrega'];

$taxa = 0;
$detalhes = [];
$prazo = "";

echo "<h1>TravelNow - Recibo da Reserva</h1>";

echo "<p><strong>Cliente:</strong> $nome</p>";
echo "<p><strong>Valor do pacote:</strong> R$ " . number_format($valor, 2, ',', '.') . "</p>";

echo "<br>";

if ($valor > 500) {
    $detalhes[] = "Frete grátis (promoção acima de R$500)";
} else {

    switch ($entrega) {

        case "economica":

            if ($peso <= 5) {
                $taxa += 10;
                $detalhes[] = "Base econômica (até 5kg): R$10";
            } else {
                $taxa += 20;
                $detalhes[] = "Base econômica (acima de 5kg): R$20";
            }

            if ($distancia > 100) {
                $taxa += 10;
                $detalhes[] = "Taxa de distância (>100km): +R$10";
            }

            if ($distancia <= 50) $prazo = "3 dias";
            elseif ($distancia <= 200) $prazo = "5 dias";
            else $prazo = "8 dias";

            break;

        case "normal":

            if ($peso <= 5) {
                $taxa += 20;
                $detalhes[] = "Base normal (até 5kg): R$20";
            } elseif ($peso <= 10) {
                $taxa += 35;
                $detalhes[] = "Base normal (até 10kg): R$35";
            } else {
                $taxa += 50;
                $detalhes[] = "Base normal (acima de 10kg): R$50";
            }

            if ($distancia > 100) {
                $taxa += 15;
                $detalhes[] = "Taxa de distância (>100km): +R$15";
            }

            if ($distancia <= 50) $prazo = "2 dias";
            elseif ($distancia <= 200) $prazo = "4 dias";
            else $prazo = "6 dias";

            break;

        case "expressa":

            $taxa += 50;
            $detalhes[] = "Base expressa: R$50";

            if ($peso > 10) {
                $taxa += 20;
                $detalhes[] = "Excesso de bagagem: +R$20";
            }

            if ($distancia > 100) {
                $taxa += 20;
                $detalhes[] = "Taxa de distância (>100km): +R$20";
            }

            $prazo = ($distancia <= 100) ? "1 dia" : "2 dias";

            break;

        case "retirada":

            $taxa = 0;
            $detalhes[] = "Retirada no aeroporto: gratuita";
            $prazo = "Imediato";

            break;
    }

    if ($distancia > 200) {
        $extra = $distancia - 200;
        $taxa += $extra;
        $detalhes[] = "Km extra ($extra km): +R$" . number_format($extra, 2, ',', '.');
    }

    if ($produto == "fragil") {
        $taxa += 15;
        $detalhes[] = "Bagagem frágil: +R$15";
    }
}

$total = $valor + $taxa;


echo "<div class='bloco'>";

echo "<h3>Detalhamento do cálculo</h3>";

foreach ($detalhes as $d) {
    echo "<p>• $d</p>";
}

echo "</div>";

echo "<p><strong>Prazo estimado:</strong> $prazo</p>";
echo "<p><strong>Taxa de viagem:</strong> R$ " . number_format($taxa, 2, ',', '.') . "</p>";

echo "<h2>Total final: R$ " . number_format($total, 2, ',', '.') . "</h2>";

echo "<p><strong>Status:</strong> Viagem confirmada ✔</p>";

echo "<div style='text-align:center; margin-top:20px;'>
        <a href='index.php'>
            <button>⬅ fazer nova reserva</button>
        </a>
      </div>";

?>
</body>
</html>


