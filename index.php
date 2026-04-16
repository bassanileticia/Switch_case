<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TravelNow - Checkout</title>
</head>
<body>

<h1>TravelNow - Finalizar Reserva</h1>

<form action="processa.php" method="POST">

    <label>Nome do viajante:</label><br>
    <input type="text" name="nome" required><br><br>

    <label>Valor do pacote de viagem (R$):</label><br>
    <input type="number" step="0.01" name="valor" required><br><br>

    <label>Peso da bagagem (kg):</label><br>
    <input type="number" step="0.1" name="peso" required><br><br>

    <label>Distância do destino (km):</label><br>
    <input type="number" name="distancia" required><br><br>

    <label>Tipo de bagagem:</label><br>
    <select name="produto">
        <option value="normal">Normal</option>
        <option value="fragil">Frágil</option>
    </select><br><br>

    <label>Tipo de entrega:</label><br>
    <select name="entrega">
        <option value="economica">Econômica</option>
        <option value="normal">Normal</option>
        <option value="expressa">Expressa</option>
        <option value="retirada">Retirada no aeroporto</option>
    </select><br><br>

    <button type="submit">Calcular viagem</button>

</form>

</body>
</html>
   
</body>
</html>