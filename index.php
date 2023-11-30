<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora PHP</title>
    <!-- Adiciona os links para os estilos do Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        input {
            width: 50px;
            height: 50px;
            font-size: 18px;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <?php
            // Variáveis para armazenar os valores
            $numero1 = "";
            $numero2 = "";
            $operador = "";
            $resultado = "";

            // Verifica se o formulário foi enviado
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Obtém os valores do formulário
                $numero1 = $_POST["numero1"];
                $numero2 = $_POST["numero2"];
                $operador = $_POST["operador"];

                // Realiza a operação com base no operador
                switch ($operador) {
                    case '+':
                        $resultado = $numero1 + $numero2;
                        break;
                    case '-':
                        $resultado = $numero1 - $numero2;
                        break;
                    case '*':
                        $resultado = $numero1 * $numero2;
                        break;
                    case '/':
                        // Verifica se o divisor não é zero
                        if ($numero2 != 0) {
                            $resultado = $numero1 / $numero2;
                        } else {
                            $resultado = "Erro: Divisão por zero";
                        }
                        break;
                }
            }
            ?>

            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="form">
                <div class="form-group">
                    <input type="text" name="numero1" value="<?php echo $numero1; ?>" placeholder="Número 1" class="form-control" required>
                </div>
                <div class="form-group">
                    <input type="text" name="operador" value="<?php echo $operador; ?>" placeholder="Operador" class="form-control" required>
                </div>
                <div class="form-group">
                    <input type="text" name="numero2" value="<?php echo $numero2; ?>" placeholder="Número 2" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Calcular</button>
            </form>

            <!-- Exibe o resultado -->
            <div class="mt-3">
                Resultado: <strong><?php echo $resultado; ?></strong>
            </div>
        </div>
    </div>
</div>

<!-- Adiciona os scripts do Bootstrap -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
