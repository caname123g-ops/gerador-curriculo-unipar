<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Currículo Gerado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background: #f8f9fa;
        }
        .curriculo {
            background: white;
            border: 2px solid #333;
            padding: 40px;
            max-width: 800px;
            margin: 0 auto;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }
        h1 {
            color: #2c3e50;
            border-bottom: 3px solid #667eea;
            padding-bottom: 10px;
        }
        .section {
            margin-bottom: 30px;
            page-break-inside: avoid;
        }
        .section h2 {
            color: #667eea;
            border-bottom: 1px solid #ddd;
            padding-bottom: 5px;
        }
        .btn-print {
            background: #28a745;
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 5px;
            font-size: 1.1rem;
        }

        /* Estilos para impressão */
        @media print {
            body {
                margin: 0;
                padding: 0;
                background: white !important;
            }
            .curriculo {
                border: none !important;
                box-shadow: none !important;
                padding: 10px !important;
                margin: 0 !important;
                max-width: 100% !important;
            }
            .navbar, button {
                display: none !important;
            }
            .section {
                margin-bottom: 15px !important;
                page-break-inside: avoid;
            }
            h1 {
                font-size: 24px !important;
            }
            h2 {
                font-size: 18px !important;
            }
            p {
                font-size: 14px !important;
                margin-bottom: 8px !important;
            }
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
                <a class="nav-link active" href="#">Visualizar</a>
            </div>
        </div>
    </nav>

    <div class="curriculo">
        <h1 class="text-center">SEU CURRÍCULO PRONTO</h1>
        
        <!-- Dados Pessoais -->
        <div class="section">
            <h2>DADOS PESSOAIS</h2>
            <p><strong>Nome:</strong> <?php echo $_POST['nome']; ?></p>
            <p><strong>Data de Nascimento:</strong> <?php 
                $data = $_POST['nascimento'];
                echo date('d/m/Y', strtotime($data));
            ?></p>
            <p><strong>Idade:</strong> 
                <?php 
                if(isset($_POST['idade']) && !empty($_POST['idade'])) {
                    echo $_POST['idade'] . ' anos';
                } else {
                    if(isset($_POST['nascimento']) && !empty($_POST['nascimento'])) {
                        $nascimento = new DateTime($_POST['nascimento']);
                        $hoje = new DateTime();
                        $idade = $hoje->diff($nascimento)->y;
                        echo $idade . ' anos';
                    } else {
                        echo 'Não informada';
                    }
                }
                ?>
            </p>
            <p><strong>E-mail:</strong> <?php echo $_POST['email']; ?></p>
            <p><strong>Telefone:</strong> <?php echo $_POST['telefone']; ?></p>
        </div>

        <!-- Formação Acadêmica -->
        <div class="section">
            <h2>FORMAÇÃO ACADÊMICA</h2>
            <?php
            if(isset($_POST['instituicao'])) {
                for($i = 0; $i < count($_POST['instituicao']); $i++) {
                    if(!empty($_POST['instituicao'][$i])) {
                        echo '<div class="mb-3">';
                        echo '<p><strong>Instituição:</strong> ' . $_POST['instituicao'][$i] . '</p>';
                        echo '<p><strong>Curso:</strong> ' . $_POST['curso'][$i] . '</p>';
                        echo '<p><strong>Período:</strong> ' . $_POST['periodo_formacao'][$i] . '</p>';
                        echo '</div>';
                        if($i < count($_POST['instituicao']) - 1) echo '<hr>';
                    }
                }
            } else {
                echo '<p>Nenhuma formação cadastrada.</p>';
            }
            ?>
        </div>

        <!-- Experiências Profissionais -->
        <div class="section">
            <h2>EXPERIÊNCIAS PROFISSIONAIS</h2>
            <?php
            if(isset($_POST['empresa'])) {
                for($i = 0; $i < count($_POST['empresa']); $i++) {
                    if(!empty($_POST['empresa'][$i])) {
                        echo '<div class="mb-3">';
                        echo '<p><strong>Empresa:</strong> ' . $_POST['empresa'][$i] . '</p>';
                        echo '<p><strong>Cargo:</strong> ' . $_POST['cargo'][$i] . '</p>';
                        echo '<p><strong>Período:</strong> ' . $_POST['periodo_experiencia'][$i] . '</p>';
                        echo '<p><strong>Descrição:</strong> ' . $_POST['descricao'][$i] . '</p>';
                        echo '</div>';
                        if($i < count($_POST['empresa']) - 1) echo '<hr>';
                    }
                }
            } else {
                echo '<p>Nenhuma experiência cadastrada.</p>';
            }
            ?>
        </div>

        <div class="text-center mt-4">
            <button class="btn-print" onclick="window.print()">🖨️ IMPRIMIR CURRÍCULO</button>
            <button class="btn-print" onclick="alert('Para baixar como PDF: 1) Clique em Imprimir → 2) Escolha \"Microsoft Print to PDF\" → 3) Clique em Salvar')" 
                    style="background: #dc3545; margin-left: 10px;">
                📥 BAIXAR EM PDF
            </button>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>