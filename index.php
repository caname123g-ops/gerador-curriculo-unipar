<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerador de Currículos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .hero-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 100px 0;
            text-align: center;
        }
        .btn-custom {
            background: #ff6b6b;
            color: white;
            padding: 15px 30px;
            font-size: 1.2rem;
            border: none;
            border-radius: 50px;
        }
    </style>
</head>
<body>
    <!-- Menu de Navegação -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">Gerador de Currículos</a>
            <div class="navbar-nav">
                <a class="nav-link" href="index.php">Início</a>
                <a class="nav-link" href="formulario.php">Formulário</a>
                <a class="nav-link" href="#">Visualizar</a>
            </div>
        </div>
    </nav>

    <!-- Banner Principal -->
    <section class="hero-section">
        <div class="container">
            <h1 class="display-4">Crie seu currículo profissional</h1>
            <p class="lead">De forma rápida e fácil</p>
            <a href="formulario.php" class="btn btn-custom mt-3">Começar Agora</a>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>